<div class="row">
	<div class="row">
		<h4 class="col-xs-12 col-sm-12 col-md-12 col-lg-12 "><u><strong>Master diagnosa</strong></u></h4>
	</div>
				<?php
			$attributes = array('class' => 'form-group','name' => 'form_bms_diag39', 'id' => 'form_bms_diag39');
		echo form_open('', $attributes);
					?>
					<input name="diag_id39" id="diag_id39" type="hidden" value="" />
								   						   
		<div class="row">						   
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<label>Kode icd</label>
					<div class="field">
					
						<input name="diag_kode39" id="diag_kode39" type="text"  class=" validate[required] form-control" placeholder="Kode icd" value="" />
							<span class="help-block"></span>
					</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<label>Nama penyakit</label>
					<div class="field">
					
						<input name="diag_nama39" id="diag_nama39" type="text"  class=" validate[required] form-control" placeholder="Nama penyakit" value="" />
							<span class="help-block"></span>
					</div>
			</div>   
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<label>Status</label>
					<div class="field">
						<?php echo form_dropdown('diag_aktif39',$diag_aktif39,'','id="diag_aktif39"  class="form-control validate[required]  selectpicker dropdown"  data-live-search="true"')?>
							<span class="help-block"></span>
					</div>
			</div></div>   
                        
        <br/>                                    
         <div class="row">                            
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               	 <input type="button" name="simpandata39" id="simpandata39" class="btn btn-success" value="Simpan">&nbsp;&nbsp;
                 <input  type="button" name="batal39" id="batal39" class="btn btn-info" value="Batal">&nbsp;&nbsp;
                 <input  type="button" name="hpus39" id="hpus39" class="btn btn-danger" value="Hapus">&nbsp;&nbsp;
				 <!--a href='<?php echo site_url('bms_diag/export_pdf39')?>'	target='_blank'  class="btn btn-success"id="tampil_pdf39" >
					<i class="glyphicon glyphicon-download-alt"></i>
					PDF
				</a-->&nbsp;&nbsp;
                  <!--a href='<?php echo site_url('bms_diag/excell39')?>'	target='_blank' class="btn btn-success"id="tampil_excel39" >
					<i class="glyphicon glyphicon-download-alt"></i>
					Excel
				</a-->
            </div>
		</div>
		<input id="h_form39" value="" type="hidden"/>
            <?              
			echo form_close();
			?>
		
		 <div class="row ">
		 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 jqGrid"  >
			  <table id="list239"  cellpadding="0" cellspacing="0"></table>
			  <div id="pager239"></div>
			</div>
        </div>
		</div>
		
		<?php
			echo assets_jsku(array($jsku));
		?>