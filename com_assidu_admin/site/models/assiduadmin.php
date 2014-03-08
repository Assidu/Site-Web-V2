<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla modelitem library
jimport('joomla.application.component.modelitem');
 
/**
 * AssiduAdmin Model
 */
class AssiduAdminModelAssiduAdmin extends JModelItem
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
        public function getMenu() 
        {
                if (!isset($this->menu)) 
                {
 
                        $jinput = JFactory::getApplication()->input;
                        $id     = $jinput->get('access', 1, 'INT');
 
                        switch ($id) 
                        {
                        case 3:
                                $this->menu  = '<a class="button">'.JText::_('COM_ASSIDU_ADMIN_BUTTON_MOD_INSCRIPTION').'</a>';
                                $this->menu .= '<a class="button">'.JText::_('COM_ASSIDU_ADMIN_BUTTON_MOD_PORTRAIT').'</a>';
                                $this->menu .= '<a class="button">'.JText::_('COM_ASSIDU_ADMIN_BUTTON_MOD_ANTENNES').'</a>';
                                $this->menu .= '<a class="button">'.JText::_('COM_ASSIDU_ADMIN_BUTTON_STATS').'</a>';
                        break;
                        case 2:
                                $this->menu = '<span class="notification info">'.JText::_('COM_ASSIDU_ADMIN_INDEV').'</span>';
                        break;
                        default:
                        case 1:
                                $this->menu = '<span class="notification error">'.JText::_('COM_ASSIDU_ADMIN_DENIED').'</span>';
                        break;
                        }
                }
                return $this->menu;
        }
}

?>