$(document).ready(function () {
		var mygrid18=jQuery("#list218").jqGrid({
					url: base_js+"/index.php/pasien/view_grid18", 
					datatype: "json", 
					height: "300", 
					//postData: { id: '0' },
					mtype: "POST",
					colNames: ['NO RM','NAMA PASIEN','L/P','TGL LAHIR','ALAMAT PASIEN','RT','RW','ORTU','NO TELP','NO IDENTITAS'],
					colModel: [
						//{name:'', index:'',width:50,align:'center'},
						{name:'pas_no_rm',width:140,index:'pas_no_rm',editable:false},
						{name:'pas_nama',width:250,index:'pas_nama',editable:false},
						{name:'pas_sex',width:50,index:'pas_sex',editable:false},
						{name:'pas_tgl_lahir',width:120,index:'pas_tgl_lahir',editable:false},
						{name:'pas_alamat',width:350,index:'pas_alamat',editable:false},
						{name:'pas_rt',width:50,index:'pas_rt',editable:false},
						{name:'pas_rw',width:50,index:'pas_rw',editable:false},
						{name:'pas_ortu',width:200,index:'pas_ortu',editable:false},
						{name:'pas_telp',width:100,index:'pas_telp',editable:false},
						{name:'pas_no_identitas',width:100,index:'pas_no_identitas',editable:false},
					],
					
					rowNum: 20,
					rowList: [20,30,50],
					pager: '#pager218',
					sortname: 'pas_nama',
					viewrecords: true,
					sortorder: "asc",
					autowidth: false,
					multiselect: false, 
					rownumbers: true,
					rownumWidth:40,
					caption: "List pasien", 
					beforeRequest: function() {
            			responsive_jqgrid($(".jqGrid"));
        			}				
				});
		jQuery("#list218").jqGrid('navGrid','#pager218',{view:false,edit:false,add:false,del:false,search:false,refresh:true});
		jQuery("#list218").jqGrid('navButtonAdd',"#pager218",{caption:"Cari",title:"Cari", buttonicon :'ui-icon-search', onClickButton:function(){ mygrid18[0].toggleToolbar() } }); 
		jQuery("#list218").jqGrid('filterToolbar',{
            stringResult: true,
            searchOnEnter : true
        });
		mygrid18[0].toggleToolbar();
		jQuery("#list218").setGridParam({onSelectRow:function(id){
		var data_18=id.split(',');
			$('#simpandata18').val('Ubah');
			$("#pas_no_rm18").val(jQuery("#list218").jqGrid('getCell',id,'pas_no_rm'));
			$("#pas_nama18").val(jQuery("#list218").jqGrid('getCell',id,'pas_nama'));
			$("#pas_sex18").val(jQuery("#list218").jqGrid('getCell',id,'pas_sex'));
			$("#pas_tempat_lahir18").val(data_18[1]);
			$("#pas_tgl_lahir18").val(jQuery("#list218").jqGrid('getCell',id,'pas_tgl_lahir'));
			$("#pas_alamat18").val(jQuery("#list218").jqGrid('getCell',id,'pas_alamat'));
			$("#pas_agama_id18").val(data_18[2]);
			$("#pas_rt18").val(jQuery("#list218").jqGrid('getCell',id,'pas_rt'));
			$("#pas_rw18").val(jQuery("#list218").jqGrid('getCell',id,'pas_rw'));
			$("#pas_ortu18").val(jQuery("#list218").jqGrid('getCell',id,'pas_ortu'));
			$("#pas_prop_id18").val(data_18[6]);
			$("#pas_kab_id18").val(data_18[5]);
			$("#pas_desa_id18").val(data_18[3]);
			$("#pas_kec_id18").val(data_18[4]);
			$("#pas_pendidikan_id18").val(data_18[7]);
			$("#pas_pekerjaan_id18").val(data_18[8]);
			$("#pas_telp18").val(jQuery("#list218").jqGrid('getCell',id,'pas_telp'));
			$("#pas_meninggal18").val(data_18[9]);
			$("#pas_no_rm_lm18").val(data_18[10]);
			$("#pas_identitas_id18").val(data_18[11]);
			$("#pas_no_identitas18").val(jQuery("#list218").jqGrid('getCell',id,'pas_no_identitas'));
			$("#pas_aktif18").val(data_18[0]);
			$("#pas_id18").val(data_18[14]);
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
		 $("input").change(function(){
				$(this).parent().parent().removeClass('has-error');
				$(this).next().empty();
			});
			$("textarea").change(function(){
				$(this).parent().parent().removeClass('has-error');
				$(this).next().empty();
			});
			$("select").change(function(){
				$(this).parent().parent().removeClass('has-error');
				$(this).next().empty();
			});
		
		
		$("#form_pasien18").validationEngine({promptPosition : "topRight", scroll: false});
		$("#simpandata18").click(function(){
			$("#h_form18").val($("#simpandata18").val());
			$("#form_pasien18").trigger("submit");
		})
		$("#hpus18").click(function(){
			$("#h_form18").val($("#hpus18").val())
			$("#form_pasien18").trigger("submit");
		});
		$("#form_pasien18").submit(function() { 
			var act=$("#h_form18").val();
			$(this).ajaxSubmit({
			data:{"act":act},
			beforeSubmit:  function (formData, jqForm, options) { 
							if($("#form_pasien18").validationEngine("validate")){
								var conf = confirm("Yakin Akan "+act+" Data Ini?");
								if(conf) return true; else return false;
							}else{
								return false;
							}
						} ,
			success:       function(data)  {
							if(data.dt.status) 
							{
								$("#simpandata18").val("Simpan");
								jQuery("#list218").trigger("reloadGrid");
								$("#batal18").trigger('click');
								alert(data.ket);
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
	 
			url:base_js+'index.php/pasien/crud18',
			type:"post",       
			dataType:"JSON",
			});
			return false; 
		}); 
			
			
		
		$("#batal18").click(function(){
			
			$("#form_pasien18").validationEngine('hideAll');
			$('#simpandata18').val('Simpan');
			$("#h_form18").val("")
			$('#pas_id18').val('');
		  $("select#pas_sex18").prop('selectedIndex', 0);
		  $("select#pas_agama_id18").prop('selectedIndex', 0);
		  $("select#pas_prop_id18").prop('selectedIndex', 0);
		  $("select#pas_kab_id18").prop('selectedIndex', 0);
		  $("select#pas_desa_id18").prop('selectedIndex', 0);
		  $("select#pas_kec_id18").prop('selectedIndex', 0);
		  $("select#pas_pendidikan_id18").prop('selectedIndex', 0);
		  $("select#pas_pekerjaan_id18").prop('selectedIndex', 0);
		  $("select#pas_meninggal18").prop('selectedIndex', 0);
		  $("select#pas_identitas_id18").prop('selectedIndex', 0);
		  $("#form_pasien18").resetForm();
		  $("#form_pasien18").clearForm();
			})
		$("#pas_tgl_lahir18").datetimepicker({
				language:  "id",
				format:"dd-mm-yyyy",
				autoclose:1,
				todayBtn: true,
				startView: 2,
				minView: 2,
				}).on("hide", function(e) {
					if($(this).val()!=""){
						//alert("");
						}
				 }); 
		$('#pas_aktif18').typeahead({
			onSelect: function(item) {
				 $('#hdiag').val(item.value);
			},
			ajax: {
				url: base_js+"/index.php/pasien/pas_aktif",
				timeout: 500,
				triggerLength: 1,
				method: "post",
				loadingClass: "loading-circle",
				preDispatch: function (query) {
					return {
						search: query
					}
				},
				preProcess: function (data) {
					//showLoadingMask(false);
					if (data.success === false) {
						// Hide the list, there was some error
						return false;
					}
					// We good!
					return data;
				}
			}
		});
			
			
			
		})