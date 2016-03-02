
</div>
<!--<div class="col-md-1 com-lg-1 col-sm-1">
</div>-->
    </div>
    
    
    
	<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 id="caption_header">Settings</h3>
                </div>
                <div class="modal-body">
                    <p id="contain_body">Here settings can be configured...</p>
                </div>
                <div class="modal-footer">
                    &nbsp;
                </div>
            </div>
        </div>
    </div>
    
    


</div><!--/.fluid-container-->

<div class="">
<hr>
<footer class="row">
        <p class="col-md-9 col-sm-9 col-xs-12 copyright">&copy; <a href="<?php echo base_url()?>" target="_blank">APP SIMRS</a> <?php echo date('Y') ?></p>

        <p class="col-md-3 col-sm-3 col-xs-12 powered-by">Powered by: <a
                href="http://usman.it/free-responsive-admin-template">SIMRS</a></p>
    </footer>
</div>

    
   <script>
	base_js="<?php echo base_url(); ?>";
	
		$(window).load(function() {	
         $('#preloader').fadeOut('slow', function(){
			  $(this).remove();
		 }); 
    });	
	</script>
    <script src="<?php echo base_url('assets/plugins/js/charisma.js');?>"></script>
</body>
</html>
