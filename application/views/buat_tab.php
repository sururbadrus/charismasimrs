            <div class="container">

                <form name="" action="" id="ubet_form" class="form-signin"  method="post">
                    <h4 class="form-signin-heading" ><u>NAMA CONTROLER TAB</u></h4>
                    <?php echo validation_errors(); ?>
                    
                    <div class="row">
                    	
                      
                        <div id="body" class="col-lg-3">
                            <label>Controller Name</label> 
                            <input type="text"  class="form-control validate[required]" placeholder="Controller Name" id="cname" name="cname" value="<?php echo set_value('cname'); ?>">
                        </div>
                        
                    </div>
                    
                    <h4 class="form-signin-heading" ><u>LINK TAB </u></h4>
                    <div class="row">
                     <div id="body"  class="col-lg-12">
                        <label>Link (Masukkan Nama Controler Gunakan ',' Sebagai Pemisah)</label>  <input type="text"  name="link_tab" id="link_tab"  class="form-control validate[required]" value="<?php echo set_value('link_tab');  ?>"   placeholder="Link Tab"  >
                    </div>
                    <div id="body"  class="col-lg-12">
                        <label>(Masukkan Label Tab Gunakan ',' Sebagai Pemisah)</label>  <input type="text"  name="link_tab_label" id="link_tab_label"  class="form-control validate[required]" value="<?php echo set_value('link_tab_label');  ?>"   placeholder="Label Tab"  >
                    </div>
                    
                    </div>
                    
                    <div id="body"  class="col-lg-3">
                        <input id="" type="submit" name="submit" class="btn btn-lg btn-primary" value="submit">
                        <input type="submit" name="download" class="btn btn-lg btn-primary " value="Dowload">
                    </div>

                    <div id="body"  class="col-lg-2">
                        
                    </div>
                </form>


                <div class="col-lg-12 ">

                   




                    <?php
                    if (isset($controller)) {
                        ?>
                        <h3> Controller</h3><h4><?php echo $controllername . '.php'; ?></h4>
                        <textarea class="textarea" rows="28" cols="50" style="width: 100%;">
                            <?php echo $controller; ?>
                        </textarea> 
                        <?php } ?>





<?php
if (isset($view_create)) {
    ?>
                        <h3>View</h3> <h4><?php echo $create_viewname . '.php'; ?></h4>
                        <textarea class="textarea" rows="28" cols="50" style="width: 100%;">
                        <?php echo $view_create; ?>
                        </textarea> 
                        <?php } ?>

                  


                    




                </div>




            </div> <!-- /container -->
          


<script type="text/javascript" >
    $(document).ready(function() {

        $('#ubet_form').validationEngine('attach', {scroll: false, addFailureCssClassToField: 'inputbox-error'});
    
	

	
	
	
	
	$( "#ubet_form" ).submit(function( event ) {
 
 		
        
			
		
        $.ajax({
            type: "post",
            url: "<?=base_url()?>/ciig/process_form",
            cache: false,
            data: $('#ubet_form').serialize(),
            success: function(json) {
				
            }
        });
	
	});
});
	
	
</script>
