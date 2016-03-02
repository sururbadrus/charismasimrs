<div class="row">
	<div class="row">
		<h4 class="col-xs-12 col-sm-12 col-md-12 col-lg-12 "><u><strong>Master user</strong></u></h4>
	</div>
				<?php
			$attributes = array('class' => 'form-group','name' => 'form_ms_user07', 'id' => 'form_ms_user07');
		echo form_open('', $attributes);
					?>
					<input name="user_id07" id="user_id07" type="hidden" value="" />
								   						   
		<div class="row">						   
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<label>User name</label>
					<div class="field">
					
						<input name="user_name07" id="user_name07" type="text"  class="  form-control" placeholder="User name" value="" />
							<span class="help-block"></span>
					</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<label>Password</label>
					<div class="field">
					
						<input name="user_pwd07" id="user_pwd07" type="text"  class=" validate[required] form-control" placeholder="Password" value="" />
							<span class="help-block"></span>
					</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<label>Pegawai</label>
					<div class="field">
					
						<input name="user_pegawai07" id="user_pegawai07" type="text"  class=" validate[required] form-control" placeholder="Pegawai" value="" />
							<span class="help-block"></span>
					</div>
			</div>   
            
           </div>
           <div class="row">
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<label>Nama group</label>
					<div class="field">
						<?=form_dropdown('user_group_id07',$user_group_id07,'','id="user_group_id07"  class="form-control   selectpicker dropdown " data-live-search="true"')?>
							<span class="help-block"></span>
					</div>
			</div>   
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<label>Status</label>
					<div class="field">
						<?=form_dropdown('user_aktif07',$user_aktif07,'','id="user_aktif07"  class="form-control validate[required]"')?>
							<span class="help-block"></span>
					</div>
			</div></div>   
                        
        <br/>                                    
         <div class="row">                            
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               	 <input type="button" name="simpandata07" id="simpandata07" class="btn btn-success" value="Simpan">&nbsp;&nbsp;
                 <input  type="button" name="batal07" id="batal07" class="btn btn-info" value="Batal">&nbsp;&nbsp;
                 <input  type="button" name="hpus07" id="hpus07" class="btn btn-danger" value="Hapus">&nbsp;&nbsp;
				 <!--a href='<?=site_url('ms_user/export_pdf07')?>'	target='_blank'  class="btn btn-success"id="tampil_pdf07" >
					<i class="glyphicon glyphicon-download-alt"></i>
					PDF
				</a-->&nbsp;&nbsp;
                  <!--a href='<?=site_url('ms_user/excell07')?>'	target='_blank' class="btn btn-success"id="tampil_excel07" >
					<i class="glyphicon glyphicon-download-alt"></i>
					Excel
				</a-->
            </div>
		</div>
		<input id="h_form07" value="" type="hidden"/>
            <?              
			echo form_close();
			?>
		
		 <div class="row ">
		 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 jqGrid"  >
			  <table id="list207"  cellpadding="0" cellspacing="0"></table>
			  <div id="pager207"></div>
			</div>
        </div>
		</div>
		
		<?php
			echo assets_jsku(array($jsku));
		?>