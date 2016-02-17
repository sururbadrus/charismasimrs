     
            <div class="container">

                <form name="" action="" id="ubet_form" class="form-signin"  method="post">
                    <h4 class="form-signin-heading" ><u><strong>TABLE MVC</strong></u></h4>
                    <?php echo validation_errors(); ?>
                    
                    <div class="row">
                    	
                      
                        <div id="body" class="col-lg-3">
                            <label>Controller Name</label> 
                            <input type="text" style="font-size:15px; font-weight:bold; color:#333" class="form-control validate[required]" placeholder="Controller Name" id="cname" name="cname" value="<?php echo set_value('cname'); ?>">
                        </div>
                        
                         <div id="body" class="col-lg-3">
                            <label>Pengunanan</label> 
                            <select class="form-control" style="font-size:15px; font-weight:bold; color:#333"  id="penggunaan" name="penggunaan" ><option value="1" <?php echo  set_select('penggunaan', '1', TRUE); ?> >Independen Controler</option><option value="2" <?php echo  set_select('penggunaan', '2'); ?> >Tampil Pada Tab / PopUP</option></select>
                        </div>
                        
                    </div>
                    
                    <h4 class="form-signin-heading" ><u><strong>GRID</strong></u></h4>
                    <div class="row">
                    <div id="body"  class="col-lg-12">
                        <label>Full Query Grid</label>  <textarea style="font-size:15px; font-weight:bold; color:#333" id="full_q"  name="full_q"  class="form-control validate[required]" spellcheck="false"  rows="10" cols="50"  placeholder="Full Query"  ><?php echo set_value('full_q');  ?></textarea>
                    </div>
                    
                    <div id="body"  class="col-lg-7">
                        <label>Caption Jgqrid</label>  <input style="font-size:15px; font-weight:bold; color:#333" spellcheck="false" type="text"  name="jdl_jqgrid" id="jdl_jqgrid"  class="form-control validate[required]" value="<?php echo set_value('jdl_jqgrid');  ?>"   placeholder="Judul Jqgrid"  >
                    </div>
                     <div id="body"  class="col-lg-3">
                        <label>Order By (Nama Field)</label>  <input style="font-size:15px; font-weight:bold; color:#333" type="text"  name="orderby" id="orderby"  class="form-control validate[required]" value="<?php echo set_value('orderby');  ?>"   placeholder="Pengurutan"  >
                    </div>
                    <div id="body"  class="col-lg-2">
                        <label>Desc/Asc</label>  <select style="font-size:15px; font-weight:bold; color:#333" id="desc_asc" name="desc_asc"  class="form-control validate[required]"    >
                        <option  value="asc">Asc</option> 
                        <option  value="desc">Desc</option>
                        </select>
                    </div>
                    
                    <div id="body"  class="col-lg-3">
                       
                    </div>
                    </div>
                    
                    <div class="row">
					<div id="body"  class="col-lg-12">
                        <label>Field Tampil (Use # Sebagai Pemisah)</label>  <textarea  style="font-size:15px; font-weight:bold; color:#333"  name="tselect" id="tselect"  class="form-control validate[required]"  spellcheck="false" placeholder="Field Tampil"  rows="4" cols="50"  ><?php echo set_value('tselect');  ?></textarea>
                    </div>
					<div id="body"  class="col-lg-12">
                        <label>Field Hiden (Use # Sebagai Pemisah)</label>  <textarea style="font-size:15px; font-weight:bold; color:#333" id="hselect"  name="hselect"  class="form-control validate[required]" spellcheck="false"  placeholder="Field Tampil" rows="4" cols="50" ><?php echo set_value('hselect'); ?></textarea>
                    </div>
                    </div>
					
                    
                    
                     <div class="row">
					<div id="body"  class="col-lg-12">
                        <label>Header Grid (Use # Sebagai Pemisah)</label>  <textarea id="jqgrid" name="jqgrid"  class="form-control validate[required]" spellcheck="false" rows="4" cols="50" style="font-size:15px; font-weight:bold; color:#333" placeholder="Header Grid"  ><?php echo set_value('jqgrid');  ?></textarea >
                    </div>
					<div id="body"  class="col-lg-12">
                        <label>Ukuran Grid (Use # Sebagai Pemisah)</label>  <textarea style="font-size:15px; font-weight:bold; color:#333" id="ugrid" name="ugrid"  class="form-control rows="4" cols="50" validate[required]" spellcheck="false"  placeholder="Ukuran Grid"><?php echo set_value('ugrid');?></textarea>
                    </div>
                    
					</div>
                    
                    
                     <h4 class="form-signin-heading" ><u><strong>FORM</strong></u></h4>
                    <div class="row">
                    <div id="body"  class="col-lg-12">
                            <label>Form title</label>  <input style="font-size:15px; font-weight:bold; color:#333" type="text" spellcheck="false" name="fname" id="fname"  class="form-control validate[required]"   placeholder="Form title" value="<?php echo set_value('fname'); ?>" >
                        </div>
                        <div id="body"  class="col-lg-12">
                            <label>Field Tampil (Use # Sebagai Pemisah)</label>  <textarea spellcheck="false" name="form_tampil" id="form_tampil"  class="form-control validate[required]" style="font-size:15px; font-weight:bold; color:#333"  rows="4" cols="50" placeholder="Form Tampil"  ><?php echo set_value('form_tampil');  ?></textarea>
                        </div>
                         <div id="body"  class="col-lg-12">
                            <label>Field Hiden( Use # )</label>  <textarea  style="font-size:15px; font-weight:bold; color:#333" spellcheck="false" rows="4" cols="50"  name="form_hiden"  id="form_hiden" class="form-control validate[required]"   placeholder="Form Hiden"  ><?php echo set_value('form_hiden');  ?></textarea>
                        </div>
                        <div id="body"  class="col-lg-12">
                            <label>Validasi Form( Use # Sebagai Pemisah Jika Y Maka ada validasi Kalau Tidak Kosongi)</label>  <textarea  style="font-size:15px; font-weight:bold; color:#333" spellcheck="false" rows="4" cols="50"  name="validasi_form"  id="validasi_form" class="form-control validate[required]"   placeholder="Form Hiden"  ><?php echo set_value('validasi_form');  ?></textarea>
                        </div>
                    
                    </div>
                    
                    <div class="row">
                        <div id="body"  class="col-lg-12">
                            <label>Tipe Field (dd:Dropdown,chk=Cheked,ta=Text area,dp=Datepicker,ac=Autocomplite Use # Sebagai Pemisah)</label>  <textarea style="font-size:15px; font-weight:bold; color:#333" spellcheck="false"  name="tipe_field" id="tipe_field"  class="form-control validate[required]"    placeholder="Tipe Field"  ><?php echo set_value('tipe_field');  ?></textarea>
                        </div>
                        
                         <div id="body"  class="col-lg-12">
                            <label>Caption Field</label>  <textarea style="font-size:15px; font-weight:bold; color:#333"  spellcheck="false" rows="4" cols="50" name="caption_field" id="caption_field"  class="form-control validate[required]"   placeholder="Caption Field"  ><?php echo set_value('caption_field');  ?></textarea>
                        </div>
                        
                         <div id="body"  class="col-lg-12">
                            <label>Load Query Field (Use # Sebagai Pemisah Antar Query)</label>  <textarea   name="load_field"  id="load_field"  class="form-control validate[required]" spellcheck="false" style="font-size:15px; font-weight:bold; color:#333" rows="8" cols="50"  placeholder="Load Field"  ><?php echo set_value('load_field');  ?></textarea>
                        </div>
                        
                        
                       
                        
                    
                    </div>
                    
                     <h4 class="form-signin-heading" ><u><strong>PROSES INSERT</strong></u></h4>
                    <div class="row">
                        <div id="body"  class="col-lg-12">
                            <label>Tabel Insert Gunakan Tanda # Sebagai Pemisah</label>  <input style="font-size:15px; font-weight:bold; color:#333" type="text"  name="tbl_insert" id="tbl_insert"  class="form-control validate[required]" spellcheck="false" value="<?php echo set_value('tbl_insert');  ?>"   placeholder="Tabel Insert"  >
                        </div>
                         <div id="body"  class="col-lg-12">
                            <label>Field Insert Gunakan # Sebagai Pemisah</label>  <textarea style="font-size:15px; font-weight:bold; color:#333" rows="4" cols="50" name="field_insert"  id="field_insert" class="form-control validate[required]"  spellcheck="false"  placeholder="Field Insert"  ><?php echo set_value('field_insert');  ?></textarea>
                        </div>
                        
                    
                    </div>
                    
                    
                   <h4 class="form-signin-heading" ><u><strong>PROSES UPDATE</strong></u></h4>
                    <div class="row">
                        <div id="body"  class="col-lg-12">
                            <label>Tabel Update  Gunakan Tanda # Sebagai Pemisah</label>  <input type="text"  name="tbl_update" id="tbl_update"  class="form-control validate[required]" style="font-size:15px; font-weight:bold; color:#333" value="<?php echo set_value('tbl_update');  ?>"   placeholder="Tabel Update"  >
                        </div>
                         <div id="body"  class="col-lg-12">
                            <label>Field Update Gunakan # Sebagai Pemisah</label>  <textarea  spellcheck="false" name="field_update" id="field_update"  class="form-control validate[required]" style="font-size:15px; font-weight:bold; color:#333" rows="4" cols="50" placeholder="Field Update"  ><?php echo set_value('field_update');  ?></textarea>
                        </div>
                        
                         <div id="body"  class="col-lg-12">
                            <label>ID Update</label>  <input type="text" style="font-size:15px; font-weight:bold; color:#333" spellcheck="false"  name="id_update" id="id_update"  class="form-control validate[required]" value="<?php echo set_value('id_update');  ?>"   placeholder="ID Update"  >
                        </div>
                        
                    
                    </div>
                    
                    <h4 class="form-signin-heading" ><u><strong>PROSES DELETE</strong></u></h4>
                    <div class="row">
                        <div id="body"  class="col-lg-12">
                            <label>Tabel Delete  Gunakan Tanda # Sebagai Pemisah</label>  <input type="text"  name="tbl_delete" id="tbl_delete"  class="form-control" style="font-size:15px; font-weight:bold; color:#333" value="<?php echo set_value('tbl_delete');  ?>"   placeholder="Tabel Delete"  >
                        </div>
                         
                        
                         <div id="body"  class="col-lg-12">
                            <label>ID Delete</label>  <input type="text" spellcheck="false" name="id_delete" id="id_delete"  class="form-control" style="font-size:15px; font-weight:bold; color:#333" value="<?php echo set_value('id_delete');  ?>"   placeholder="ID Delete"  >
                        </div>
                        
                    
                    </div>
                    
                    <div id="body"   class="col-lg-3">
                        <input id="" type="submit" name="submit" class="btn btn-lg btn-primary" value="submit">
                        <input  type="submit"  name="download" class="btn btn-lg btn-primary " value="Dowload">
                        
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
		
    $('#tselect').change(function(){
		var res =$('#tselect').val();
		res= res.replace(/,/g, "#"); 
		$('#tselect').val(res);
		});
	$('#hselect').change(function(){
		var res =$('#hselect').val();
		res= res.replace(/,/g, "#"); 
		$('#hselect').val(res);
		})
	$('#jqgrid').change(function(){
		var res =$('#jqgrid').val();
		res= res.replace(/,/g, "#"); 
		$('#jqgrid').val(res);
		})
	$('#ugrid').change(function(){
		var res =$('#ugrid').val();
		res= res.replace(/,/g, "#"); 
		$('#ugrid').val(res);
		})
	$('#form_tampil').change(function(){
		var res =$('#form_tampil').val();
		res= res.replace(/,/g, "#"); 
		$('#form_tampil').val(res);
		})
	$('#form_hiden').change(function(){
		var res =$('#form_hiden').val();
		res= res.replace(/,/g, "#"); 
		$('#form_hiden').val(res);
		})
	$('#tipe_field').change(function(){
		var res =$('#tipe_field').val();
		res= res.replace(/,/g, "#"); 
		$('#tipe_field').val(res);
		})
	$('#caption_field').change(function(){
		var res =$('#caption_field').val();
		res= res.replace(/,/g, "#"); 
		$('#caption_field').val(res);
		})
	//$('#load_field').change(function(){
//		var res =$('#load_field').val();
//		res= res.replace(/,/g, "#"); 
//		$('#load_field').val(res);
//		})
	$('#tbl_insert').change(function(){
		var res =$('#tbl_insert').val();
		res= res.replace(/,/g, "#"); 
		$('#tbl_insert').val(res);
		})
	//$('#field_insert').change(function(){
//		var res =$('#field_insert').val();
//		res= res.replace(/,/g, "#"); 
//		$('#field_insert').val(res);
//		})
	$('#tbl_update').change(function(){
		var res =$('#tbl_update').val();
		res= res.replace(/,/g, "#"); 
		$('#tbl_update').val(res);
		})
	$('#id_update').change(function(){
		var res =$('#id_update').val();
		res= res.replace(/,/g, "#"); 
		$('#id_update').val(res);
		})
		$('#tbl_delete').change(function(){
		var res =$('#tbl_delete').val();
		res= res.replace(/,/g, "#"); 
		$('#tbl_delete').val(res);
		})
		
		
		$('#id_delete').change(function(){
		var res =$('#id_delete').val();
		res= res.replace(/,/g, "#"); 
		$('#id_delete').val(res);
		})
		$('#validasi_form').change(function(){
		var res =$('#validasi_form').val();
		res= res.replace(/,/g, "#"); 
		$('#validasi_form').val(res);
		})
		

	
	
	
	
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
			jml_array_tselect=jml_array_tselect.split('#');
			jml_array_tselect=jml_array_tselect.length;
			
		var jml_array_jqgrid=$('#jqgrid').val();
			jml_array_jqgrid=jml_array_jqgrid.split('#');
			jml_array_jqgrid=jml_array_jqgrid.length;
			
		var jml_array_ugrid=$('#ugrid').val();
			jml_array_ugrid=jml_array_ugrid.split('#');
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
			jml_array_ft=jml_array_ft.split('#');
			jml_array_ft=jml_array_ft.length;
			
		var jml_array_tf=$('#tipe_field').val();
			jml_array_tf=jml_array_tf.split('#');
			jml_array_tf=jml_array_tf.length;
			
		var jml_array_cf=$('#caption_field').val();
			jml_array_cf=jml_array_cf.split('#');
			jml_array_cf=jml_array_cf.length;
		
		var jml_array_lf=$('#load_field').val();
			jml_array_lf=jml_array_lf.split('#');
			jml_array_lf=jml_array_lf.length;
		
		var jml_array_vf=$('#validasi_form').val();
			jml_array_vf=jml_array_vf.split('#');
			jml_array_vf=jml_array_vf.length;
			
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
			if(jml_array_ft!=jml_array_vf){
				$('#validasi_form').focus();
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
