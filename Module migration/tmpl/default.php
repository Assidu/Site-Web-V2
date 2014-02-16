<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' ); 

$task = JRequest::getCmd('task', '');
if(ISSET($result)){
	echo $result;
} else if($task == 'login'){
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
	  /* Init */
	  $("document").ready(function (e) {   	
	  	var migrationStart = $('#MigrationBtnStart');
	  	migrationStart.click(function() {
			$('#MigrationStartContainer').css('display','none');
			$('#MigrationGetInfoContainer').css('display','block');
	  	});	
	  	
	  	var migrationGetInfo = $('#MigrationBtnGetInfo');  	
	  	migrationGetInfo.click(function() {
			$.ajax({
				url:'http://www-dev.assidu-utbm.fr/site-v2_dev3',
				data:{
					option:'com_ajax',
					module:'migrationv1v2',
					method:'init',
					data : 'dataaaaa' // todo id & pwd user
				},
				success:function(data){
					data = $.parseJSON(data);
					$('#firstname')[0].value = data.prenom;
					$('#lastname')[0].value = data.nom;
					$('#cb_nickname')[0].value = data.surnom;
					// $('#cb_profiletype')[0].value = data.typecompte; TODO
					// $('#cb_school')[0].value = data.ecole; TODO
					$('#username')[0].value = data.identifiant;
					$('#cb_promo')[0].value = data.promo;
					// $('#cb_branche')[0].value = data.branche; TODO
					// $('#cb_birthdate')[0].value = data.datenaissance; TODO
					$('#cb_intitule')[0].value = data.intitule;
					$('#cb_filiere')[0].value = data.filiere;
					$('#cb_icq')[0].value = data.icq;
					$('#cb_msn')[0].value = data.msn;
					$('#cb_aim')[0].value = data.aim;
					$('#cb_yahoo')[0].value = data.yahoo;
					$('#cb_google')[0].value = data.google;
					$('#cb_skype')[0].value = data.skype;
					$('#email')[0].value = data.couriel;
					$('#address')[0].value = data.adresse;
					$('#zipcode')[0].value = data.codepostal;
					$('#city')[0].value = data.ville;
					$('#country')[0].value = data.pays;
					$('#phone')[0].value = data.tel;
					$('#website')[0].value = data.siteweb;
					$('#cb_phone2')[0].value = data.tel2;
					$('#cb_contrat')[0].value = data.contrat;
					$('#cb_divers')[0].value = data.divers;
					$('#company')[0].value = data.entreprise;
					$('#cb_jobpostalcode')[0].value = data.entreprisecp;
					$('#cb_jobcity')[0].value = data.entrepriseville;
					$('#cb_jobmail')[0].value = data.entreprisecouriel;
					$('#cb_jobdomaine')[0].value = data.entreprisedomaine;
					$('#cb_jobcountry')[0].value = data.entreprisepays;
					$('#cb_jobsituation')[0].value = data.entreprisesituation;
					$('#cb_jobphone')[0].value = data.entreprisetel;
					$('#cb_jobadress')[0].value = data.entrepriseadresse;
					$('#cb_jobcodepostal')[0].value = data.entreprisecp2;
				}
			});
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
