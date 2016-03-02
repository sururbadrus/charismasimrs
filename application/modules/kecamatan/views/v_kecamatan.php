<div class="row">
	<div class="row">
		<h4 class="col-xs-12 col-sm-12 col-md-12 col-lg-12 "><u><strong>Master kecamatan</strong></u></h4>
	</div>
				<?php
			$attributes = array('class' => 'form-group','name' => 'form_kecamatan33', 'id' => 'form_kecamatan33');
		echo form_open('', $attributes);
					?>
					<input name="kec_id33" id="kec_id33" type="hidden" value="" />
								   						   
		<div class="row">						   
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<label>Kode</label>
					<div class="field">
					
						<input name="kec_kode33" id="kec_kode33" type="text"  class=" validate[required] form-control" placeholder="Kode" value="" />
							<span class="help-block"></span>
					</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<label>Nama kec</label>
					<div class="field">
					
						<input name="kec_nama33" id="kec_nama33" type="text"  class=" validate[required] form-control" placeholder="Nama kec" value="" />
							<span class="help-block"></span>
					</div>
			</div>   
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<label>Status</label>
					<div class="field">
						<?=form_dropdown('kec_aktif33',$kec_aktif33,'','id="kec_aktif33"  class="form-control validate[required]  selectpicker dropdown"  data-live-search="true"')?>
							<span class="help-block"></span>
					</div>
			</div></div>   
                        
        <br/>                                    
         <div class="row">                            
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               	 <input type="button" name="simpandata33" id="simpandata33" class="btn btn-success" value="Simpan">&nbsp;&nbsp;
                 <input  type="button" name="batal33" id="batal33" class="btn btn-info" value="Batal">&nbsp;&nbsp;
                 <input  type="button" name="hpus33" id="hpus33" class="btn btn-danger" value="Hapus">&nbsp;&nbsp;
				 <!--a href='<?=site_url('kecamatan/export_pdf33')?>'	target='_blank'  class="btn btn-success"id="tampil_pdf33" >
					<i class="glyphicon glyphicon-download-alt"></i>
					PDF
				</a-->&nbsp;&nbsp;
                  <!--a href='<?=site_url('kecamatan/excell33')?>'	target='_blank' class="btn btn-success"id="tampil_excel33" >
					<i class="glyphicon glyphicon-download-alt"></i>
					Excel
				</a-->
            </div>
		</div>
		<input id="h_form33" value="" type="hidden"/>
            <?              
			echo form_close();
			?>
		
		 <div class="row ">
		 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 jqGrid"  >
			  <table id="list233"  cellpadding="0" cellspacing="0"></table>
			  <div id="pager233"></div>
			</div>
        </div>
		</div>
		
		<?php
			echo assets_jsku(array($jsku));
		?>