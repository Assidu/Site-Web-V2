     	<div id="Content">
     		<div id="Banner">
	      		<img src=<?php echo '"'.$this->baseurl.'/images/Templates/banner_template.png'.'"' ?>/>
	    	</div>
     		<div class="item-page">
     			<div class="page-header">
					<h2>
						<a href="#"><?php echo $title; ?></a>
					</h2>
				</div>
        		<jdoc:include type="component" />
        	</div>
	    </div>
        <?php include 'layout/lyt_footer.php';  ?>