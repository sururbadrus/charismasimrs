

    <hr>

 
    <footer class="row">
        <p class="col-md-9 col-sm-9 col-xs-12 copyright">&copy; <a href="http://usman.it" target="_blank">Muhammad
                Usman</a> 2012 - <?php echo date('Y') ?></p>

        <p class="col-md-3 col-sm-3 col-xs-12 powered-by">Powered by: <a
                href="http://usman.it/free-responsive-admin-template">Charisma</a></p>
    </footer>
</div>

</div><!--/.fluid-container-->

    
   <?php
    if (isset($jsku) && $jsku!='') {
				
                echo assets_jsku(array($jsku));
            }
   ?>
    <script>
	base_js="<?php echo base_url(); ?>";
	
		$(window).load(function() {	
         $('#preloader').fadeOut('slow', function(){
			  $(this).remove();
		 }); 
    });	
	</script>
    
</body>
</html>
