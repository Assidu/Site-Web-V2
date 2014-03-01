    <div id="TopBar">
       <img class="logo" src=<?php echo '"'.$this->params->get('img_logo').'"' ?>"/>
       <?php if($user->guest){ ?>
       <div class="toolBarAcc">
       	  <jdoc:include type="modules" name="TopBar-UserMenu-Accueil" style="none" />
       </div>
       <jdoc:include type="modules" name="TopBar-Menu-Accueil" style="none" />
       <?php }else{ ?>
       <jdoc:include type="modules" name="TopBar-Menu-Connecte" style="none" />    
       <div class="toolBar">    
	      <div id='Login' class='btn' >
		    <span>Pr&eacute;f&eacute;rences</span>
		    <jdoc:include type="modules" name="TopBar-UserMenu-Connecte" style="none" />     
	      </div>   
       </div>
       <?php } ?>
    </div>