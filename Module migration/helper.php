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
        return '{"data":"'.$userInfo.'"}';
    }
}
?>