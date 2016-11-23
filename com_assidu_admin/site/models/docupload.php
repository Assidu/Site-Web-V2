<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla modelitem library
jimport('joomla.application.component.modelitem');
 
/**
 * AssiduAdmin Model
 */
class AssiduAdminModelDocUpload extends JModelItem
{
        /**
         * @var string msg
         */
        protected $msg;
 
        /**
         * Get the page title
         * @return string The title of the page to be displayed to the user
         */
        public function getTitle(){
            if (!isset($this->title)) {
 				$this->title = JText::_('COM_ASSIDU_ADMIN_DOC_UPLOAD_TITLE');
        	}
        	return $this->title;
        }
        
         /**
         * Get the message
         * @return string The message to be displayed to the user
         */
        public function getContent() 
        {
                if (!isset($this->htmlcontent)) 
                {
					$this->htmlcontent = '<span class="notification info">'.JText::_('COM_ASSIDU_ADMIN_DOC_UPLOAD_TEXT').'</span>';
                }
				foreach ($_FILES["documents"]["error"] as $key => $error) {
					if ($error == UPLOAD_ERR_OK) {
						$tmp_name = $_FILES["pictures"]["tmp_name"][$key];
						$name = $_FILES["pictures"]["name"][$key];
						$this->htmlcontent .= 'FILES : '.$tmp_name.' - '.$name;
						//move_uploaded_file($tmp_name, "data/$name");
					}
				}
                return $this->htmlcontent;
        }
}

?>