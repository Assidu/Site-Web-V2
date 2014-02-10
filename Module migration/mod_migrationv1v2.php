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
 
$hello = modMigrationv1v2Helper::getHello( $params );
require( JModuleHelper::getLayoutPath( 'mod_migrationv1v2' ) );
?>