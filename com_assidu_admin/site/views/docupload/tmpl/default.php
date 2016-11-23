<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/* TODO changer nls pour validation compte plutot que doc upload */

// Validation en attente
if(false){
?>
	<div class="page-header">
		<h2><?php echo JText::sprintf('COM_ASSIDU_ADMIN_DOC_UPLOAD_TITLE'); ?></h2>
	</div>
	<p>
		<?php echo JText::sprintf('COM_ASSIDU_ADMIN_VALIDATION_PENDING_TEXT'); ?>
	</p>
<?php
} 
// Formulaire de téléversement des documents
else {
?>
	<div class="page-header">
		<h2><?php echo JText::sprintf('COM_ASSIDU_ADMIN_DOC_UPLOAD_TITLE'); ?></h2>
	</div>
	<p>
		<?php echo JText::sprintf('COM_ASSIDU_ADMIN_DOC_UPLOAD_TEXT'); ?>
	</p>
	<div id="UploadDocValid">
	{module 114}
	</div>
<?php
}
?>