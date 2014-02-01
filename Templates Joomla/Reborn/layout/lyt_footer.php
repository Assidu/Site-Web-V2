    <div id="Footer">
      <div class="center">
        <span>
          <h1>ASSIDU</h1>
          <p>Le r&eacute;seau des anciens de l'UTBM, ENIBe, UTCS et IPS&eacute;<br>13 rue Thierry Mieg 90 000 belfort</p>
        </span>
        <?php /*if($user->guest)*/ if(true){ ?>
        <jdoc:include type="modules" name="Footer-Accueil" style="xhtml" />
        <?php }else{ ?>
        <jdoc:include type="modules" name="Footer-Connecte" style="xhtml" />        
        <?php } ?>
      </div>
    </div>