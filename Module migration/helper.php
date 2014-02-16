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
    public static function initMigration($userInfo)
    {
    	$data ='{';
    	$data.='"nom":"lastname",';
    	$data.='"prenom":"firstname",';
    	$data.='"surnom":"nickname",';
    	$data.='"typecompte":"diplome",';
    	$data.='"ecole":"utbm",';
    	$data.='"identifiant":"firstname.lastname",';
    	$data.='"promo":"5",';
    	$data.='"branche":"GI",';
    	$data.='"datenaissance":"01/01/1980",';
    	$data.='"intitule":"consultant",';
    	$data.='"filiere":"I2RV",';
    	$data.='"icq":"icq",';
    	$data.='"msn":"msn",';
    	$data.='"aim":"aim",';
    	$data.='"yahoo":"yahoo",';
    	$data.='"google":"google",';
    	$data.='"skype":"skype",';
    	$data.='"couriel":"firstname.lastname@domaine.com",';
    	$data.='"adresse":"1 main street",';
    	$data.='"codepostal":"51666",';
    	$data.='"ville":"city",';
    	$data.='"pays":"state",';
    	$data.='"tel":"0606060606",';
    	$data.='"siteweb":"www.website.com",';
    	$data.='"tel2":"0303030303",';
    	$data.='"contrat":"CDI",';
    	$data.='"divers":"???",';
    	$data.='"entreprise":"compagny",';
    	$data.='"entreprisecp":"33333",';
    	$data.='"entrepriseville":"city",';
    	$data.='"entreprisecouriel":"firstname.lastname@compagny.com",';
    	$data.='"entreprisedomaine":"area",';
    	$data.='"entreprisepays":"country",';
    	$data.='"entreprisesituation":"situation",';
    	$data.='"entreprisetel":"0101010101",';
    	$data.='"entrepriseadresse":"adress",';
    	$data.='"entreprisecp2":"11111"';
    	$data.='}';
        return $data;
    }
}
?>