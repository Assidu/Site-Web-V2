<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla view library
jimport('joomla.application.component.view');
 
/**
 * HTML View class for the Assidu Admin Component
 */
class AssiduAdminViewUserManagement extends JViewLegacy
{
        // Overwriting JView display method
        function display($tpl = null) 
        {
				// Assign data to the view
                $this->title = $this->get('Title');
                $this->subtitle = $this->get('SubTitle');
                $this->htmlcontent = $this->get('UserManagement');
 
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