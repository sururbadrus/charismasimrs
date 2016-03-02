<div class="row">
	<div class="row">
		<h4 class="col-xs-12 col-sm-12 col-md-12 col-lg-12 "><u><strong>List group</strong></u></h4>
	</div>
				<?php
			$attributes = array('class' => 'form-group','name' => 'form_ms_group17', 'id' => 'form_ms_group17');
		echo form_open('', $attributes);
					?>
					<input name="group_id17" id="group_id17" type="hidden" value="" />
								   						   
		<div class="row">						   
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<label>Nama group</label>
					<div class="field">
					
						<input name="group_nama17" id="group_nama17" type="text"  class=" validate[required] form-control" placeholder="Nama group" value="" />
							<span class="help-block"></span>
					</div>
			</div>   
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<label>Status</label>
					<div class="field">
						<?=form_dropdown('group_aktif17',$group_aktif17,'','id="group_aktif17"  class="form-control validate[required]  selectpicker dropdown"  data-live-search="true"')?>
							<span class="help-block"></span>
					</div>
			</div></div>   
                        
        <br/>                                    
         <div class="row">                            
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               	 <input type="button" name="simpandata17" id="simpandata17" class="btn btn-success" value="Simpan">&nbsp;&nbsp;
                 <input  type="button" name="batal17" id="batal17" class="btn btn-info" value="Batal">&nbsp;&nbsp;
                 <input  type="button" name="hpus17" id="hpus17" class="btn btn-danger" value="Hapus">&nbsp;&nbsp;
				 <!--a href='<?=site_url('ms_group/export_pdf17')?>'	target='_blank'  class="btn btn-success"id="tampil_pdf17" >
					<i class="glyphicon glyphicon-download-alt"></i>
					PDF
				</a-->&nbsp;&nbsp;
                  <!--a href='<?=site_url('ms_group/excell17')?>'	target='_blank' class="btn btn-success"id="tampil_excel17" >
					<i class="glyphicon glyphicon-download-alt"></i>
					Excel
				</a-->
            </div>
		</div>
		<input id="h_form17" value="" type="hidden"/>
            <?              
			echo form_close();
			?>
		
		 <div class="row ">
		 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 jqGrid"  >
			  <table id="list217"  cellpadding="0" cellspacing="0"></table>
			  <div id="pager217"></div>
			</div>
        </div>
		</div>
		
		<?php
			echo assets_jsku(array($jsku));
		?>