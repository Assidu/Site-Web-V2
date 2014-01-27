<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
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
    
    <!-- Scripts -->
    <script>
      $(function() {
        /* Tools */
        getDocHeight = function(){
          return Math.max($(document).height(),$(window).height(),/* For opera: */document.documentElement.clientHeight);
        };
    
        getDocWidth = function(){
          return Math.max($(document).width(),$(window).width(),/* For opera: */document.documentElement.clientWidth);
        };
    
        /* UI */
        adaptEltSizeToWindow = function(){
          <?php 
     		if($this->params->get('banner_mode')=='custo'){
          		echo 'var bannerHeight=482;';
     		} else {
     			echo 'var bannerHeight=232;';
     		}
          ?>
          $("#Content").css("min-height", $(window).height() - 320 /* Topbar + banner height */);
          //$("#LeftModules").css("min-height", $(window).height() - bannerHeight);
        };
    
        /* Init */
        $("document").ready(function (e) {
          adaptEltSizeToWindow();
          window.onresize = function(event) {
            adaptEltSizeToWindow();
          };
        });
      });
    </script>  
    <?php
    	$option = JRequest::getCmd('option', '');
		$view = JRequest::getCmd('view', '');
		$layout = JRequest::getCmd('layout', '');
		$task = JRequest::getCmd('task', '');
		$itemid = JRequest::getCmd('Itemid', '');

		if($option == 'com_users'){
			header('Location: /site-v2_dev3/index.php/connect');
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
    ?>
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

		var txt = document.createTextNode('Option : <?php echo $option ?>')
		var li = document.createElement('li');
		li.appendChild(txt);
		dbgJoomlaParam.appendChild(li);

		txt = document.createTextNode('View : <?php echo $view ?>')
		li = document.createElement('li');
		li.appendChild(txt);
		dbgJoomlaParam.appendChild(li);

		txt = document.createTextNode('Layout : <?php echo $layout ?>')
		li = document.createElement('li');
		li.appendChild(txt);
		dbgJoomlaParam.appendChild(li);

		txt = document.createTextNode('Task : <?php echo $task ?>')
		li = document.createElement('li');
		li.appendChild(txt);
		dbgJoomlaParam.appendChild(li);

		txt = document.createTextNode('Itemid : <?php echo $itemid ?>')
		li = document.createElement('li');
		li.appendChild(txt);
		dbgJoomlaParam.appendChild(li);

		txt = document.createTextNode('idCat : <?php echo $idCat ?>')
		li = document.createElement('li');
		li.appendChild(txt);
		dbgJoomlaParam.appendChild(li);

		txt = document.createTextNode('idArt : <?php echo $idArt ?>')
		li = document.createElement('li');
		li.appendChild(txt);
		dbgJoomlaParam.appendChild(li);

		txt = document.createTextNode("titleArt : <?php echo $article_title ?>")
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
     }else if($option == 'com_comprofiler' ){
     	include 'layout/lyt_annuaire.php';
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