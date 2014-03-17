<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' ); 

$task = JRequest::getCmd('task', '');
if(ISSET($result)){
	echo $result;
} else if($task == 'login'){
 ?>
	<div class="migration"> <!-- TODO fichier langue & urlbase from server-->
		<span>Si vous &eacute;tiez inscrit sur l'ancien site, vous devez d'abord </span>
		<a id="MigrationBtnLogin" href="http://www-dev.assidu-utbm.fr/Beta/index.php/register" >migrer votre compte.</a>
	</div>  
<?php
} else if($task == 'registers'){
?>
	<div class="centerH">
		<div class="migration">
			<div id="MigrationStartContainer" style="display:block";>
				<span>Pour migrer votre compte de l'ancien site : </span><!-- TODO text traduction -->
				<input id="MigrationBtnStart" type="submit" name="Submit" class="button" value="Identifiez vous">
			</div>
			<div id="MigrationGetInfoContainer" style="display:none";>
				<span class='label'>Identifiant : </span><input id="MigrationFieldId" type="text" name="mig_id" class="inputbox" size="25"></input>
				<span class='label'>Mot de passe : </span><input id="MigrationFieldPwd" type="password" name="mig_pwd" class="inputbox" size="25"></input>
				<input id="MigrationBtnGetInfo" type="submit" name="Submit" class="button" value="Récupérer mes informations">
			</div>
			<div id="MigrationEndContainer" style="display:none";>
				<span>Connexion r&eacute;ussie. Pensez bien &agrave; v&eacute;rifiez que votre email est valide.</span><!-- TODO text traduction -->
			</div>
		</div>
	</div>
	<script>        
	  /* Init */
	  $("document").ready(function (e) {   	
	  	var migrationStart = $('#MigrationBtnStart');
	  	migrationStart.click(function() {
			$('#MigrationStartContainer').css('display','none');
			$('#MigrationGetInfoContainer').css('display','block');
			$('#MigrationFieldId').focus();
	  	});	
	  	
	  	var migrationGetInfo = $('#MigrationBtnGetInfo');  	
	  	migrationGetInfo.click(function() {
	  		var userInfo = {
	  				'id':$('#MigrationFieldId')[0].value,
	  				'pwd':$('#MigrationFieldPwd')[0].value
	  		};
	  		var request = {
	  				'option' : 'com_ajax',
					'module' : 'migrationv1v2',
					'method' : 'initMigration',
					'data'   : userInfo,
					'format' : 'json'
	  		};
			$.ajax({
				type : 'GET',
				url:'http://www-dev.assidu-utbm.fr/Beta/index.php', /* TODO non static */
				data:request,
				dataType: 'json',
				success:function(response){
					var data = $.parseJSON(response.data);
					if(data.typeMsg == 'error'){
						var error = document.createElement('span');
						error.setAttribute('class','message error');
						error.appendChild(document.createTextNode(data.text));
						$('#MigrationGetInfoContainer')[0].appendChild(error);
					}else if(data.typeMsg == 'data'){
						$('#firstname')[0].value = decodeURIComponent(data.prenom);
						$('#lastname')[0].value = decodeURIComponent(data.nom);
						$('#cb_nickname')[0].value = decodeURIComponent(data.surnom);
						$("#cb_profiletype option[value='"+decodeURIComponent(data.typecompte)+"']").attr('selected','selected');
						$("#cb_school option[value='"+decodeURIComponent(data.ecole)+"']").attr('selected','selected');
						$('#username')[0].value = decodeURIComponent(data.identifiant);
						$('#cb_promo')[0].value = decodeURIComponent(data.promo);
						$("#cb_branche option[value='"+decodeURIComponent(data.branche)+"']").attr('selected','selected');
						$("#cb_birthdate_Year_ID option[value='"+decodeURIComponent(data.datenaissance).slice(0,4)+"']").attr('selected','selected');
						$("#cb_birthdate_Month_ID option[value='"+decodeURIComponent(data.datenaissance).slice(6,7)+"']").attr('selected','selected');
						$("#cb_birthdate_Day_ID option[value='"+decodeURIComponent(data.datenaissance).slice(9,10)+"']").attr('selected','selected');
						$('#cb_intitule')[0].value = decodeURIComponent(data.intitule);
						$('#cb_nomnaissance')[0].value = decodeURIComponent(data.nom_jf);
						$('#cb_filiere')[0].value = decodeURIComponent(data.filiere);
						$('#cb_icq')[0].value = decodeURIComponent(data.icq);
						$('#cb_msn')[0].value = decodeURIComponent(data.msn);
						$('#cb_aim')[0].value = decodeURIComponent(data.aim);
						$('#cb_yahoo')[0].value = decodeURIComponent(data.yahoo);
						$('#cb_google')[0].value = decodeURIComponent(data.google);
						$('#cb_skype')[0].value = decodeURIComponent(data.skype);
						$('#email')[0].value = decodeURIComponent(data.couriel);
						$('#cb_address')[0].value = decodeURIComponent(data.adresse);
						$('#cb_zipcode')[0].value = decodeURIComponent(data.codepostal);
						$('#cb_city')[0].value = decodeURIComponent(data.ville);
						$('#cb_country')[0].value = decodeURIComponent(data.pays);
						$('#cb_phone')[0].value = decodeURIComponent(data.tel);
						$('#cb_website')[0].value = decodeURIComponent(data.siteweb);
						$('#cb_phone2')[0].value = decodeURIComponent(data.tel2);
						$('#cb_contrat')[0].value = decodeURIComponent(data.contrat);
						$('#cb_divers')[0].value = decodeURIComponent(data.divers);
						$('#cb_company')[0].value = decodeURIComponent(data.entreprise);
						$('#cb_jobpostalcode')[0].value = decodeURIComponent(data.entreprisecp);
						$('#cb_jobcity')[0].value = decodeURIComponent(data.entrepriseville);
						$('#cb_jobmail')[0].value = decodeURIComponent(data.entreprisecouriel);
						$('#cb_jobdomaine')[0].value = decodeURIComponent(data.entreprisedomaine);
						$('#cb_jobcountry')[0].value = decodeURIComponent(data.entreprisepays);
						$('#cb_jobsituation')[0].value = decodeURIComponent(data.entreprisesituation);
						$('#cb_jobphone')[0].value = decodeURIComponent(data.entreprisetel);
						$('#cb_jobadress')[0].value = decodeURIComponent(data.entrepriseadresse);
						$('#cb_jobcodepostal')[0].value = decodeURIComponent(data.entreprisecp2);
						$('#cb_noteadmin')[0].value = decodeURIComponent(data.noteAdmin);
						$('#cb_droitanciensite')[0].value = decodeURIComponent(data.droitAvantMigration);
						$('#firstname').focus();
						$('#lastname').focus();
						$('#email').focus();
						$('#city').focus();
						$('#country').focus();
						$('#password').focus();
						$('#MigrationGetInfoContainer').css('display','none');
						$('#MigrationEndContainer').css('display','block');
						migrationAssiduV1V2 = true;
					}
				}
			});
	  	});	
	  	
/* TODO action lors de l'inscription
	  	var registerBtn = $('#registrationTable .button')[0];
	  	registerBtn.click(function(e){
	  		alert('TODO migration process ! ! !');
	  		var userInfo = {
	  				id:$('#MigrationFieldId')[0].value,
	  				pwd:$('#MigrationFieldPwd')[0].value
	  		};
	  		userInfo = JSON.stringify(userInfo);
			$.ajax({
				url:'http://www-dev.assidu-utbm.fr/Beta/index.php', // TODO non static
				data:{
					option:'com_ajax',
					module:'migrationv1v2',
					method:'migrate',
					data : userInfo
				},
				success:function(data){
					alert('success'+data);
				},
				fail:function(data){
					// TODO
				}
			});
	  		e.preventDefault();
	  		//assidu.mysqlDB.get('toto',testMigration);
	  		//loginBtn.click();
	  	});*/
	  });
	</script>
<?php
}
?>
