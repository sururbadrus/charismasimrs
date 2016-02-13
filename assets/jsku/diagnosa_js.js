                         
		$(document).ready(function () {
			
		var mygrid12=jQuery("#list212").jqGrid({
					url: base_js+"index.php/diagnosa/view_grid12", 
					datatype: "json", 
					height: "300", 
					//postData: { id: '0' },
					mtype: "POST",
					colNames: ['KODE','DIAGNOSA','STATUS'],
					colModel: [
						//{name:'', index:'',width:50,align:'center'},
						{name:'diag_kode',width:100,index:'diag_kode',editable:false},
						{name:'diag_nama',width:400,index:'diag_nama',editable:false},
						{name:'stdiag',width:150,index:'stdiag',editable:false},
					],
					
					rowNum: 20,
					rowList: [20,30,50],
					pager: '#pager212',
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
				
				jQuery("#list212").jqGrid('navGrid','#pager212',{view:false,edit:false,add:false,del:false,search:false,refresh:true});	

		jQuery("#list212").jqGrid('navButtonAdd',"#pager212",{caption:"Cari",title:"Cari", buttonicon :'ui-icon-search', onClickButton:function(){ mygrid12[0].toggleToolbar() } }); 
		
		jQuery("#list212").jqGrid('filterToolbar',{
            stringResult: true,
            searchOnEnter : true
        });
		mygrid12[0].toggleToolbar();
		jQuery("#list212").setGridParam({onSelectRow:function(id){
		var data_12=id.split(',');
			$('#simpandata12').val('Ubah');
			
							$("#diag_kode12").val(jQuery("#list212").jqGrid('getCell',id,'diag_kode'));
						
							$("#diag_nama12").val(jQuery("#list212").jqGrid('getCell',id,'diag_nama'));
						
										  $("#diag_aktif12").val(data_12[1]);			
						  
										  $("#diag_id12").val(data_12[0]);			
						  
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
			$("#simpandata12").click(function(){
			var action=$('#simpandata12').val();
			;
			if(action=='Simpan'){
							
					if($('#diag_kode12').val()=='') {
						alert('Data Tidak Boleh Kosong'); 
						$('#diag_kode12').focus();
						return false;
					}
					
							
					if($('#diag_nama12').val()=='') {
						alert('Data Tidak Boleh Kosong'); 
						$('#diag_nama12').focus();
						return false;
					}
					
							
					if($('#diag_aktif12').val()=='') {
						alert('Data Tidak Boleh Kosong'); 
						$('#diag_aktif12').focus();
						return false;
					}
					
					var conf = confirm("Yakin Akan Menyimpan Data Ini?");
			}
			else{
					if($('#diag_id12').val()=='') {
						alert('Hiden Id Tidak Boleh Kosong'); 
						return false;
					}
					
					var conf = confirm("Yakin Akan Mengubah Data Ini?");
				}
            	if (conf) {
				$.ajax({
						url : base_js+"index.php/diagnosa/crud12",
						data : {
							action : action,
							
							diag_kode : $('#diag_kode12').val(),
							
							diag_nama : $('#diag_nama12').val(),
							
							diag_aktif : $('#diag_aktif12').val(),
							
							diag_id : $('#diag_id12').val(),
						},
						type : 'POST',
						dataType :'JSON',
						beforeSend:function(){
							                
						},
						success : function(data){
							
								alert(data.ket);
								jQuery("#list212").trigger("reloadGrid");
								$("#batal12").trigger('click');
							
						 }
						});
					
				}
				
				return false;
		
				
		})
		
		
		$('#hpus12').click(function(){
			
			
							
							if($('#diag_id12').val()=='') {
								alert('Pilih Data Yang Akan Di Hapus'); 
								
								return false;
							}
							
					
				var conf = confirm("Yakin Akan Menghapus Data Ini?");
				
            	if (conf) {
					$.ajax({
					url : base_url()+'/index.php/diagnosa/crud',
					data : {
						action : "del",
							diag_id : $('#diag_id12').val(),
					},
					type : 'POST',
					dataType :'JSON',
					beforeSend:function(){
						                
					},
					success : function(data){
						
						alert(data.ket);  
						jQuery("#list212").trigger("reloadGrid");
						$("#batal12").trigger('click');
					 }
					});
				}
				
				
			
		
		
		});

		
		$("#batal12").click(function(){
			
			
			$('#simpandata12').val('Simpan');
			
						
						$('#diag_id12').val('');
							$('#diag_kode12').val('');
						
							$('#diag_nama12').val('');
						
							
							$("select#diag_aktif12").prop('selectedIndex', 0);
						
			})
			
		})
			 		
		
		                        