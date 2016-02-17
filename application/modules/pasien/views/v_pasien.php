<div class="row">
	<div class="row">
		<h4 class="col-xs-12 col-sm-12 col-md-12 col-lg-12 "><u><strong>Master pasien</strong></u></h4>
	</div>
				<?php
			$attributes = array('class' => 'form-group','name' => 'form_pasien47', 'id' => 'form_pasien47');
		echo form_open('', $attributes);
					?>
						
					<input name="pas_id47" id="pas_id47" type="hidden" value="" />
								   						   
		<div class="row">						   
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<label>No rm</label>
					<div class="field">
					
						<input name="pas_no_rm47" id="pas_no_rm47" type="text"  class=" validate[required] form-control" placeholder="No rm" value="" />
							<span class="help-block"></span>
					</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<label>Nama pasien</label>
					<div class="field">
					
						<input name="pas_nama47" id="pas_nama47" type="text"  class=" validate[required] form-control" placeholder="Nama pasien" value="" />
							<span class="help-block"></span>
					</div>
			</div>   
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<label>L/p</label>
					<div class="field">
						<?=form_dropdown('pas_sex47',$pas_sex47,'','id="pas_sex47"  class="form-control validate[required]"')?>
							<span class="help-block"></span>
					</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<label>Tempat lahir</label>
					<div class="field">
					
						<input name="pas_tempat_lahir47" id="pas_tempat_lahir47" type="text"  class=" validate[required] form-control" placeholder="Tempat lahir" value="" />
							<span class="help-block"></span>
					</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<label>Tgl lahir</label>
					<div class="field">
					
						<input name="pas_tgl_lahir47" id="pas_tgl_lahir47" type="text"  class=" validate[required] form-control" placeholder="Tgl lahir" value="<?=$pas_tgl_lahir47?>" />
							<span class="help-block"></span>
					</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<label>Alamat pasien</label>
					<div class="field">
					
						<input name="pas_alamat47" id="pas_alamat47" type="text"  class=" validate[required] form-control" placeholder="Alamat pasien" value="" />
							<span class="help-block"></span>
					</div>
			</div>   
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<label>Agama</label>
					<div class="field">
						<?=form_dropdown('pas_agama_id47',$pas_agama_id47,'','id="pas_agama_id47"  class="form-control validate[required]"')?>
							<span class="help-block"></span>
					</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<label>Rt</label>
					<div class="field">
					
						<input name="pas_rt47" id="pas_rt47" type="text"  class=" validate[required] form-control" placeholder="Rt" value="" />
							<span class="help-block"></span>
					</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<label>Rw</label>
					<div class="field">
					
						<input name="pas_rw47" id="pas_rw47" type="text"  class=" validate[required] form-control" placeholder="Rw" value="" />
							<span class="help-block"></span>
					</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<label>Orang tua</label>
					<div class="field">
					
						<input name="pas_ortu47" id="pas_ortu47" type="text"  class=" validate[required] form-control" placeholder="Orang tua" value="" />
							<span class="help-block"></span>
					</div>
			</div>   
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<label>Propinsi</label>
					<div class="field">
						<?=form_dropdown('pas_prop_id47',$pas_prop_id47,'','id="pas_prop_id47"  class="form-control validate[required]"')?>
							<span class="help-block"></span>
					</div>
			</div>   
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<label>Kabupaten</label>
					<div class="field">
						<?=form_dropdown('pas_kab_id47',$pas_kab_id47,'','id="pas_kab_id47"  class="form-control validate[required]"')?>
							<span class="help-block"></span>
					</div>
			</div>   
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<label>Desa</label>
					<div class="field">
						<?=form_dropdown('pas_desa_id47',$pas_desa_id47,'','id="pas_desa_id47"  class="form-control validate[required]"')?>
							<span class="help-block"></span>
					</div>
			</div>   
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<label>Kecamatan</label>
					<div class="field">
						<?=form_dropdown('pas_kec_id47',$pas_kec_id47,'','id="pas_kec_id47"  class="form-control validate[required]"')?>
							<span class="help-block"></span>
					</div>
			</div>   
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<label>Pendidikan</label>
					<div class="field">
						<?=form_dropdown('pas_pendidikan_id47',$pas_pendidikan_id47,'','id="pas_pendidikan_id47"  class="form-control validate[required]"')?>
							<span class="help-block"></span>
					</div>
			</div>   
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<label>Pekerjaan</label>
					<div class="field">
						<?=form_dropdown('pas_pekerjaan_id47',$pas_pekerjaan_id47,'','id="pas_pekerjaan_id47"  class="form-control validate[required]"')?>
							<span class="help-block"></span>
					</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<label>No tlp</label>
					<div class="field">
					
						<input name="pas_telp47" id="pas_telp47" type="text"  class="  form-control" placeholder="No tlp" value="" />
							<span class="help-block"></span>
					</div>
			</div>   
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<label>Status</label>
					<div class="field">
						<?=form_dropdown('pas_meninggal47',$pas_meninggal47,'','id="pas_meninggal47"  class="form-control "')?>
							<span class="help-block"></span>
					</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<label>Rm lama</label>
					<div class="field">
					
						<input name="pas_no_rm_lm47" id="pas_no_rm_lm47" type="text"  class="  form-control" placeholder="Rm lama" value="" />
							<span class="help-block"></span>
					</div>
			</div>   
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<label>Jenis identitas</label>
					<div class="field">
						<?=form_dropdown('pas_identitas_id47',$pas_identitas_id47,'','id="pas_identitas_id47"  class="form-control validate[required]"')?>
							<span class="help-block"></span>
					</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<label>No identitas</label>
					<div class="field">
					
						<input name="pas_no_identitas47" id="pas_no_identitas47" type="text"  class=" validate[required] form-control" placeholder="No identitas" value="" />
							<span class="help-block"></span>
					</div>
			</div>   
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<label>Aktif</label>
					<div class="field">
						<?=form_dropdown('pas_aktif47',$pas_aktif47,'','id="pas_aktif47"  class="form-control validate[required]"')?>
							<span class="help-block"></span>
					</div>
			</div></div>   
                        
        <br/>                                    
         <div class="row">                            
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               	 <input type="button" name="simpandata47" id="simpandata47" class="btn btn-success" value="Simpan">&nbsp;&nbsp;
                 <input  type="button" name="batal47" id="batal47" class="btn btn-info" value="Batal">&nbsp;&nbsp;
                 <input  type="button" name="hpus47" id="hpus47" class="btn btn-danger" value="Hapus">&nbsp;&nbsp;
				 <!--a href='<?=site_url('pasien/export_pdf47')?>'	target='_blank'  class="btn btn-success"id="tampil_pdf47" >
					<i class="glyphicon glyphicon-download-alt"></i>
					PDF
				</a-->&nbsp;&nbsp;
                  <!--a href='<?=site_url('pasien/excell47')?>'	target='_blank' class="btn btn-success"id="tampil_excel47" >
					<i class="glyphicon glyphicon-download-alt"></i>
					Excel
				</a-->
            </div>
		</div>
		<input id="h_form47" value="" type="hidden"/>
            <?              
			echo form_close();
			?>
		
		 <div class="row ">
		 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 jqGrid"  >
			  <table id="list247"  cellpadding="0" cellspacing="0"></table>
			  <div id="pager247"></div>
			</div>
        </div>
		</div>
		
		<?php
			echo assets_jsku(array($jsku));
		?>