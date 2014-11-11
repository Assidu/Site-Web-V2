<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
?>
	
    <!--
	    TODO licence à ajouter pour 
	    https://www.flickr.com/photos/34547181@N00/11121355345/sizes/o/ 
	    https://www.flickr.com/photos/34547181@N00/11121355345
    -->
	<section id="TitleTile" style="position: fixed;z-index:5;top: 0;left: 0;right: 0;height: 100%;background-image: url('http://www-dev.assidu-utbm.fr/Beta/templates/reborn/images/iceberg.jpg');background-size: cover;transition: 1s;">
		<div class="title" style="position: absolute;bottom: 1em;left: 0;right: 0;text-align: center;">
			<div style="display: inline-block;width:80%;min-width:20em;max-width: 50em;">
				<h1 style="background: black url(&quot;http://www-dev.assidu-utbm.fr/Beta/templates/reborn/images/dark-pattern.png&quot;);  };padding: 1em;border-radius: 1em;box-shadow: inset 0 0 1em black;font-size: 2em;margin: 0 0 0.5em;color: #009BD6;"><?php echo JText::sprintf('COM_ASSIDU_HOME_TITLE'); ?></h1>
				<div id="KnowMoreBtn" style="cursor: pointer;font-size: 1.5em;display: inline-block;padding: 0.5em;background: rgba(255, 255, 255, 0.39);color: white;text-shadow: 0px 1px 2px black;border: 2px solid white;"><?php echo JText::sprintf('COM_ASSIDU_HOME_TITLE_BTN'); ?></span>
			</div>
		</div>		  
	</section>
	<section id="Page">
		<div class="page-header" style="text-align:center;">
			<h2>
				<?php echo JText::sprintf('COM_ASSIDU_HOME_PAGE_TITLE'); ?>
			</h2>
		</div>
		<div style="min-height:260px;;text-align: justify;margin: 0 1em;">
			<img style="float:left;margin-right:1em;" src="images/PagesStatiques/Publiques/Accueil/500_F_63977306_XpMjJNpnxXHZruBSAWZqlYsnDhjbLgKj.jpg" alt="" width="333" height="250" />
			<h1 style="color: #db6176;"><?php echo JText::sprintf('COM_ASSIDU_HOME_PAGE_PART_ONE_TITLE'); ?></h1>
			<span style=\"line-height: 1.3em;\">
				<?php echo JText::sprintf('COM_ASSIDU_HOME_PAGE_PART_ONE_TEXT'); ?>
			</span>
		</div>
		<div style="min-height:240px;text-align: justify;margin: 0 1em;">
			<img style="float:right;margin-left:1em;" src="images/PagesStatiques/Publiques/Accueil/500_F_65049229_bv9ki8uSldAKlJZkQ2EmQd8JOJSLwkXN.jpg" alt="" width="308" height="230" />
			<h1 style="color: #e27a34;"><?php echo JText::sprintf('COM_ASSIDU_HOME_PAGE_PART_TWO_TITLE'); ?></h1>
			<span style=\"line-height: 1.3em;\">
				<?php echo JText::sprintf('COM_ASSIDU_HOME_PAGE_PART_TWO_TEXT'); ?>
			</span>
		</div>
		<div style="min-height:300px;text-align: justify;margin: 0 1em;">
			<img style="float:left;margin-right:1em;" src="images/PagesStatiques/Publiques/Accueil/500_F_55962728_H0QPmnnKJfcGfhVt8WShEX4Ytv00ExLL.jpg" alt="" width="331" height="290" />
			<h1 style="color: #af9900;"><?php echo JText::sprintf('COM_ASSIDU_HOME_PAGE_PART_THREE_TITLE'); ?></h1>
			<span style=\"line-height: 1.3em;\">
				<?php echo JText::sprintf('COM_ASSIDU_HOME_PAGE_PART_THREE_TEXT'); ?>
			</span>
		</div>
		<div style="min-height:200px;text-align: justify;margin: 0 1em;">
			<img style="float:right;margin-left:1em;" src="images/PagesStatiques/Publiques/Accueil/93c452c94ae13bba3ed32d0a62a43659.jpg" alt="" width="352" height="200" />
			<h1 style="color: #159104;"><?php echo JText::sprintf('COM_ASSIDU_HOME_PAGE_PART_FOUR_TITLE'); ?></h1>
			<span style=\"line-height: 1.3em;\">
				<?php echo JText::sprintf('COM_ASSIDU_HOME_PAGE_PART_FOUR_TEXT'); ?>
			</span>
		</div>
		<div style="height:300px;text-align: justify;">
			<img style="float:left;height:300px;" src="images/PagesStatiques/Publiques/Accueil/500_F_61933081_JvbrNTqEc7j5FJPqXwx0fnoCwCzc613F.jpg"/>
			<p style="text-align: center;padding-top: 120px;font-size: 1.2em;"><?php echo JText::sprintf('COM_ASSIDU_HOME_PAGE_LAST_PART'); ?></p>
		</div>
		<div id="Footer">
			<div class="lyt">
				<div class="adress">
					<h1>ASSIDU</h1>
					<p>Le r&eacute;seau des anciens de l'UTBM, ENIBe, UTCS et IPS&eacute;<br>13 rue Thierry Mieg 90 000 belfort</p>
				</div>
				{modulepos Footer-Accueil|xhtml}
			</div>
		</div>
	</section>