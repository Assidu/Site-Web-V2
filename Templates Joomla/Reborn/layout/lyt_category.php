<?php if($idCat == '9'){ ?>
	<script>
    /* Init of the banner news scripts */
    $("document").ready(function (e) {
		var news = $('.news li');
		var current = 0;
		news[current].setAttribute('style', 'opacity:100;');
		var launchTimer = function(){
			var i = setInterval(
				function(){
					news[current].setAttribute('style', 'opacity:0;');
					current = (current + 1) % news.length;
					news[current].setAttribute('style', 'opacity:100;');
				},
				5000
			);
			return i;
		};		
		var timer = launchTimer();
		$('#BannerNewsLeft').click(function(){
			window.clearInterval(timer);
			news[current].setAttribute('style', 'opacity:0;');
			if(current > 0){
			current =(current - 1)
			}else{
				 current = news.length - 1;
			}
			news[current].setAttribute('style', 'opacity:100;');		
			timer = launchTimer();
		});
		$('#BannerNewsRight').click(function(){
			window.clearInterval(timer);
			news[current].setAttribute('style', 'opacity:0;');
			current = (current + 1) % news.length;
			news[current].setAttribute('style', 'opacity:100;');		
			timer = launchTimer();
		});
    });
</script>
    <div id="BannerNews">
      <div id="BannerNewsLeft" class="btn"></div>
      <jdoc:include type="modules" name="BannerNews" />
      <div id="BannerNewsRight" class="btn"></div>
    </div>
    <div id="Content">
      <div id="LeftModules">
      	<div class="partners dug" style="overflow:hidden;">
      		<h2>Partenaires</h2>
      		<img src="/site-v2_dev3/images/partenaires/ae.jpg" />
      		<img src="/site-v2_dev3/images/partenaires/logoUTBM.jpg" />
      		<img src="/site-v2_dev3/images/partenaires/LogoBelfort.jpg" />
      		<img src="/site-v2_dev3/images/partenaires/conseil general belfort.jpg" />
      		<img src="/site-v2_dev3/images/partenaires/montbeliard.jpg" />
      	</div>
      </div>
      <div id="RightModules">
      	<jdoc:include type="component" />
      </div>
    </div>
	<?php } else { ?>
    <div id="Content">
      	<jdoc:include type="component" />
    </div>
	<?php } ?>