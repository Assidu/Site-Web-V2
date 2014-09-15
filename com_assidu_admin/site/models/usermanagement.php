<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla modelitem library
jimport('joomla.application.component.modelitem');
 
/**
 * AssiduAdmin Model
 */
class AssiduAdminModelUserManagement extends JModelItem
{
        /**
         * @var string msg
         */
        protected $msg;
 
        /**
         * Get the message
         * @return string The message to be displayed to the user
         */
        public function getTitle(){
            if (!isset($this->title)) {
 				$this->title = JText::_('COM_ASSIDU_ADMIN_TITLE');
        	}
        	return $this->title;
        }
        
         /**
         * Get the message
         * @return string The message to be displayed to the user
         */
        public function getSubTitle(){
            if (!isset($this->title)) {
 				$this->title = JText::_('COM_ASSIDU_ADMIN_TITLE'); // TODO - récupération suivant la vue
        	}
        	return $this->title;
        }
 
        /**
         * Get the message
         * @return string The message to be displayed to the user
         */
        public function getMenu() 
        {
                if (!isset($this->menu)) 
                {
 
                        $jinput = JFactory::getApplication()->input;
                        $id     = $jinput->get('access', 1, 'INT');
 
                        switch ($id) 
                        {
                        case 3: // Menu administration
                                $this->menu  = '<a href="index.php?option=com_assidu_admin&view=usermanagement" class="button">'.JText::_('COM_ASSIDU_ADMIN_BUTTON_MOD_USERS').'</a>';
                                $this->menu .= '<a class="button">'.JText::_('COM_ASSIDU_ADMIN_BUTTON_MOD_PORTRAIT').'</a>';
                                $this->menu .= '<a class="button">'.JText::_('COM_ASSIDU_ADMIN_BUTTON_MOD_ANTENNES').'</a>';
                                $this->menu .= '<a class="button">'.JText::_('COM_ASSIDU_ADMIN_BUTTON_STATS').'</a>';
                        break;
                        case 2: // En développement
                                $this->menu = '<span class="notification info">'.JText::_('COM_ASSIDU_ADMIN_INDEV').'</span>';
                        break;
                        default:
                        case 1: // Accès non autorisé (par défaut)
                                $this->menu = '<span class="notification error">'.JText::_('COM_ASSIDU_ADMIN_DENIED').'</span>';
                        break;
                        }
                }
                return $this->menu;
        }
        
         /**
         * Get the message
         * @return string The message to be displayed to the user
         */
        public function getUserManagement() 
        {
                if (!isset($this->htmlcontent)) 
                {
					// TODO - Création interface avec options :
					// Ajout utilisateurs
					// Modération utilisateurs
					// Modération avatars
					// Gestion utilisateurs
					$this->htmlcontent = '<span class="notification info">'.JText::_('COM_ASSIDU_ADMIN_INDEV').'</span>';
                }
                return $this->htmlcontent;
        }
}

?>