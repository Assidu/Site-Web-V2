<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
  <head>
  	<!-- Joomla -->
    <jdoc:include type="head" />

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/general.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/white.css" type="text/css" />

    <!-- External libraries -->

  </head>
  <body>
		<div id="TopBar">
			<img class="logo" src=<?php echo '"'.$this->params->get('img_logo').'"' ?>"/>
			<div id="TopbarCentralMenu">
				<jdoc:include type="modules" name="TopBar-Menu-Central" style="none" />
			</div>
			<div id="TopbarRightMenu">
				<jdoc:include type="modules" name="TopBar-Menu-Right" style="none" />
			</div>
		</div>

		<div id="Content">
			<jdoc:include type="component" />
		</div>

     <?php
     // Display footer
     include 'layout/lyt_footer.php';
    	?>
  </body>
</html>
