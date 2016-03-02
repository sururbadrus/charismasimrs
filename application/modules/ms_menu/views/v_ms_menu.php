

<div class="row">




            <div class="row">
              
                  
                        
                     <h4 class="col-xs-12 col-sm-10 col-md-10 col-lg-10 "><u><strong>Master menu</strong></u></h4>
                    
                    
                        
               
                   
			</div>
							<?php
								$attributes = array('class' => 'form-group','name' => 'form_ms_menu31', 'id' => 'form_ms_menu31');
								echo form_open('', $attributes);
								?>
								
                                   
                                   <input name="id31" id="id31" type="hidden" value="" />
								      
                                   <input name="parent_id31" id="parent_id31" type="hidden" value="" />
								      
                               
								   						   
		<div class="row">
							 <div class="col-xs-8 col-sm-2 col-md-2 col-lg-2">  
					 
                                    <label>Parent kode</label>
                                    <div class="field">
										 										
                                        <input name="parent_kode31" id="parent_kode31" type="text"  class="xxwide text input validate[required] form-control" placeholder="Parent kode" value="" disabled />
										 
                                    </div>

                             </div>
                             <div class="col-xs-8 col-sm-2 col-md-2 col-lg-2">
                             <label>&nbsp;</label>
                             <div class="field">
                             	<button id="getParent31" type="button" class="btn btn-primary">Kode</button>
                             	</div>
                             </div>  
        </div>
        <div class="row">					      
					 
					 <div class="col-xs-8 col-sm-2 col-md-2 col-lg-2">  
					 
                                    <label>Kode</label>
                                    <div class="field">
										 										
                                        <input name="kode31" id="kode31" type="text"  class="xxwide text input validate[required] form-control" placeholder="Kode" value="" />
										 
                                    </div>
                             </div>   
					 
					 <div class="col-xs-8 col-sm-4 col-md-4 col-lg-4">  
					 
                                    <label>Nama</label>
                                    <div class="field">
										 										
                                        <input name="nama31" id="nama31" type="text"  class="xxwide text input validate[required] form-control" placeholder="Nama" value="" />
										 
                                    </div>
                             </div>   
		 </div>
        <div class="row">			 
					 <div class="col-xs-8 col-sm-4 col-md-4 col-lg-4">  
					 
                                    <label>Url</label>
                                    <div class="field">
										 										
                                        <input name="url31" id="url31" type="text"  class="xxwide text input validate[required] form-control" placeholder="Url" value="" />
										 
                                    </div>
                             </div>   
					 

					 
					 <div class="col-xs-8 col-sm-2 col-md-2 col-lg-2">  
					 
                                    <label>Status</label>
                                    <div class="field">
                                    	<select class="form-control" id="aktif31">
                                    	<option value="1" >Aktif</option>
                                    	<option value="0" >Tidak</option>
                                    </select>
										

 
                                    </div>
                             </div></div>   
                                          
                               <br />             
         <div class="row">                            
            			
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
             	
            	 <input type="button" id="simpandata31" class="btn btn-success" value="Simpan">&nbsp;&nbsp;
                 <input  type="button"  id="batal31" class="btn btn-info" value="Batal">&nbsp;&nbsp;
                 <input  type="button" id="hpus31" class="btn btn-danger" value="Hapus">&nbsp;&nbsp;
				 <!-- <a href='<?=site_url('ms_menu/export_pdf31')?>'	target='_blank'  class="btn btn-success"id="tampil_pdf31" >
					<i class="glyphicon glyphicon-download-alt"></i>
					PDF
				</a>&nbsp;&nbsp;
                  <a href='<?=site_url('ms_menu/excell31')?>'	target='_blank' class="btn btn-success"id="tampil_excel31" >
					<i class="glyphicon glyphicon-download-alt"></i>
					Excel
				</a> -->
                
                
                         
          </div>
			
		</div>
            <?              
			echo form_close();
			?>
		
		 <div class="row ">   
              <div class="col-xs-12 col-sm-10 col-md-9 col-lg-9 jqGrid"  >
             	
            	 <!--  <table id="list231"  cellpadding="0" cellspacing="0"></table>
                	<div id="pager231"></div> -->

               <div id="tree_menu"></div>
          		</div>
        </div>


    
</div> 

  

		
		 <script>
			
			 $(document).ready(function () {
		
			$("#tree_menu").dynatree({
				initAjax: {url: "<?php echo base_url() ?>index.php/ms_menu/ms_menu_tree/getTree", 
               	},
				   onActivate: function(node) {
				   	$('#simpandata31').val('Ubah');
					$('#parent_kode31').val(node.data.parent_kode);
					$('#parent_id31').val(node.data.menu_parent_id);
					$('#kode31').val(node.data.kode);
					$('#url31').val(node.data.url);
					$('#aktif31').val(node.data.aktif);
					$('#id31').val(node.data.menu_id);
					$('#nama31').val(node.data.nama);
				  },
      			});
			
			$("#simpandata31").click(function(){
			var action=$('#simpandata31').val();
			;
			
			
			
				if(action=='Simpan'){
							
							if($('#kode31').val()=='') {
								alert('Data Tidak Boleh Kosong'); 
								$('#kode31').focus();
								return false;
							}
							
							
							if($('#nama31').val()=='') {
								alert('Data Tidak Boleh Kosong'); 
								$('#nama31').focus();
								return false;
							}
							
							
							if($('#url31').val()=='') {
								alert('Data Tidak Boleh Kosong'); 
								$('#url31').focus();
								return false;
							}
							
							
							if($('#parent_kode31').val()=='') {
								alert('Data Tidak Boleh Kosong'); 
								$('#parent_kode31').focus();
								return false;
							}
							
							

							
					var conf = confirm("Yakin Akan Menyimpan Data Ini?");
				}
				else{
							
							if($('#id31').val()=='') {
								alert('Hiden Id Tidak Boleh Kosong'); 
								
								return false;
							}
							
							
							if($('#parent_id31').val()=='') {
								alert('Hiden Id Tidak Boleh Kosong'); 
								
								return false;
							}
							
							
							if($('#aktif31').val()=='') {
								alert('Hiden Id Tidak Boleh Kosong'); 
								
								return false;
							}
							
					
					
						
					var conf = confirm("Yakin Akan Mengubah Data Ini?");
				}
            	if (conf) {
				
				$.ajax({
						url : "<?=base_url()?>index.php/ms_menu/crud",
						data : {
							action : action,
							
							kode : $('#kode31').val(),
							
							nama : $('#nama31').val(),
							
							url : $('#url31').val(),
							
							parent_kode : $('#parent_kode31').val(),
							
							
							id : $('#id31').val(),
							parent_id : $('#parent_id31').val(),
							aktif : $('#aktif31').val(),
						},
						type : 'POST',
						dataType :'JSON',
						beforeSend:function(){
							                
						},
						success : function(data){
							
								alert(data.ket);
								// jQuery("#list231").trigger("reloadGrid");
								$("#batal31").trigger('click');
							
						 }
						});
					
				}
				
				return false;
		
				
		})
		
		
		$('#hpus31').click(function(){
			
			
							
							if($('#id31').val()=='') {
								alert('Pilih Data Yang Akan Di Hapus'); 
								
								return false;
							}
							
							
							if($('#parent_id31').val()=='') {
								alert('Pilih Data Yang Akan Di Hapus'); 
								
								return false;
							}
							
							
							if($('#aktif31').val()=='') {
								alert('Pilih Data Yang Akan Di Hapus'); 
								
								return false;
							}
							
					
				var conf = confirm("Yakin Akan Menghapus Data Ini?");
				
            	if (conf) {
					$.ajax({
					url : "<?=base_url()?>index.php/ms_menu/crud",
					data : {
						action : "del",
							id : $('#id31').val(),
							parent_id : $('#parent_id31').val(),
							aktif : $('#aktif31').val(),
					},
					type : 'POST',
					dataType :'JSON',
					beforeSend:function(){
						                
					},
					success : function(data){
						
						alert(data.ket);  
						// jQuery("#list231").trigger("reloadGrid");
						$("#batal31").trigger('click');
					 }
					});
				}
				
				
			
		
		
		});

		
		$("#batal31").click(function(){
			
			
			$('#simpandata31').val('Simpan');
			
						
						$('#id31').val('');
						
						$('#parent_id31').val('');
						
						$('#aktif31').val(1);
							$('#kode31').val('');
						
							$('#nama31').val('');
						
							$('#url31').val('');
						
							$('#parent_kode31').val('');
			$("#tree_menu").dynatree("getTree").reload();

						
			})
			
			
			$("#getParent31").click(function(){
			 
			  $.ajax({
				  		type: "post",
						url:"<?=base_url('ms_menu/ms_menu_tree')?>",
						dataType: "html",
						cache: true,
						success: function(hsl) {
							$('#caption_header').html('Menu Tree');
							$("#contain_body").html(hsl);
							$(".bs-example-modal-lg").modal("show");
						}
				  })
			})
				
			 })



			 		
			</script>
		
		
		
		


