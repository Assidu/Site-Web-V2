<?php
	/*-----------------------------------------------------*/
	/* Récupération des informations de la page à afficher */
	/*-----------------------------------------------------*/
	$option = JRequest::getCmd('option', 'unknown');
	$view = JRequest::getCmd('view', 'unknown');
	$layout = JRequest::getCmd('layout', 'unknown');
	$task = JRequest::getCmd('task', 'unknown');
	$itemid = JRequest::getCmd('Itemid', 'unknown');
	$userid = JRequest::getCmd('user', 'unknown');
	
	$db = & JFactory::getDBO(); 
	if (JRequest::getCmd('view', 0) == "category") { 
	   $idCat = JRequest::getInt('id');	      
	}elseif(JRequest::getCmd('view', 0) == "article") { 
		$idArt = JRequest::getInt('id');
	}	
	
	$user = JFactory::getUser();
	
	/* Give Category when article display but make a db call
	elseif (Jrequest::getCmd('view', 0) == "article") { 
	   $temp=explode(":",JRequest::getInt('id')); 
	   $query = "SELECT catid FROM #__content WHERE id = ".$temp[0]; 
	   $db->setQuery( $query ); 
	   $items  = $db->loadResult(); 
	   //return $items; 
	} */
	
	/*------------------------------------------------------------------*/
	/* Redirection si on tombe sur module de login Joomla au lieu de CB */
	/*------------------------------------------------------------------*/
	if($option == 'com_users'){ 
		header('Location: /Beta/index.php?option=com_comprofiler&task=login&Itemid=121'); /* TODO non static */
	}
?>