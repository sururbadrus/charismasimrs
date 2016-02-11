	 $(document).ready(function () {
				
			var mygrid41=jQuery("#list241").jqGrid({
					url: base_js+"index.php/diagnosa/diag/lap_bs41", 
					datatype: "json", 
					height: "300", 
					//postData: { id: '0' },
					mtype: "POST",
					colNames: ['KODE','DIAGNOSA','STATUS'],
					colModel: [
						//{name:'', index:'',width:50,align:'center'},
						{name:'diag_kode',width:70,index:'diag_kode',editable:false},
						{name:'diag_nama',width:400,index:'diag_nama',editable:false},
						{name:'status',width:100,index:'status',editable:false},
					],
					
					rowNum: 20,
					rowList: [20,30,50],
					pager: '#pager241',
					sortname: 'diag_nama',
					viewrecords: true,
					sortorder: "asc",
					autowidth: true,
					multiselect: false, 
					rownumbers: true,
					rownumWidth:40,
					caption: "Diagnosa", 
					beforeRequest: function() {
            			responsive_jqgrid($(".jqGrid"));
        			}				
				});
				
				jQuery("#list241").jqGrid('navGrid','#pager241',{view:false,edit:false,add:false,del:false,search:false,refresh:true});	

		jQuery("#list241").jqGrid('navButtonAdd',"#pager241",{caption:"Cari",title:"Cari", buttonicon :'ui-icon-search', onClickButton:function(){ mygrid41[0].toggleToolbar() } }); 
		
		
		
		jQuery("#list241").jqGrid('filterToolbar',{
            stringResult: true,
            searchOnEnter : true
        });
		mygrid41[0].toggleToolbar();
		
		
		
		jQuery("#list241").setGridParam({onSelectRow:function(id){
			
			var data_41=id.split(',');
			$('#simpandata41').val('Ubah');
			
						
						$("#diag_kode41").val(jQuery("#list241").jqGrid('getCell',id,'diag_kode'));
						
						
						
						$("#diag_nama41").val(jQuery("#list241").jqGrid('getCell',id,'diag_nama'));
						
						
						
						$("#status41").val(data_41[0]);
						
						
						
						$("#diag_aktif41").val($("#status41").val());
						
						
						
						$("#diag_id41").val(data_41[1]);
						
						
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
			
			$("#simpandata41").click(function(){
			var action=$('#simpandata41').val();
			;
			
			
			
				if(action=='Simpan'){
							
							if($('#diag_kode41').val()=='') {
								alert('Data Tidak Boleh Kosong'); 
								$('#diag_kode41').focus();
								return false;
							}
							
							
							if($('#diag_nama41').val()=='') {
								alert('Data Tidak Boleh Kosong'); 
								$('#diag_nama41').focus();
								return false;
							}
							
							
							if($('#status41').val()=='') {
								alert('Data Tidak Boleh Kosong'); 
								$('#status41').focus();
								return false;
							}
							
					var conf = confirm("Yakin Akan Menyimpan Data Ini?");
				}
				else{
							
							if($('#diag_aktif41').val()=='') {
								alert('Hiden Id Tidak Boleh Kosong'); 
								
								return false;
							}
							
							
							if($('#diag_id41').val()=='') {
								alert('Hiden Id Tidak Boleh Kosong'); 
								
								return false;
							}
							
					
					
						
					var conf = confirm("Yakin Akan Mengubah Data Ini?");
				}
            	if (conf) {
				
				$.ajax({
						url : base_js+"index.php/diagnosa/crud",
						data : {
							action : action,
							
							diag_kode : $('#diag_kode41').val(),
							
							diag_nama : $('#diag_nama41').val(),
							
							status : $('#status41').val(),
							
							diag_aktif : $("#status41").val(),
							diag_id : $('#diag_id41').val(),
						},
						type : 'POST',
						dataType :'JSON',
						beforeSend:function(){
							                
						},
						success : function(data){
							
								alert(data.ket);
								jQuery("#list241").trigger("reloadGrid");
								$("#batal41").trigger('click');
							
						 }
						});
					
				}
				
				return false;
		
				
		})
		

		
		$('#hpus41').click(function(){
			
			
							
							if($('#diag_aktif41').val()=='') {
								alert('Pilih Data Yang Akan Di Hapus'); 
								
								return false;
							}
							
							
							if($('#diag_id41').val()=='') {
								alert('Pilih Data Yang Akan Di Hapus'); 
								
								return false;
							}
							
					
				var conf = confirm("Yakin Akan Menghapus Data Ini?");
				
            	if (conf) {
					$.ajax({
					url : base_js+"index.php/diagnosa/crud",
					data : {
						action : "del",
							diag_aktif : $('#diag_aktif41').val(),
							diag_id : $('#diag_id41').val(),
					},
					type : 'POST',
					dataType :'JSON',
					beforeSend:function(){
						                
					},
					success : function(data){
						
						alert(data.ket);  
						jQuery("#list241").trigger("reloadGrid");
						$("#batal41").trigger('click');
					 }
					});
				}
				
				
			
		
		
		});

		
		$("#batal41").click(function(){
			
			
			$('#simpandata41').val('Simpan');
			
						
						$('#diag_aktif41').val('');
						
						$('#diag_id41').val('');
							$('#diag_kode41').val('');
						
							$('#diag_nama41').val('');
						
							
							$("select#status41").prop('selectedIndex', 0);
						
			})
			
			
			
				
			 })

		
		
		
		


                 