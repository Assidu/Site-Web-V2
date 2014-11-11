    <div id="TopBar">
       <img class="logo" src=<?php echo '"'.$this->params->get('img_logo').'"' ?>"/>
       <jdoc:include type="modules" name="TopBar-Menu-Connecte" style="none" />    
       <div class="toolBar">    
			<div id='Login' class='btn' >
				<span>Pr&eacute;f&eacute;rences</span>
				<jdoc:include type="modules" name="TopBar-UserMenu-Connecte" style="none" />     
			</div>   
       </div>
    </div>