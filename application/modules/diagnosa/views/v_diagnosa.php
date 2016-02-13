                        

<div class="row">
            <div class="row">
                 <h4 class="col-xs-12 col-sm-12 col-md-12 col-lg-12 "><strong><u>Diagnosa</u></strong></h4>
			</div>
				<?php
					$attributes = array('class' => 'form-group','name' => 'form_diagnosa12', 'id' => 'form_diagnosa12');
					echo form_open('', $attributes);
					?>
						   
                                   <input name="diag_id12" id="diag_id12" type="hidden" value="" />
								   						   
		<div class="row">						      
					 
					 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  
                           <label>Kode</label>
                                <div class="field">
										 										
                                        <input name="diag_kode12" id="diag_kode12" type="text"  class=" validate[required] form-control" placeholder="Kode" value="" />
										 
                	          </div>
                     </div>   
					 
					 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  
                           <label>Diagnosa</label>
                                <div class="field">
										 										
                                        <input name="diag_nama12" id="diag_nama12" type="text"  class=" validate[required] form-control" placeholder="Diagnosa" value="" />
										 
                	          </div>
                     </div>   
						 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  
					         <label>Status</label>
                               <div class="field">
									<?=form_dropdown('diag_aktif12',$diag_aktif12,'','id="diag_aktif12"  class="form-control"')?>
								</div>
                         </div></div>   
                        
        <br/>                                    
         <div class="row">                            
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
               	 <input type="button" id="simpandata12" class="btn btn-success" value="Simpan">  
                 <input  type="button"  id="batal12" class="btn btn-info" value="Batal">  
                 <input  type="button" id="hpus12" class="btn btn-danger" value="Hapus">  
				 <a href='<?=site_url('diagnosa/export_pdf12')?>'	target='_blank'  class="btn btn-success"id="tampil_pdf12" >
					<i class="glyphicon glyphicon-download-alt"></i>
					PDF
				</a>  
                  <a href='<?=site_url('diagnosa/excell12')?>'	target='_blank' class="btn btn-success"id="tampil_excel12" >
					<i class="glyphicon glyphicon-download-alt"></i>
					Excel
				</a>
            </div>
		</div>
            <?              
			echo form_close();
			?>
		
		 <div class="row ">   
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 jqGrid"  >
             	
            	  <table id="list212"  cellpadding="0" cellspacing="0"></table>
                	<div id="pager212"></div>
               
          		</div>
        </div>


    
		</div>                        