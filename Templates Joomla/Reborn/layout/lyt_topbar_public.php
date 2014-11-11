    <div id="TopBar" class="<?php echo $topbar_style; ?>">
       <img class="logo" src=<?php echo '"'.$this->params->get('img_logo').'"' ?> />
       <jdoc:include type="modules" name="TopBar-Menu-Accueil" style="none" />
       <jdoc:include type="modules" name="TopBar-UserMenu-Accueil" style="none" />
    </div>