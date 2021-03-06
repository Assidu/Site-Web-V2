<?php
	defined( '_JEXEC' ) or die( 'Restricted access' );

	$option = JRequest::getCmd('option', '');
	$view = JRequest::getCmd('view', '');
	$layout = JRequest::getCmd('layout', '');
	$task = JRequest::getCmd('task', '');
	$itemid = JRequest::getCmd('Itemid', '');

	if($option == 'com_users'){ /* pourquoi on fait ça déjà ?? */
		header('Location: /Beta/index.php/connect'); /* TODO non static */
	}
	$user = JFactory::getUser();

	$db = & JFactory::getDBO();
	if (JRequest::getCmd('view', 0) == "category") {
	   $idCat = JRequest::getInt('id');
	}elseif(JRequest::getCmd('view', 0) == "article") {
		$idArt = JRequest::getInt('id');
	}
	/* Give Category when article display but make a db call
	elseif (Jrequest::getCmd('view', 0) == "article") {
	   $temp=explode(":",JRequest::getInt('id'));
	   $query = "SELECT catid FROM #__content WHERE id = ".$temp[0];
	   $db->setQuery( $query );
	   $items  = $db->loadResult();
	   //return $items;
	} */
	if($option == 'com_ajax'){
		if(JRequest::getCmd('module', '') == 'migrationv1v2'){
     		echo '<jdoc:include type="modules" name="position-7" />';
		}else{
			echo 'Error in ajax module';
		}
	}else{
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
  <head>
  	<!-- Joomla -->
    <jdoc:include type="head" />

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/general.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template.css" type="text/css" />

    <!-- External libraries -->
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/scripts/jquery.js" type="text/javascript"></script>
  </head>
  <body>
    <?php
     // Display debug
	 if($this->params->get('debug') != 'hidden'){
	    $article =& JTable::getInstance('content');
	    $article->load($idArt);
	    $article_title = $article->get('title');
	?>
	<script>
		var fragment = document.createDocumentFragment();

		var debug = document.createElement('div');
		debug.setAttribute('id','debug');

		var dbgJoomlaParam = document.createElement('ul');
		dbgJoomlaParam.style.display = 'none';

		var txt = document.createTextNode('Option : <?php if($option){echo $option;} ?>')
		var li = document.createElement('li');
		li.appendChild(txt);
		dbgJoomlaParam.appendChild(li);

		txt = document.createTextNode('View : <?php if($view){echo $view;} ?>')
		li = document.createElement('li');
		li.appendChild(txt);
		dbgJoomlaParam.appendChild(li);

		txt = document.createTextNode('Layout : <?php if($layout){echo $layout;} ?>')
		li = document.createElement('li');
		li.appendChild(txt);
		dbgJoomlaParam.appendChild(li);

		txt = document.createTextNode('Task : <?php if($task){echo $task;} ?>')
		li = document.createElement('li');
		li.appendChild(txt);
		dbgJoomlaParam.appendChild(li);

		txt = document.createTextNode('Itemid : <?php if($itemid){echo $itemid;} ?>')
		li = document.createElement('li');
		li.appendChild(txt);
		dbgJoomlaParam.appendChild(li);

		txt = document.createTextNode('idCat : <?php if($idCat){echo $idCat;} ?>')
		li = document.createElement('li');
		li.appendChild(txt);
		dbgJoomlaParam.appendChild(li);

		txt = document.createTextNode('idArt : <?php if($idArt){echo $idArt;} ?>')
		li = document.createElement('li');
		li.appendChild(txt);
		dbgJoomlaParam.appendChild(li);

		txt = document.createTextNode("titleArt : <?php if($article_title){echo $article_title;} ?>")
		li = document.createElement('li');
		li.appendChild(txt);
		dbgJoomlaParam.appendChild(li);

		var dbgToggle = document.createElement('div');
		dbgToggle.appendChild(document.createTextNode("Debug"));
		var dbgToggleFtn = function(){
			if(dbgJoomlaParam.style.display === 'none'){
				dbgJoomlaParam.style.display = 'block';
			}else{
				dbgJoomlaParam.style.display = 'none';
			}
		};
		dbgToggle.onclick = dbgToggleFtn;

		debug.appendChild(dbgToggle);
		debug.appendChild(dbgJoomlaParam);
		fragment.appendChild(debug);

		document.body.appendChild(fragment);
	</script>
	<?php
	 }
	 // Display Topbar
     include 'layout/lyt_header.php';

     // Display Content
     if($option == 'com_content'){
     	include 'layout/lyt_' . $view . '.php';
     } else if($option == 'com_assidu_admin'){
     	include 'layout/lyt_assidu_admin.php';
     } else if($option == 'com_comprofiler' ){
     	if($task == 'registers'){
     		include 'layout/lyt_register.php';
     	} else if($task == 'login'){
     		include 'layout/lyt_login.php';
     	} else if($task == 'saveregisters'){
     		$title = 'Inscription';
     		include 'layout/lyt_page.php';
     	} else if($task == 'confirm'){
     		$title = 'Confirmation email';
     		include 'layout/lyt_page.php';
     	} else {
     		include 'layout/lyt_annuaire.php';
     	}
     }else if($option == 'com_acctexp'){ ?>
        <div id="Banner">
      		<img src=<?php echo '"'.$this->baseurl.'/images/Templates/banner_template.png'.'"' ?>/>
    	</div>
     	<div id="Content">
        	<jdoc:include type="component" />
	    </div>
	 <?php
     }else{ ?>
     	<div id="Content">
        	<jdoc:include type="component" />
	    </div>
     <?php }
     // Display footer
     include 'layout/lyt_footer.php';
    ?>
  </body>
</html>
<?php } ?>
