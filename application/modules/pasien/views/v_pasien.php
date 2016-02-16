<div class="row">
	<div class="row">
		<h4 class="col-xs-12 col-sm-12 col-md-12 col-lg-12 "><u><strong>List pasien</strong></u></h4>
	</div>
				<?php
			$attributes = array('class' => 'form-group','name' => 'form_pasien18', 'id' => 'form_pasien18');
		echo form_open('', $attributes);
					?>
						
					<input name="pas_id18" id="pas_id18" type="hidden" value="" />
								   						   
		<div class="row">						   
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<label>No rm</label>
					<div class="field">
					
						<input name="pas_no_rm18" id="pas_no_rm18" type="text"  class=" validate[required] form-control" placeholder="No rm" value="" />
							<span class="help-block"></span>
					</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<label>Nama pasien</label>
					<div class="field">
					
						<input name="pas_nama18" id="pas_nama18" type="text"  class=" validate[required] form-control" placeholder="Nama pasien" value="" />
							<span class="help-block"></span>
					</div>
			</div>   
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<label>L/p</label>
					<div class="field">
						<?=form_dropdown('pas_sex18',$pas_sex18,'','id="pas_sex18"  class="form-control validate[required]"')?>
							<span class="help-block"></span>
					</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<label>Tempat lahir</label>
					<div class="field">
					
						<input name="pas_tempat_lahir18" id="pas_tempat_lahir18" type="text"  class=" validate[required] form-control" placeholder="Tempat lahir" value="" />
							<span class="help-block"></span>
					</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<label>Tgl lahir</label>
					<div class="field">
					
						<input name="pas_tgl_lahir18" id="pas_tgl_lahir18" type="text"  class=" validate[required] form-control" placeholder="Tgl lahir" value="<?=$pas_tgl_lahir18?>" />
							<span class="help-block"></span>
					</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<label>Alamat pasien</label>
					<div class="field">
					
						<input name="pas_alamat18" id="pas_alamat18" type="text"  class=" validate[required] form-control" placeholder="Alamat pasien" value="" />
							<span class="help-block"></span>
					</div>
			</div>   
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<label>Agama</label>
					<div class="field">
						<?=form_dropdown('pas_agama_id18',$pas_agama_id18,'','id="pas_agama_id18"  class="form-control validate[required]"')?>
							<span class="help-block"></span>
					</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<label>Rt</label>
					<div class="field">
					
						<input name="pas_rt18" id="pas_rt18" type="text"  class=" validate[required] form-control" placeholder="Rt" value="" />
							<span class="help-block"></span>
					</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<label>Rw</label>
					<div class="field">
					
						<input name="pas_rw18" id="pas_rw18" type="text"  class=" validate[required] form-control" placeholder="Rw" value="" />
							<span class="help-block"></span>
					</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<label>Orang tua</label>
					<div class="field">
					
						<input name="pas_ortu18" id="pas_ortu18" type="text"  class=" validate[required] form-control" placeholder="Orang tua" value="" />
							<span class="help-block"></span>
					</div>
			</div>   
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<label>Propinsi</label>
					<div class="field">
						<?=form_dropdown('pas_prop_id18',$pas_prop_id18,'','id="pas_prop_id18"  class="form-control validate[required]"')?>
							<span class="help-block"></span>
					</div>
			</div>   
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<label>Kabupaten</label>
					<div class="field">
						<?=form_dropdown('pas_kab_id18',$pas_kab_id18,'','id="pas_kab_id18"  class="form-control validate[required]"')?>
							<span class="help-block"></span>
					</div>
			</div>   
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<label>Desa</label>
					<div class="field">
						<?=form_dropdown('pas_desa_id18',$pas_desa_id18,'','id="pas_desa_id18"  class="form-control validate[required]"')?>
							<span class="help-block"></span>
					</div>
			</div>   
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<label>Kecamatan</label>
					<div class="field">
						<?=form_dropdown('pas_kec_id18',$pas_kec_id18,'','id="pas_kec_id18"  class="form-control validate[required]"')?>
							<span class="help-block"></span>
					</div>
			</div>   
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<label>Pendidikan</label>
					<div class="field">
						<?=form_dropdown('pas_pendidikan_id18',$pas_pendidikan_id18,'','id="pas_pendidikan_id18"  class="form-control validate[required]"')?>
							<span class="help-block"></span>
					</div>
			</div>   
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<label>Pekerjaan</label>
					<div class="field">
						<?=form_dropdown('pas_pekerjaan_id18',$pas_pekerjaan_id18,'','id="pas_pekerjaan_id18"  class="form-control validate[required]"')?>
							<span class="help-block"></span>
					</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<label>No tlp</label>
					<div class="field">
					
						<input name="pas_telp18" id="pas_telp18" type="text"  class=" validate[required] form-control" placeholder="No tlp" value="" />
							<span class="help-block"></span>
					</div>
			</div>   
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<label>Status</label>
					<div class="field">
						<?=form_dropdown('pas_meninggal18',$pas_meninggal18,'','id="pas_meninggal18"  class="form-control validate[required]"')?>
							<span class="help-block"></span>
					</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<label>Rm lama</label>
					<div class="field">
					
						<input name="pas_no_rm_lm18" id="pas_no_rm_lm18" type="text"  class=" validate[required] form-control" placeholder="Rm lama" value="" />
							<span class="help-block"></span>
					</div>
			</div>   
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<label>Jenis identitas</label>
					<div class="field">
						<?=form_dropdown('pas_identitas_id18',$pas_identitas_id18,'','id="pas_identitas_id18"  class="form-control validate[required]"')?>
							<span class="help-block"></span>
					</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<label>No identitas</label>
					<div class="field">
					
						<input name="pas_no_identitas18" id="pas_no_identitas18" type="text"  class=" validate[required] form-control" placeholder="No identitas" value="" />
							<span class="help-block"></span>
					</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<label>Aktif</label>
					<div class="field">
					
						<input name="pas_aktif18" id="pas_aktif18" type="text"  class=" validate[required] form-control" placeholder="Aktif" value="" />
							<span class="help-block"></span>
					</div>
			</div></div>   
                        
        <br/>                                    
         <div class="row">                            
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               	 <input type="button" name="simpandata18" id="simpandata18" class="btn btn-success" value="Simpan">&nbsp;&nbsp;
                 <input  type="button" name="batal18" id="batal18" class="btn btn-info" value="Batal">&nbsp;&nbsp;
                 <input  type="button" name="hpus18" id="hpus18" class="btn btn-danger" value="Hapus">&nbsp;&nbsp;
				 <!--a href='<?=site_url('pasien/export_pdf18')?>'	target='_blank'  class="btn btn-success"id="tampil_pdf18" >
					<i class="glyphicon glyphicon-download-alt"></i>
					PDF
				</a-->&nbsp;&nbsp;
                  <!--a href='<?=site_url('pasien/excell18')?>'	target='_blank' class="btn btn-success"id="tampil_excel18" >
					<i class="glyphicon glyphicon-download-alt"></i>
					Excel
				</a-->
            </div>
		</div>
		<input id="h_form18" value="" type="hidden"/>
            <?              
			echo form_close();
			?>
		
		 <div class="row ">   
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 jqGrid"  >
             	
            	  <table id="list218"  cellpadding="0" cellspacing="0"></table>
                	<div id="pager218"></div>
               
          		</div>
        </div>


    
		</div>