<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla view library
jimport('joomla.application.component.view');
 
/**
 * HTML View class for the Assidu Home Component
 * /!\ This the default view /!\
 */
class AssiduHomeViewAssiduHome extends JViewLegacy
{
	// Overwriting JView display method
	function display($tpl = null) 
	{
		// Assign data to the view
		$this->title = $this->get('Title');
		$this->menu = $this->get('Menu');

		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JLog::add(implode('<br />', $errors), JLog::WARNING, 'jerror');
			return false;
		}
		// Display the view
		parent::display($tpl);
	}
}

?>