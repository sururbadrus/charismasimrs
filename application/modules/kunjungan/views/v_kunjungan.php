<div class="row">
		<?php
			$attributes = array('class' => 'form-group','name' => 'form_kunjungan17', 'id' => 'form_kunjungan17');
		echo form_open('', $attributes);
					?>
					<input name="kun_id17" id="kun_id17" type="hidden" value="" />
								   
					<input name="kun_pas_id17" id="kun_pas_id17" type="hidden" value="" />
				
	<div class="row">
    	<div class="col-md-6 col-lg-6">
			<div class="panel-group">
            <div class="panel panel-default">
            	<div class="panel-heading" ><strong>PELAYANAN DAN CHEK KEPERSERTAAN</strong></div>
                <div class="panel-body">
                	<div class="row">
                        	 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <label>Pelayanan</label>
                                    <div class="field">
                                        <?=form_dropdown('kun_pustu_id17',$kun_pustu_id17,'','id="kun_pustu_id17"  class="form-control validate[required]  selectpicker dropdown"  data-live-search="true"')?>
                                            <span class="help-block"></span>
                                    </div>
                            </div>
                             <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <label>Cek Kepersetaan</label>
                                    <div class="field">
                                        <input class="form-control" value="" placeholder="Cek Kepersertaan Bpjs" id="check_peserta" />
                                            <span class="help-block"></span>
                                    </div>
                            </div>
                        </div>
                
                </div>
            </div>
            <div class="panel panel-default">
                    <div class="panel-heading"><strong>IDENTITAS PASIEN</strong></div>
                    <div class="panel-body">
                    	
                    	<div class="row">						   
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label>No induk</label>
                                    <div class="field">
                                    
                                        <input name="noinduk17" id="noinduk17" type="text"  class=" validate[required] form-control" placeholder="No induk" value="" />
                                            <span class="help-block"></span>
                                    </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <label>Nama pasien</label>
                                    <div class="field">
                                    
                                        <input name="pas_nama17" id="pas_nama17" type="text"  class=" validate[required] form-control" placeholder="Nama pasien" value="" />
                                            <span class="help-block"></span>
                                    </div>
                            </div>
                           
                            
                            </div>
                            <div class="row">
                              <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">
                                <label>KK</label>
                                    <div class="field" style="padding-top: 2.2%;">
                                        <input value="0" name="pas_iskk17" id="pas_iskk17" type="checkbox"  class=" " placeholder="Is kk"  />
                                            <span class="help-block"></span>
                                    </div>
                            </div>
                             <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <label>Nama kk</label>
                                    <div class="field">
                                    
                                        <input name="pas_kk17" id="pas_kk17" type="text"  class=" validate[required] form-control" placeholder="Nama kk" value="" />
                                            <span class="help-block"></span>
                                    </div>
                            </div> 
                            
                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                <label>L/p</label>
                                    <div class="field">
                                        <?=form_dropdown('pas_sex17',$pas_sex17,'','id="pas_sex17"  class="form-control validate[required]  selectpicker dropdown"  data-live-search="true"')?>
                                            <span class="help-block"></span>
                                    </div>
                            </div>
							
                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                <label>No ktp</label>
                                    <div class="field">
                                    
                                        <input name="pas_noktp17" id="pas_noktp17" type="text"  class="  form-control" placeholder="No ktp" value="" />
                                            <span class="help-block"></span>
                                    </div>
                            </div>
                            
                           
                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                <label>Tgl lahir</label>
                                    <div class="field">
                                    
                                        <input name="pas_tgl_lahir17" id="pas_tgl_lahir17" type="text"  class=" validate[required] form-control" readonly="readonly" placeholder="Tgl lahir" value="<?=$pas_tgl_lahir17?>" />
                                            <span class="help-block"></span>
                                    </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                <label>Thn</label>
                                    <div class="field">
                                    
                                        <input name="kun_th17" id="kun_th17" type="text"  class=" validate[required] form-control text-center" placeholder="Thn" value="00" />
                                            <span class="help-block"></span>
                                    </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                <label>Bln</label>
                                    <div class="field">
                                    
                                        <input name="kun_bln17" id="kun_bln17" type="text"  class=" validate[required] form-control text-center" placeholder="Bln" value="00" />
                                            <span class="help-block"></span>
                                    </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                <label>Hr</label>
                                    <div class="field">
                                    
                                        <input name="kun_hr17" id="kun_hr17" type="text"  class=" validate[required] form-control text-center" placeholder="Hr" value="00" />
                                            <span class="help-block"></span>
                                    </div>
                            </div>
                            <!--<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                <label>Kel umur</label>
                                    <div class="field"-->
                                    
                                        <input name="kun_ku_id17" id="kun_ku_id17" type="hidden"  class=" " placeholder="Kel umur" value="" />
                                            <!--span class="help-block"></span>
                                    </div>
                            </div>  --> 
                           <!-- <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                <label>Asal pasien</label>
                                    <div class="field">
                                        <?php //form_dropdown('pas_asal17',$pas_asal17,'','id="pas_asal17"  class="form-control validate[required]  selectpicker dropdown"  data-live-search="true"')?>
                                            <span class="help-block"></span>
                                    </div>
                            </div>-->   
                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                <label>Pekerjaan</label>
                                    <div class="field">
                                        <?=form_dropdown('pas_pekerjaan_id17',$pas_pekerjaan_id17,'','id="pas_pekerjaan_id17"  class="form-control validate[required]  selectpicker dropdown"  data-live-search="true"')?>
                                            <span class="help-block"></span>
                                    </div>
                            </div>
                            
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <label>Kecamatan</label>
                                    <div class="field">
                                        <?=form_dropdown('pas_kec_id17',$pas_kec_id17,$def_kec_id,'id="pas_kec_id17"  class="form-control validate[required]  selectpicker dropdown"  data-live-search="true"')?>
                                            <span class="help-block"></span>
                                    </div>
                            </div>   
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <label>Desa</label>
                                    <div class="field">
                                        <?=form_dropdown('pas_desa_id17',$pas_desa_id17,'','id="pas_desa_id17"  class="form-control validate[required]  selectpicker dropdown"  data-live-search="true"')?>
                                            <span class="help-block"></span>
                                    </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <label>Alamat</label>
                                    <div class="field">
                                    
                                        <input name="pas_alamat17" id="pas_alamat17" type="text"  class=" validate[required] form-control" placeholder="Alamat" value="" />
                                            <span class="help-block"></span>
                                    </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                <label>Rt</label>
                                    <div class="field">
                                    
                                        <input name="pas_rt17" id="pas_rt17" type="text"  class="  form-control" placeholder="Rt" value="" />
                                            <span class="help-block"></span>
                                    </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                <label>Rw</label>
                                    <div class="field">
                                    
                                        <input name="pas_rw17" id="pas_rw17" type="text"  class="  form-control" placeholder="Rw" value="" />
                                            <span class="help-block"></span>
                                    </div>
                            </div>
                            
                            
                            
                                
                            
                            
                            
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>DATA KUNJUNGAN</strong></div>
                    <div class="panel-body">
                    	<div class="row">					   						   
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label>Tgl kunj</label>
                                    <div class="field">
                                    
                                        <input name="kun_tgl17" id="kun_tgl17" type="text"  class=" validate[required] form-control" placeholder="Tgl kunj" value="<?=$kun_tgl17?>" />
                                            <span class="help-block"></span>
                                    </div>
                            </div>   
                            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                                <label>Tujuan</label>
                                    <div class="field">
                                        <?=form_dropdown('kun_tujuan_id17',$kun_tujuan_id17,'','id="kun_tujuan_id17"  class="form-control validate[required]  selectpicker dropdown"  data-live-search="true"')?>
                                            <span class="help-block"></span>
                                    </div>
                            </div>
                             <div class="col-xs-12 col-sm-12  col-md-3 col-lg-3">
                                <label>Kunjungan</label>
                                    <div class="field">
                                        <?=form_dropdown('kun_is_baru17',$kun_is_baru17,'','id="kun_is_baru17"  class="form-control validate[required]  selectpicker dropdown"  data-live-search="true"')?>
                                            <span class="help-block"></span>
                                    </div>
                            </div>
                          </div>
                          
                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label>Kategori pas</label>
                                    <div class="field">
                                        <?=form_dropdown('kun_kp_id17',$kun_kp_id17,'','id="kun_kp_id17"  class="form-control validate[required]  selectpicker dropdown"  data-live-search="true"')?>
                                            <span class="help-block"></span>
                                    </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                <label>No Kso</label>
                                    <div class="field">
                                    
                                        <input name="kun_no_penjamin17" id="kun_no_penjamin17" type="text"  class="  form-control" placeholder="No Kso" value="" />
                                            <span class="help-block"></span>
                                    </div>
                            </div>   
                            <div class="col-xs-12 col-sm-12  col-md-3 col-lg-3">
                                <label>Karcis</label>
                                    <div class="field">
                                        <?=form_dropdown('kun_karcis17',$kun_karcis17,'','id="kun_karcis17"  class="form-control validate[required]  selectpicker dropdown"  data-live-search="true"')?>
                                            <span class="help-block"></span>
                                    </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                <label>No seri</label>
                                    <div class="field">
                                    
                                        <input name="kun_no_seri17" id="kun_no_seri17" type="text"  class="  form-control" placeholder="No seri" value="" />
                                            <span class="help-block"></span>
                                    </div>
                            </div>   
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label>Unit Pelayanan</label>
                                    <div class="field">
                                        <?=form_dropdown('kun_pel_unit17',$kun_pel_unit17,'','id="kun_pel_unit17"  class="form-control validate[required]  selectpicker dropdown"  data-live-search="true"')?>
                                            <span class="help-block"></span>
                                    </div>
                            </div>   
                            
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label>Unit Tujuan</label>
                                    <div class="field">
                                        <?=form_dropdown('kun_unit_id17',$kun_unit_id17,'','id="kun_unit_id17"  class="form-control validate[required]  selectpicker dropdown"  data-live-search="true"')?>
                                            <span class="help-block"></span>
                                    </div>
                            </div>   
                            
                       </div>   
                        
                    
                    </div>
                    <div class="panel-footer text-center"><input type="button" name="simpandata17" id="simpandata17" class="btn btn-success" value="Simpan"></div>
                </div>
        	</div>
        </div>
        <div class="col-md-6 col-lg-6">
        <div class="panel-group">
        	<div class="panel panel-default">
            	<div class="panel-heading"><strong>FILTER KUNJUNGAN</strong></div>
                <div class="panel-body">
                	<div class="row">
                    	<div class="col-md-3">
                        	<label>Tanggal Kunjungan</label>
                            <div class="field">
                            	<input type="text" class="form-control" value="" id="filter_kunjungan" />
                            </div>
                        </div>
                        <div class="col-md-6">
                        	<label>Tempat Layanan</label>
                            <div class="field">
                            	<input type="text" class="form-control" value="" id="filter_kunjungan" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        	 <div class="panel panel-default">
                    <div class="panel-heading"><strong>LIST KUNJUNGAN</strong></div>
                    <div class="panel-body">
                    	 <div class="row ">
                             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 jqGrid"  >
                                  <table id="list217"  cellpadding="0" cellspacing="0"></table>
                                  <div id="pager217"></div>
                                </div>
                            </div>
                            </div>
                    </div>
             </div>
         </div>
        </div>
        
        <input id="h_form17" value="" type="hidden"/>
            <?              
			echo form_close();
			?>
    </div>
	
		                
        <br/>                                    
         <div class="row">                            
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               	 &nbsp;&nbsp;
                 <input  type="button" name="batal17" id="batal17" class="btn btn-info" value="Batal">&nbsp;&nbsp;
                 <input  type="button" name="hpus17" id="hpus17" class="btn btn-danger" value="Hapus">&nbsp;&nbsp;
				 <!--a href='<?=site_url('kunjungan/export_pdf17')?>'	target='_blank'  class="btn btn-success"id="tampil_pdf17" >
					<i class="glyphicon glyphicon-download-alt"></i>
					PDF
				</a-->&nbsp;&nbsp;
                  <!--a href='<?=site_url('kunjungan/excell17')?>'	target='_blank' class="btn btn-success"id="tampil_excel17" >
					<i class="glyphicon glyphicon-download-alt"></i>
					Excel
				</a-->
            </div>
		</div>
		
		
		
		
		<?php
			echo assets_jsku(array($jsku));
		?>