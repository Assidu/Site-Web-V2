    <?php include 'lyt_topbar.php'; ?> 
    <section id="Page" <?php if($task == 'emailUser' || $task == 'reportUser'){echo 'class="cbform"';} ?>>
		<?php 
		if( ($task == 'userProfile' && $userid == $user->id)
			|| ($task == 'unknown' && $userid == 'unknown')){  ?>
			<jdoc:include type="modules" name="position-6" style="none" />  
		<?php } ?>
		<jdoc:include type="component" />
		<?php include 'lyt_footer.php';  ?>
	</div>