<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' ); ?>

<?php
	$jinput = JFactory::getApplication()->input;
	$foo = $jinput->get('method');
	echo 'method = -'.$foo.'-';
	$task = JRequest::getCmd('task', '');
	?><script>//alert('<?php echo $task; ?>');</script> <?php
	if($task == 'login'){
 ?>
<div> <!-- TODO fichier langue & urlbase from server-->
	<span>/!\ Si vous &eacute;tiez inscrit sur la version précédente du site :</span>
	<a id="MigrationBtnLogin" src="http://www-dev.assidu-utbm.fr/site-v2_dev3/index.php/inscription" >Migrer mon compte</a>
</div>  
<?php
	} else if($task == 'registers'){
?>
<div>
	<div id="MigrationStartContainer" style="display:block";>
		<span>/!\ Si vous &eacute;tiez inscrit sur la version précédente du site :</span><!-- TODO text traduction -->
		<input id="MigrationBtnStart" type="submit" name="Submit" class="button" value="Clic me, I'm Famous !">
	</div>
	<div id="MigrationGetInfoContainer" style="display:none";>
		<span class='label'>Id :</span><input id="MigrationFieldId" type="text" name="mig_id" class="inputbox" size="25"></input>
		<span class='label'>Mdp :</span><input id="MigrationFieldPwd" type="text" name="mig_pwd" class="inputbox" size="25"></input>
		<input id="MigrationBtnGetInfo" type="submit" name="Submit" class="button" value="Clic me, I'm Famous !">
	</div>
</div>
<script>        
assidu = {};
assidu.mysqlDB = {};
assidu.mysqlDB.get =function(iParams,iCallback){	
	// code for IE7+, Firefox, Chrome, Opera, Safari
	if (window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
	}
	// code for IE6, IE5  
	else {
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			iCallback(xmlhttp.responseText);
		}
		if (xmlhttp.readyState==4 && xmlhttp.status==404){
			alert(xmlhttp.responseText);// TODO meilleur gestion du msg d'erreur
		}
		xmlhttp.close;
	}
	
	xmlhttp.open("GET","./scripts/login.php?action=login&user="+iParams+"&pwd="+iParams,true);
	xmlhttp.send();
};

assidu.Ajax = {};
assidu.Ajax.get = function(moduleName,id,pwd){//TODO generique pour param
	if (window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
	} 
	else {// code for IE6, IE5 
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			alert(xmlhttp.responseText);
			//iCallback(xmlhttp.responseText);
		}
		if (xmlhttp.readyState==4 && xmlhttp.status==404){
			alert(xmlhttp.responseText);// TODO meilleur gestion du msg d'erreur
		}
		xmlhttp.close;
	}
	
	xmlhttp.open("GET","?option=com_ajax&module="+moduleName+"&format=json&data={id:"+id+"}",true);
	xmlhttp.send();
};

  /* Init */
  $("document").ready(function (e) {   	
  	var migrationStart = $('#MigrationBtnStart');
  	migrationStart.click(function() {
		$('#MigrationStartContainer').css('display','none');
		$('#MigrationGetInfoContainer').css('display','block');
  	});	
  	
  	var migrationGetInfo = $('#MigrationBtnGetInfo');  	
  	migrationGetInfo.click(function() {
		alert('Check old base');
		$.ajax({
			url:'http://www-dev.assidu-utbm.fr/site-v2_dev3',
			data:{
				option:'com_ajax',
				module:'migrationv1v2',
				method:'getHello',
				data : {
					id:'Bus_id',
					pwd:'Bus_pwd'
				}
			},
			success:function(data){
				alert(data);
			}
		});
		alert('Fill register fields');
  	});	
  	
  	var registerBtn = $('#registrationTable .button')[0];
  	registerBtn.click(function(e){
  		alert('TODO migration process ! ! !');
  		e.preventDefault();
  		//assidu.mysqlDB.get('toto',testMigration);
  		//loginBtn.click();
  	});
  });
</script>

<?php
	}
?>
