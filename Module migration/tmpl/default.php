<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' ); 

$task = JRequest::getCmd('task', '');
if(ISSET($result)){
	echo $result;
} else if($task == 'login'){
 ?>
	<div class="migration"> <!-- TODO fichier langue & urlbase from server-->
		<span>/!\ Si vous &eacute;tiez inscrit sur la version précédente du site :</span>
		<a id="MigrationBtnLogin" src="http://www-dev.assidu-utbm.fr/site-v2_dev3/index.php/inscription" >Migrer mon compte</a>
	</div>  
<?php
} else if($task == 'registers'){
?>
	<div class="migration">
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
	  		var userInfo = {
	  				id:$('#MigrationFieldId')[0].value,
	  				pwd:$('#MigrationFieldPwd')[0].value
	  		};
	  		userInfo = JSON.stringify(userInfo);
			$.ajax({
				url:'http://www-dev.assidu-utbm.fr/site-v2_dev3',
				data:{
					option:'com_ajax',
					module:'migrationv1v2',
					method:'init',
					data : userInfo
				},
				success:function(data){
					data = $.parseJSON(data);
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
					$('#cb_filiere')[0].value = decodeURIComponent(data.filiere);
					$('#cb_icq')[0].value = decodeURIComponent(data.icq);
					$('#cb_msn')[0].value = decodeURIComponent(data.msn);
					$('#cb_aim')[0].value = decodeURIComponent(data.aim);
					$('#cb_yahoo')[0].value = decodeURIComponent(data.yahoo);
					$('#cb_google')[0].value = decodeURIComponent(data.google);
					$('#cb_skype')[0].value = decodeURIComponent(data.skype);
					$('#email')[0].value = decodeURIComponent(data.couriel);
					$('#address')[0].value = decodeURIComponent(data.adresse);
					$('#zipcode')[0].value = decodeURIComponent(data.codepostal);
					$('#city')[0].value = decodeURIComponent(data.ville);
					$('#country')[0].value = decodeURIComponent(data.pays);
					$('#phone')[0].value = decodeURIComponent(data.tel);
					$('#website')[0].value = decodeURIComponent(data.siteweb);
					$('#cb_phone2')[0].value = decodeURIComponent(data.tel2);
					$('#cb_contrat')[0].value = decodeURIComponent(data.contrat);
					$('#cb_divers')[0].value = decodeURIComponent(data.divers);
					$('#company')[0].value = decodeURIComponent(data.entreprise);
					$('#cb_jobpostalcode')[0].value = decodeURIComponent(data.entreprisecp);
					$('#cb_jobcity')[0].value = decodeURIComponent(data.entrepriseville);
					$('#cb_jobmail')[0].value = decodeURIComponent(data.entreprisecouriel);
					$('#cb_jobdomaine')[0].value = decodeURIComponent(data.entreprisedomaine);
					$('#cb_jobcountry')[0].value = decodeURIComponent(data.entreprisepays);
					$('#cb_jobsituation')[0].value = decodeURIComponent(data.entreprisesituation);
					$('#cb_jobphone')[0].value = decodeURIComponent(data.entreprisetel);
					$('#cb_jobadress')[0].value = decodeURIComponent(data.entrepriseadresse);
					$('#cb_jobcodepostal')[0].value = decodeURIComponent(data.entreprisecp2);
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
