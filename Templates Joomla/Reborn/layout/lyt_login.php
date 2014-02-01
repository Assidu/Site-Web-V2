        <div id="Banner">
        	<div class="profilBackground"><div class="a"><div class="b"><div class="c"></div></div></div></div>
    	</div>
     	<div id="Content" class="login" >
        	<jdoc:include type="component" />
        	<?php

	// TODO bloquer usage du script si non connecté
    $action=$_GET["action"];
    
    if($action == "list"){
    	$list = "{nom:'huguenin',prenom:'thomas'},{nom:'caillot',prenom:'fabien'},{nom:'clement',prenom:'mylene'}";
    	echo $list;
    } else if($action == "connect"){
    	echo "false";
    } else if($action == "remove"){
    	echo "true";
   	} else {
    	echo '<div class="migrate"><input type="submit" name="Submit" class="button" value="Migrer"></div>';	
    }
?>
	    </div>   