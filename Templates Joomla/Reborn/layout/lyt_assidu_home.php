    <?php include 'lyt_topbar_public.php';?>
    
	<script>
        $("document").ready(function (e) {
        	$("#KnowMoreBtn").click(function(){
        		$("#Page").css('display','block');
        		$("#TitleTile").css('top','-100%');
        		$("#TopBar").toggleClass('solid');
        	});
        });
	</script>
	
	<jdoc:include type="component" />
