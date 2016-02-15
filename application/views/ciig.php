            <div class="container">

                <form name="" action="" id="ubet_form" class="form-signin"  method="post">
                    <h4 class="form-signin-heading" ><u>TABLE MVC</u></h4>
                    <?php echo validation_errors(); ?>
                    
                    <div class="row">
                    	
                      
                        <div id="body" class="col-lg-3">
                            <label>Controller Name</label> 
                            <input type="text"  class="form-control validate[required]" placeholder="Controller Name" id="cname" name="cname" value="<?php echo set_value('cname'); ?>">
                        </div>
                        
                         <div id="body" class="col-lg-3">
                            <label>Pengunanan</label> 
                            <select class="form-control"   id="penggunaan" name="penggunaan" ><option value="1" <?php echo  set_select('penggunaan', '1', TRUE); ?> >Independen Controler</option><option value="2" <?php echo  set_select('penggunaan', '2'); ?> >Tampil Pada Tab / PopUP</option></select>
                        </div>
                        
                    </div>
                    
                    <h4 class="form-signin-heading" ><u>JQGRID</u></h4>
                    <div class="row">
                    <div id="body"  class="col-lg-12">
                        <label>Full Query Grid</label>  <textarea id="full_q"  name="full_q"  class="form-control validate[required]" rows="5" cols="50"  placeholder="Full Query"  ><?php echo set_value('full_q');  ?></textarea>
                    </div>
                    
                    <div id="body"  class="col-lg-7">
                        <label>Caption Jgqrid</label>  <input type="text"  name="jdl_jqgrid" id="jdl_jqgrid"  class="form-control validate[required]" value="<?php echo set_value('jdl_jqgrid');  ?>"   placeholder="Judul Jqgrid"  >
                    </div>
                     <div id="body"  class="col-lg-3">
                        <label>Order By (Nama Field)</label>  <input type="text"  name="orderby" id="orderby"  class="form-control validate[required]" value="<?php echo set_value('orderby');  ?>"   placeholder="Pengurutan"  >
                    </div>
                    <div id="body"  class="col-lg-2">
                        <label>Desc/Asc</label>  <select id="desc_asc" name="desc_asc"  class="form-control validate[required]"    >
                        <option  value="asc">Asc</option> 
                        <option  value="desc">Desc</option>
                        </select>
                    </div>
                    
                    <div id="body"  class="col-lg-3">
                       
                    </div>
                    </div>
                    
                    <div class="row">
					<div id="body"  class="col-lg-12">
                        <label>Field Tampil (Use Koma Sebagai Pemisah)</label>  <textarea    name="tselect" id="tselect"  class="form-control validate[required]"   placeholder="Field Tampil"  ><?php echo set_value('tselect');  ?></textarea>
                    </div>
					<div id="body"  class="col-lg-12">
                        <label>Field Hiden (Use Koma Sebagai Pemisah)</label>  <textarea  id="hselect"  name="hselect"  class="form-control validate[required]"   placeholder="Field Tampil"  ><?php echo set_value('hselect'); ?></textarea>
                    </div>
                    </div>
					
                    
                    
                     <div class="row">
					<div id="body"  class="col-lg-12">
                        <label>Header Grid (Use Koma Sebagai Pemisah)</label>  <textarea id="jqgrid" name="jqgrid"  class="form-control validate[required]"   placeholder="Header Grid"  ><?php echo set_value('jqgrid');  ?></textarea >
                    </div>
					<div id="body"  class="col-lg-12">
                        <label>Ukuran Grid (Use Koma Sebagai Pemisah)</label>  <textarea  id="ugrid" name="ugrid"  class="form-control validate[required]"   placeholder="Ukuran Grid"><?php echo set_value('ugrid');?></textarea>
                    </div>
                    
					</div>
                    
                    
                     <h4 class="form-signin-heading" ><u>FORM</u></h4>
                    <div class="row">
                    <div id="body"  class="col-lg-12">
                            <label>Form title</label>  <input type="text" name="fname" id="fname"  class="form-control validate[required]"   placeholder="Form title" value="<?php echo set_value('fname'); ?>" >
                        </div>
                        <div id="body"  class="col-lg-12">
                            <label>Field Tampil (Use Koma Sebagai Pemisah)</label>  <textarea  name="form_tampil" id="form_tampil"  class="form-control validate[required]"    placeholder="Form Tampil"  ><?php echo set_value('form_tampil');  ?></textarea>
                        </div>
                         <div id="body"  class="col-lg-12">
                            <label>Field Hiden( Use Koma )</label>  <input type="text"  name="form_hiden"  id="form_hiden" class="form-control validate[required]" value="<?php echo set_value('form_hiden');  ?>"   placeholder="Form Hiden"  >
                        </div>
                        
                    
                    </div>
                    
                    <div class="row">
                        <div id="body"  class="col-lg-12">
                            <label>Tipe Field (dd:Dropdown,chk=Cheked,ta=Text area,dp=Datepicker,ac=Autocomplite Use Koma Sebagai Pemisah)</label>  <input type="text"  name="tipe_field" id="tipe_field"  class="form-control validate[required]" value="<?php echo set_value('tipe_field');  ?>"   placeholder="Tipe Field"  >
                        </div>
                        
                         <div id="body"  class="col-lg-12">
                            <label>Caption Field</label>  <input type="text"  name="caption_field" id="caption_field"  class="form-control validate[required]" value="<?php echo set_value('caption_field');  ?>"   placeholder="Caption Field"  >
                        </div>
                        
                         <div id="body"  class="col-lg-12">
                            <label>Load Query Field (Use | Sebagai Pemisah)</label>  <textarea   name="load_field"  id="load_field" class="form-control validate[required]" placeholder="Load Field"  ><?php echo set_value('load_field');  ?></textarea>
                        </div>
                        
                        
                       
                        
                    
                    </div>
                    
                     <h4 class="form-signin-heading" ><u>PROSES INSERT</u></h4>
                    <div class="row">
                        <div id="body"  class="col-lg-12">
                            <label>Tabel Insert Gunakan Tanda Koma Sebagai Pemisah</label>  <input type="text"  name="tbl_insert" id="tbl_insert"  class="form-control validate[required]" value="<?php echo set_value('tbl_insert');  ?>"   placeholder="Tabel Insert"  >
                        </div>
                         <div id="body"  class="col-lg-6">
                            <label>Field Insert Gunakan * Sebagai Pemisah</label>  <textarea   name="field_insert"  id="field_insert" class="form-control validate[required]"    placeholder="Field Insert"  ><?php echo set_value('field_insert');  ?></textarea>
                        </div>
                        
                    
                    </div>
                    
                    
                   <h4 class="form-signin-heading" ><u>PROSES UPDATE</u></h4>
                    <div class="row">
                        <div id="body"  class="col-lg-12">
                            <label>Tabel Update  Gunakan Tanda Koma Sebagai Pemisah</label>  <input type="text"  name="tbl_update" id="tbl_update"  class="form-control validate[required]" value="<?php echo set_value('tbl_update');  ?>"   placeholder="Tabel Update"  >
                        </div>
                         <div id="body"  class="col-lg-12">
                            <label>Field Update Gunakan * Sebagai Pemisah</label>  <textarea   name="field_update" id="field_update"  class="form-control validate[required]"   placeholder="Field Update"  ><?php echo set_value('field_update');  ?></textarea>
                        </div>
                        
                         <div id="body"  class="col-lg-12">
                            <label>ID Update</label>  <input type="text"  name="id_update" id="id_update"  class="form-control validate[required]" value="<?php echo set_value('id_update');  ?>"   placeholder="ID Update"  >
                        </div>
                        
                    
                    </div>
                    
                    <h4 class="form-signin-heading" ><u>PROSES DELETE</u></h4>
                    <div class="row">
                        <div id="body"  class="col-lg-12">
                            <label>Tabel Delete  Gunakan Tanda Koma Sebagai Pemisah</label>  <input type="text"  name="tbl_delete" id="tbl_delete"  class="form-control" value="<?php echo set_value('tbl_delete');  ?>"   placeholder="Tabel Delete"  >
                        </div>
                         
                        
                         <div id="body"  class="col-lg-12">
                            <label>ID Delete</label>  <input type="text"  name="id_delete" id="id_delete"  class="form-control" value="<?php echo set_value('id_delete');  ?>"   placeholder="ID Delete"  >
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
                    if (isset($model)) {
                        ?>
                        <h3> Model</h3><h4><?php echo $modelname . '.php'; ?></h4>
                        <textarea class="textarea" rows="28" cols="50" style="width: 100%;">
                            <?php echo $model; ?>
                        </textarea> 
                    <?php } ?>




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
                        <h3>Create Form</h3> <h4><?php echo $create_viewname . '.php'; ?></h4>
                        <textarea class="textarea" rows="28" cols="50" style="width: 100%;">
                        <?php echo htmlentities($view_create); ?>
                        </textarea> 
                        <?php } ?>

                    <?php
                    if (isset($javascript)) {
                        ?>
                        <h3>Javas Cript</h3>  <h4><?php echo $javascript_name . '.php'; ?></h4>
                        <textarea class="textarea" rows="28" cols="50" style="width: 100%;">
                        <?php echo $javascript; ?>
                        </textarea> 
<?php } ?>


                    <?php
                    if (isset($view_header)) {
                        ?>
                        <h3>Header structure</h3><h4><?php echo $header . '.php'; ?></h4>
                        <textarea class="textarea" rows="28" cols="50" style="width: 100%;">
                        <?php echo $view_header; ?>
                        </textarea> 
                    <?php } ?>

                        <?php
                        if (isset($view_footer)) {
                            ?>
                        <h3>List Form</h3><h4><?php echo $footer . '.php'; ?></h4>
                        <textarea class="textarea" rows="28" cols="50" style="width: 100%;">
                        <?php echo $view_footer; ?>
                        </textarea> 
                    <?php } ?>





                </div>




            </div> <!-- /container -->
          


<script type="text/javascript" >
    $(document).ready(function() {

        $('#ubet_form').validationEngine('attach', {scroll: false, addFailureCssClassToField: 'inputbox-error'});
    
	

	
	
	
	
	$( "#ubet_form" ).submit(function( event ) {
 
 		
        //event.preventDefault();
        

        //var valid = jQuery('#ubet_form').validationEngine('validate');
//        
//
//        if (valid == false) {
//            return false;
//
//        }
		
		
		var jml_array_tselect=$('#tselect').val();
			jml_array_tselect=jml_array_tselect.split(',');
			jml_array_tselect=jml_array_tselect.length;
			
		var jml_array_jqgrid=$('#jqgrid').val();
			jml_array_jqgrid=jml_array_jqgrid.split(',');
			jml_array_jqgrid=jml_array_jqgrid.length;
			
		var jml_array_ugrid=$('#ugrid').val();
			jml_array_ugrid=jml_array_ugrid.split(',');
			jml_array_ugrid=jml_array_ugrid.length;
			
			if(jml_array_tselect!=jml_array_jqgrid){
				$('#tselect').focus();
				alert('Jml colom tidak konsisten');
				return false;
				}
				
			if(jml_array_tselect!=jml_array_ugrid){
				$('#jqgrid').focus();
				alert('Jml colom tidak konsisten');
				return false;
				}
				
			if(jml_array_jqgrid!=jml_array_ugrid){
				$('#ugrid').focus();
				alert('Jml colom tidak konsisten');
				return false;
				}
			
		
		var jml_array_ft=$('#form_tampil').val();
			jml_array_ft=jml_array_ft.split(',');
			jml_array_ft=jml_array_ft.length;
			
		var jml_array_tf=$('#tipe_field').val();
			jml_array_tf=jml_array_tf.split(',');
			jml_array_tf=jml_array_tf.length;
			
		var jml_array_cf=$('#caption_field').val();
			jml_array_cf=jml_array_cf.split(',');
			jml_array_cf=jml_array_cf.length;
		
		var jml_array_lf=$('#load_field').val();
			jml_array_lf=jml_array_lf.split('|');
			jml_array_lf=jml_array_lf.length;
			
			
			if(jml_array_ft!=jml_array_tf){
				$('#form_tampil').focus();
				alert('Jml colom tidak konsisten');
				return false;
				}
			if(jml_array_ft!=jml_array_cf){
				$('#caption_field').focus();
				alert('Jml colom tidak konsisten');
				return false;
				}
			if(jml_array_ft!=jml_array_lf){
				$('#load_field').focus();
				alert('Jml colom tidak konsisten');
				return false;
				}
			
			
			if(jml_array_cf!=jml_array_lf){
				$('#load_field').focus();
				alert('Jml colom tidak konsisten');
				return false;
				}
				
			if(jml_array_cf!=jml_array_tf){
				$('#tipe_field').focus();
				alert('Jml colom tidak konsisten');
				return false;
				}

			
		
        $.ajax({
            type: "post",
            url: "<?=base_url()?>/crud/process_form",
            cache: false,
            data: $('#ubet_form').serialize(),
            success: function(json) {
				
            }
        });
	
	});
});
	
	
</script>
