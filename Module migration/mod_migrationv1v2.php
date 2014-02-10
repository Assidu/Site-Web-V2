<?php
/**
 * Migration V1 V2 Module Entry Point
 * 
 * @license  Assidu-NFC all rights reserved
 */
 
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
// Include the syndicate functions only once
require_once( dirname(__FILE__).'/helper.php' );

$jinput = JFactory::getApplication()->input;
$method = $jinput->get('method');
if($method == 'init'){
	$data = $jinput->get('data');
	$result = modMigrationv1v2Helper::initMigration($data);
}
require( JModuleHelper::getLayoutPath( 'mod_migrationv1v2' ) );
?>