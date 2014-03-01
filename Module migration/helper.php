<?php
/**
 * Helper class for Migration V1 V2 module
 * 
 * @license  Assidu-NFC all rights reserved
 */
class modMigrationv1v2Helper
{
    /**
     * Retrieves the hello message
     *
     * @param array $params An object containing the module parameters
     * @access public
     */    
    public static function initMigration($inputs)
    {
    	$userInfo = json_decode($inputs);
    	if($userInfo == null){
    		return '{"msg":"error","text":"Unable to parse JSON datas."}'; //TODO lang	
    	}
    	
    	// TODO Vérifier valeur d'entré contre injection SQL
    	
    	try {
	    	//Obtain a database connection
			$db = JFactory::getDbo();
			
			// On vérifie l'identité de l'utilisateur et si le compte n'a pas déjà été migré
			$query = $db->getQuery(true)
			            ->select('*')
			            ->from($db->quoteName('v1_users'))
			            ->where('login = '. $db->Quote($userInfo->id));
			$db->setQuery($query);
			$result = $db->loadAssocList();
			
			$nbRow=count($result);
			$userFound=-1;

			for($i=0;$i<$nbRow;$i++)
			{
				if($result[$i]['login']==$userInfo->id && $result[$i]['password']==$userInfo->pwd ){
					$userFound = $i;
					break;	
				}
			}					
			if($userFound == -1){// TODO
				return '{"typeMsg":"error","text":"Mauvais identifiants et/ou mot de passe"}';	 // TODO NLS
	    	}else if($result[0]['migration'] == '2'){// TODO
	    		return '{"typeMsg":"error","text":"Ce compte a déjà été migré."}';	 // TODO NLS
	    	}
		} catch (Exception $e) {
			return '{"typeMsg":"error","text":"Database access error:\n"'.$e->getMessage().'}';	 // TODO NLS
		}

		// Tempory return values
    	$data ='{';
    	$data.='"typeMsg":"data",';
    	$data.='"nom":"'.urlencode($result[$i]['nom']).'",';
    	$data.='"prenom":"'.urlencode($result[$i]['prenom']).'",';
    	$data.='"surnom":"'.urlencode($result[$i]['surnom']).'",';
    	$data.='"typecompte":"'.urlencode($result[$i]['nom']).'",'; // TODO
    	$data.='"ecole":"'.urlencode($result[$i]['ecole']).'",';
    	$data.='"identifiant":"'.urlencode($result[$i]['emailavie']).'",';
    	$data.='"promo":"'.urlencode($result[$i]['promo']).'",';
    	$data.='"branche":"'.urlencode($result[$i]['branche']).'",';
    	$data.='"datenaissance":"'.urlencode($result[$i]['datenaissance']).'",';
    	$data.='"intitule":"'.urlencode($result[$i]['intitule']).'",';
    	$data.='"filiere":"'.urlencode($result[$i]['filiere']).'",';
    	$data.='"icq":"'.urlencode($result[$i]['icq']).'",';
    	$data.='"msn":"'.urlencode($result[$i]['msn']).'",';
    	$data.='"aim":"'.urlencode($result[$i]['aim']).'",';
    	$data.='"yahoo":"'.urlencode($result[$i]['yahoo']).'",';
    	$data.='"google":"'.urlencode($result[$i]['google']).'",';
    	$data.='"skype":"'.urlencode($result[$i]['skype']).'",';
    	$data.='"couriel":"'.urlencode($result[$i]['email']).'",';
    	$data.='"adresse":"'.urlencode($result[$i]['rue']).'",';
    	$data.='"codepostal":"'.urlencode($result[$i]['codepostal']).'",';
    	$data.='"ville":"'.urlencode($result[$i]['ville']).'",';
    	$data.='"pays":"'.urlencode($result[$i]['pays']).'",';
    	$data.='"tel":"'.urlencode($result[$i]['tel1']).'",';
    	$data.='"siteweb":"'.urlencode($result[$i]['siteweb']).'",';
    	$data.='"tel2":"'.urlencode($result[$i]['tel2']).'",';
    	$data.='"contrat":"'.urlencode($result[$i]['contrat']).'",';
    	$data.='"divers":"'.urlencode($result[$i]['divers']).'",';
    	$data.='"entreprise":"'.urlencode($result[$i]['entreprise']).'",';
    	$data.='"entreprisecp":"'.urlencode($result[$i]['codepostaljob']).'",';
    	$data.='"entrepriseville":"'.urlencode($result[$i]['villejob']).'",';
    	$data.='"entreprisecouriel":"'.urlencode($result[$i]['emailjob']).'",';
    	$data.='"entreprisedomaine":"'.urlencode($result[$i]['domaine_poste']).'",';
    	$data.='"entreprisepays":"'.urlencode($result[$i]['pays_entreprise']).'",';
    	$data.='"entreprisesituation":"'.urlencode($result[$i]['situation_pro']).'",';
    	$data.='"entreprisetel":"'.urlencode($result[$i]['telpro']).'",';
    	$data.='"entrepriseadresse":"'.urlencode($result[$i]['adresse_entreprise']).'",';
    	$data.='"entreprisecp2":"'.urlencode($result[$i]['code_postal_entreprise']).'",';
    	$data.='"noteAdmin":"'.urlencode($result[$i]['note_admin']).'",';
    	$data.='"droitAvantMigration":"'.urlencode($result[$i]['droit']).'",';
    	$data.='"nom_jf":"'.urlencode($result[$i]['nom_jf']).'"';
    	$data.='}';
    	modMigrationv1v2Helper::setMigration($userInfo,'1');
        return $data;
    }
    
     /**
     * Retrieves the hello message
     *
     * @param array $params An object containing the module parameters
     * @access public
     */    
    public static function setMigration($userInfo, $value)
    {    	
    	try {
	    	//Obtain a database connection
			$db = JFactory::getDbo();
			
			// On vérifie l'identité de l'utilisateur et si le compte n'a pas déjà été migré
			$query = $db->getQuery(true)
			            ->update($db->quoteName('v1_users'))
			            ->set($db->quoteName('migration').'='.$value)
			            ->where('login = '. $db->Quote($userInfo->id));
			$db->setQuery($query);
			$result = $db->query();
    	}catch (Exception $e) {
			return '{"typeMsg":"error","text":"Database access error:\n"'.$e->getMessage().'}';	 // TODO NLS  et gestion ! ! !
		}
    }
}
?>