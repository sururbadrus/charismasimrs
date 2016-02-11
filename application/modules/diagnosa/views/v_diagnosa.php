                        

<div class="row">




            <div class="row">
              
                  
                        
                     <h4 class="col-xs-12 col-sm-10 col-md-10 col-lg-10 "><u>List diagnosa</u></h4>
                    
                    
                        
               
                   
			</div>
							<?php
								$attributes = array('class' => 'form-group','name' => 'form_diagnosa41', 'id' => 'form_diagnosa41');
								echo form_open('', $attributes);
								?>
								
                                   
                                   <input name="diag_aktif41" id="diag_aktif41" type="hidden" value="" />
								      
                                   <input name="diag_id41" id="diag_id41" type="hidden" value="" />
								   						   
		<div class="row">						      
					 
					 <div class="col-xs-8 col-sm-4 col-md-4 col-lg-4">  
					 
                                    <label>Kode</label>
                                    <div class="field">
										 										
                                        <input name="diag_kode41" id="diag_kode41" type="text"  class="xxwide text input validate[required] form-control" placeholder="Kode" value="" />
										 
                                    </div>
                             </div>   
					 
					 <div class="col-xs-8 col-sm-4 col-md-4 col-lg-4">  
					 
                                    <label>Diagnosa</label>
                                    <div class="field">
										 										
                                        <input name="diag_nama41" id="diag_nama41" type="text"  class="xxwide text input validate[required] form-control" placeholder="Diagnosa" value="" />
										 
                                    </div>
                             </div>   
					 
					 <div class="col-xs-8 col-sm-4 col-md-4 col-lg-4">  
					 
                                    <label>Status</label>
                                    <div class="field">
<?=form_dropdown('status41',$status41,'','id="status41"  class="form-control"')?>
										

 
                                    </div>
                             </div></div>   
                                          
                                            
         <div class="row">                            
            			
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
             	
            	 <input type="button" id="simpandata41" class="btn btn-success" value="Simpan">  
                 <input  type="button"  id="batal41" class="btn btn-info" value="Batal">  
                 <input  type="button" id="hpus41" class="btn btn-danger" value="Hapus">  
				 <a href='<?=site_url('diagnosa/export_pdf41')?>'	target='_blank'  class="btn btn-success"id="tampil_pdf41" >
					<i class="glyphicon glyphicon-download-alt"></i>
					PDF
				</a>  
                  <a href='<?=site_url('diagnosa/excell41')?>'	target='_blank' class="btn btn-success"id="tampil_excel41" >
					<i class="glyphicon glyphicon-download-alt"></i>
					Excel
				</a>
                
                
                         
          </div>
			
		</div>
            <?              
			echo form_close();
			?>
		
		 <div class="row ">   
              <div class="col-xs-12 col-sm-10 col-md-9 col-lg-9 jqGrid"  >
             	
            	  <table id="list241"  cellpadding="0" cellspacing="0"></table>
                	<div id="pager241"></div>
               
          		</div>
        </div>


    
</div> 
		
		   