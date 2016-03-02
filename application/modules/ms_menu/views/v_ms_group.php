

<div class="row">




            <div class="row">
              
                  
                        
                     <h4 class="col-xs-12 col-sm-10 col-md-10 col-lg-10 "><u>Master group</u></h4>
                    
                    
                        
               
                   
			</div>
							<?php
								$attributes = array('class' => 'form-group','name' => 'form_ms_group44', 'id' => 'form_ms_group44');
								echo form_open('', $attributes);
								?>
								
                                   
                                   <input name="id44" id="id44" type="hidden" value="" />
								   						   
		<div class="row">						      
					 
					 <div class="col-xs-8 col-sm-4 col-md-4 col-lg-4">  
					 
                                    <label>Nama group</label>
                                    <div class="field">
										 										
                                        <input name="nama44" id="nama44" type="text"  class="xxwide text input validate[required] form-control" placeholder="Nama group" value="" />
										 
                                    </div>
                             </div>   
					 
					 <div class="col-xs-8 col-sm-2 col-md-2 col-lg-2">  
					 
                                    <label>Status</label>
                                    <div class="field">
										<select class="form-control" id="aktif44">
                                    	<option value="1" >Aktif</option>
                                    	<option value="0" >Tidak</option>
                                    </select>
										

 
                                    </div>
                             </div></div>   
                                          
                                            
         <div class="row">                            
            			
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
             	
            	 <input type="button" id="simpandata44" class="btn btn-success" value="Simpan">&nbsp;&nbsp;
                 <input  type="button"  id="batal44" class="btn btn-info" value="Batal">&nbsp;&nbsp;
                 <input  type="button" id="hpus44" class="btn btn-danger" value="Hapus">&nbsp;&nbsp;
				 <!-- <a href='<?=site_url('ms_group/export_pdf44')?>'	target='_blank'  class="btn btn-success"id="tampil_pdf44" >
					<i class="glyphicon glyphicon-download-alt"></i>
					PDF
				</a>&nbsp;&nbsp;
                  <a href='<?=site_url('ms_group/excell44')?>'	target='_blank' class="btn btn-success"id="tampil_excel44" >
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
             	
            	  <table id="list244"  cellpadding="0" cellspacing="0"></table>
                	<div id="pager244"></div>
               
          		</div>
        </div>


    
</div> 
		
		 <script>
			
			 $(document).ready(function () {
				
			var mygrid44=jQuery("#list244").jqGrid({
					url: "<?php echo base_url() ?>index.php/ms_group/lap_bs44", 
					datatype: "json", 
					height: "300", 
					//postData: { id: '0' },
					mtype: "POST",
					colNames: ['NAMA GROUP','STATUS'],
					colModel: [
						//{name:'', index:'',width:50,align:'center'},
						{name:'nama',width:400,index:'nama',editable:false},
						{name:'st_aktif',width:200,index:'st_aktif',editable:false},
					],
					
					rowNum: 20,
					rowList: [20,30,50],
					pager: '#pager244',
					sortname: 'nama',
					viewrecords: true,
					sortorder: "asc",
					autowidth: true,
					multiselect: false, 
					rownumbers: true,
					rownumWidth:40,
					caption: "Master Group", 
					beforeRequest: function() {
            			responsive_jqgrid($(".jqGrid"));
        			}				
				});
				
				jQuery("#list244").jqGrid('navGrid','#pager244',{view:false,edit:false,add:false,del:false,search:false,refresh:true});	

		jQuery("#list244").jqGrid('navButtonAdd',"#pager244",{caption:"Cari",title:"Cari", buttonicon :'ui-icon-search', onClickButton:function(){ mygrid44[0].toggleToolbar() } }); 
		
		
		
		jQuery("#list244").jqGrid('filterToolbar',{
            stringResult: true,
            searchOnEnter : true
        });
		mygrid44[0].toggleToolbar();
		
		
		
		jQuery("#list244").setGridParam({onSelectRow:function(id){
			
			var data_44=id.split(',');
			$('#simpandata44').val('Ubah');
			
						
						$("#nama44").val(jQuery("#list244").jqGrid('getCell',id,'nama'));
						
						
						
						$("#aktif44").val(data_44[1]);
						
						
						
						$("#id44").val(data_44[0]);
						
						
			} 
					});  
		
		
		 function responsive_jqgrid(jqgrid) {
			jqgrid.find('.ui-jqgrid').addClass('clear-margin').css('width', '');
			jqgrid.find('.ui-jqgrid-view').addClass('clear-margin ').css('width', '');
			jqgrid.find('.ui-jqgrid-view > div').eq(1).addClass('clear-margin').css('width', '').css('min-height', '0');
			jqgrid.find('.ui-jqgrid-view > div').eq(2).addClass('clear-margin').css('width', '').css('min-height', '0');
			jqgrid.find('.ui-jqgrid-sdiv').addClass('clear-margin').css('width', '');
			jqgrid.find('.ui-jqgrid-pager').addClass('clear-margin').css('width', '');
	
		}
			
			$("#simpandata44").click(function(){
			var action=$('#simpandata44').val();
			;
			
			
			
				if(action=='Simpan'){
							
							if($('#nama44').val()=='') {
								alert('Data Tidak Boleh Kosong'); 
								$('#nama44').focus();
								return false;
							}
							
							
							if($('#aktif44').val()=='') {
								alert('Data Tidak Boleh Kosong'); 
								$('#aktif44').focus();
								return false;
							}
							
					var conf = confirm("Yakin Akan Menyimpan Data Ini?");
				}
				else{
							
							if($('#id44').val()=='') {
								alert('Hiden Id Tidak Boleh Kosong'); 
								
								return false;
							}
							
					
					
						
					var conf = confirm("Yakin Akan Mengubah Data Ini?");
				}
            	if (conf) {
				
				$.ajax({
						url : "<?=base_url()?>index.php/ms_group/crud",
						data : {
							action : action,
							
							nama : $('#nama44').val(),
							
							aktif : $('#aktif44').val(),
							
							id : $('#id44').val(),
						},
						type : 'POST',
						dataType :'JSON',
						beforeSend:function(){
							                
						},
						success : function(data){
							
								alert(data.ket);
								jQuery("#list244").trigger("reloadGrid");
								$("#batal44").trigger('click');
							
						 }
						});
					
				}
				
				return false;
		
				
		})
		
		
		$('#hpus44').click(function(){
			
			
							
							if($('#id44').val()=='') {
								alert('Pilih Data Yang Akan Di Hapus'); 
								
								return false;
							}
							
					
				var conf = confirm("Yakin Akan Menghapus Data Ini?");
				
            	if (conf) {
					$.ajax({
					url : "<?=base_url()?>index.php/ms_group/crud",
					data : {
						action : "del",
							id : $('#id44').val(),
					},
					type : 'POST',
					dataType :'JSON',
					beforeSend:function(){
						                
					},
					success : function(data){
						
						alert(data.ket);  
						jQuery("#list244").trigger("reloadGrid");
						$("#batal44").trigger('click');
					 }
					});
				}
				
				
			
		
		
		});

		
		$("#batal44").click(function(){
			
			
			$('#simpandata44').val('Simpan');
			
						
						$('#id44').val('');
							$('#nama44').val('');
						
							
							$("select#aktif44").prop('selectedIndex', 0);
						
			})
			
			
			
				
			 })
			 		
			</script>
		
		
		
		


