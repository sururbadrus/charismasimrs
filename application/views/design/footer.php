
</div>
<div class="col-md-1 com-lg-1 col-sm-1">
</div>
    </div>
    
    <hr>
    
	<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"></button>
                    <h3>Settings</h3>
                </div>
                <div class="modal-body">
                    <p>Here settings can be configured...</p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                    <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
                </div>
            </div>
        </div>
    </div>
    
    <footer class="row">
        <p class="col-md-9 col-sm-9 col-xs-12 copyright">&copy; <a href="http://usman.it" target="_blank">Muhammad
                Usman</a> 2012 - <?php echo date('Y') ?></p>

        <p class="col-md-3 col-sm-3 col-xs-12 powered-by">Powered by: <a
                href="http://usman.it/free-responsive-admin-template">Charisma</a></p>
    </footer>


</div><!--/.fluid-container-->

    
   
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
