                        $(document).ready(function () {
		var mygrid42=jQuery("#list242").jqGrid({
					datatype: "local", 
					height: "100", 
					//postData: { id: '0' },
					mtype: "POST",
					colNames: ['','NAMA PRODUK','KAPASITAS','SATUAN','HAPUS','','',''],
					colModel: [
						//{name:'', index:'',width:50,align:'center'},
						{name:'id',width:170,index:'id',editable:false,hidden:true},
						{name:'np',width:150,index:'np',editable:false},
						{name:'kp',width:210,index:'kp',editable:false},
						{name:'st',width:100,index:'st',editable:false},
						{name:'hps',width:100,index:'hps',editable:false,align:'center'},
						{name:'nph',width:170,index:'nph',editable:false,hidden:true},
						{name:'kph',width:170,index:'kph',editable:false,hidden:true},
						{name:'sth',width:170,index:'sth',editable:false,hidden:true},
						
						
						
					],
					
					rowNum: 2,
					rowList: [20,30,50],
					pager: '#pager242',
					sortname: 'per_nama',
					viewrecords: true,
					sortorder: "asc",
					autowidth: true,
					multiselect: false, 
					rownumbers: true,
					rownumWidth:40,
					caption: "List perusahaan", 
					beforeRequest: function() {
            			responsive_jqgrid($(".jqGrid"));
        			}				
				});
				
				jQuery("#list242").jqGrid('navGrid','#pager242',{view:false,edit:false,add:false,del:false,search:false,refresh:true});	

		jQuery("#list242").jqGrid('navButtonAdd',"#pager242",{caption:"Cari",title:"Cari", buttonicon :'ui-icon-search', onClickButton:function(){ mygrid42[0].toggleToolbar() } }); 
		
		jQuery("#list242").jqGrid('filterToolbar',{
            stringResult: true,
            searchOnEnter : true
        });
		mygrid42[0].toggleToolbar();
		jQuery("#list242").setGridParam({onSelectRow:function(id){} 
					});  
		 function responsive_jqgrid(jqgrid) {
			jqgrid.find('.ui-jqgrid').addClass('clear-margin').css('width', '');
			jqgrid.find('.ui-jqgrid-view').addClass('clear-margin ').css('width', '');
			jqgrid.find('.ui-jqgrid-view > div').eq(1).addClass('clear-margin').css('width', '').css('min-height', '0');
			jqgrid.find('.ui-jqgrid-view > div').eq(2).addClass('clear-margin').css('width', '').css('min-height', '0');
			jqgrid.find('.ui-jqgrid-sdiv').addClass('clear-margin').css('width', '');
			jqgrid.find('.ui-jqgrid-pager').addClass('clear-margin').css('width', '');
	
		}
		
		$('#addlist').click(function(){
				
				if($('#nama_produk').val()==''){
					alert('Data Tidak Boleh Kosong');
					$('#nama_produk').focus();
					return false;
					}
				if($('#kapasitas_produksi').val()==''){
					alert('Data Tidak Boleh Kosong');
					$('#kapasitas_produksi').focus();
					return false;
					}
				if($('#satuan').val()==''){
					alert('Data Tidak Boleh Kosong');
					$('#satuan').focus();
					return false;
					}
					
					
				var id=$('#nama_produk').val()+'|'+$('#kapasitas_produksi').val()+'|'+$('#satuan').val();
				var np=$('#nama_produk').val();
				var kp=$('#kapasitas_produksi').val();
				var st=$('#satuan').val();
				var add_data={'id':id,'np':np,'kp':kp,'st':st,'hps':'<input type="button" onclick="hapus(\''+id+'\')" value="Hapus" class="btn btn-info">','nph':'<input name="nph[]" type="hidden" value="'+np+'" >','kph':'<input name="kph[]" type="hidden" value="'+kp+'" >','sth':'<input name="sth[]" type="hidden" value="'+st+'" >'};
				jQuery("#list242").jqGrid('addRowData',id,add_data);
				var id=$('#nama_produk').val('');$('#kapasitas_produksi').val('0');$('#satuan').val('');
				$('#nama_produk').focus();
			})
			
			
		$("#form_curr39").validationEngine({promptPosition : "topRight", scroll: false});
		$("#simpan").click(function(){
			
			$("#form_curr39").trigger("submit");
		})
		$("#form_curr39").submit(function() { 
			$(this).ajaxSubmit({
			data:{"act":'Simpan'},
			beforeSubmit:  function (formData, jqForm, options) { 
							if($("#form_curr39").validationEngine("validate")){
								var conf = confirm("Yakin Akan Simpan Data Ini?");
								if(conf) return true; else return false;
							}else{
								return false;
							}
						} ,
			success:       function(data)  {
							if(data.dt.status) 
							{
								
								jQuery("#list242").trigger("reloadGrid");
								alert(data.ket);
								window.location=base_js+'/kproduksi';
								}
							else
							{
								for (var i = 0; i < data.dt.inputerror.length; i++) 
								{
									$('[name="'+data.dt.inputerror[i]+'"]').parent().parent().addClass('has-error'); 
									$('[name="'+data.dt.inputerror[i]+'"]').next().text(data.dt.error_string[i]); 
								}
							}
							
						} ,
	 
			url:base_js+'index.php/kproduksi/simpan_kp',
			type:"post",       
			dataType:"JSON",
			});
			return false; 
		}); 
			
			$(".money").maskMoney({
				prefix:'',
				allowNegative: true,
				thousands:'.',
				decimal:',',
				affixesStay: false,
				 precision :2,
				 allowZero:true
			});
			
			
			$('#nilai_investasi').keyup(function() {
				
					$('#nilai_investasi').maskMoney('mask');
				
			});
			
		})                        
		
		function hapus(v){
			
			jQuery("#list242").delRowData(v);
			}
		function batal(){
			$('#jml_karyawan').val('0');
			$('#nilai_investasi').val('0');
			$("select#negara").prop('selectedIndex', 0);
			}
			
			