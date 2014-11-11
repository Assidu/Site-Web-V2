    	<?php include 'lyt_topbar_public.php';?>
     	<div id="Register-Background" class="background-tile">
	       	<div class="center-in-div-1">
	       	<div class="center-in-div-2">
	       	<div class="center-in-div-3">
	       	  <div id="Register-Panel" class="center-in-div-panel">
		       	<div class="panel" style="margin-bottom:1em;">
			    	<jdoc:include type="component" />
	          	</div>
				<div class="panel">
					<jdoc:include type="modules" name="position-7" /> <!-- TODO changer nom position -->
				</div>
	          </div>
	        </div>
	        </div>
	        </div>
	    </div>   
	    <script> /* TODO déplacer dans module migration */
	    /* Init */
	    var migrationAssiduV1V2 = false;
	    String.prototype.sansAccent = function(){
		    var accent = [
		        /[\300-\306]/g, /[\340-\346]/g, // A, a
		        /[\310-\313]/g, /[\350-\353]/g, // E, e
		        /[\314-\317]/g, /[\354-\357]/g, // I, i
		        /[\322-\330]/g, /[\362-\370]/g, // O, o
		        /[\331-\334]/g, /[\371-\374]/g, // U, u
		        /[\321]/g, /[\361]/g, // N, n
		        /[\307]/g, /[\347]/g, // C, c
		    ];
		    var noaccent = ['A','a','E','e','I','i','O','o','U','u','N','n','C','c'];
		     
		    var str = this;
		    for(var i = 0; i < accent.length; i++){
		        str = str.replace(accent[i], noaccent[i]);
		    }
		     
		    return str;
		}
	    var determineIdentifiant = function(e){
	    	if(migrationAssiduV1V2 === false){
	    			var emailavie =  new String($('#firstname')[0].value + '.' + $('#lastname')[0].value);
	    			emailavie.toLowerCase();
	    			emailavie = emailavie.sansAccent();
	    			emailavie = emailavie.replace(/ /g, '.');
					$('#username')[0].value = emailavie;
			}
	    };
        $("document").ready(function (e) {
			$('#firstname').keyup(determineIdentifiant);
			$('#lastname').keyup(determineIdentifiant);
        });
        </script>