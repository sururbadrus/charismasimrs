$(document).ready(function () {
		var mygrid47=jQuery("#list247").jqGrid({
					url: base_js+"/index.php/pasien/view_grid47", 
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
					pager: '#pager247',
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
		jQuery("#list247").jqGrid('navGrid','#pager247',{view:false,edit:false,add:false,del:false,search:false,refresh:true});
		jQuery("#list247").jqGrid('navButtonAdd',"#pager247",{caption:"Cari",title:"Cari", buttonicon :'ui-icon-search', onClickButton:function(){ mygrid47[0].toggleToolbar() } }); 
		jQuery("#list247").jqGrid('filterToolbar',{
            stringResult: true,
            searchOnEnter : true
        });
		mygrid47[0].toggleToolbar();
		jQuery("#list247").setGridParam({onSelectRow:function(id){
		var data_47=id.split(',');
			$('#simpandata47').val('Ubah');
			$("#pas_no_rm47").val(jQuery("#list247").jqGrid('getCell',id,'pas_no_rm'));
			$("#pas_nama47").val(jQuery("#list247").jqGrid('getCell',id,'pas_nama'));
			$("#pas_sex47").val(jQuery("#list247").jqGrid('getCell',id,'pas_sex'));
			$("#pas_tempat_lahir47").val(data_47[1]);
			$("#pas_tgl_lahir47").val(jQuery("#list247").jqGrid('getCell',id,'pas_tgl_lahir'));
			$("#pas_alamat47").val(jQuery("#list247").jqGrid('getCell',id,'pas_alamat'));
			$("#pas_agama_id47").val(data_47[2]);
			$("#pas_rt47").val(jQuery("#list247").jqGrid('getCell',id,'pas_rt'));
			$("#pas_rw47").val(jQuery("#list247").jqGrid('getCell',id,'pas_rw'));
			$("#pas_ortu47").val(jQuery("#list247").jqGrid('getCell',id,'pas_ortu'));
			$("#pas_prop_id47").val(data_47[6]);
			$("#pas_kab_id47").val(data_47[5]);
			$("#pas_desa_id47").val(data_47[3]);
			$("#pas_kec_id47").val(data_47[4]);
			$("#pas_pendidikan_id47").val(data_47[7]);
			$("#pas_pekerjaan_id47").val(data_47[8]);
			$("#pas_telp47").val(jQuery("#list247").jqGrid('getCell',id,'pas_telp'));
			$("#pas_meninggal47").val(data_47[9]);
			$("#pas_no_rm_lm47").val(data_47[10]);
			$("#pas_identitas_id47").val(data_47[11]);
			$("#pas_no_identitas47").val(jQuery("#list247").jqGrid('getCell',id,'pas_no_identitas'));
			$("#pas_aktif47").val(data_47[0]);
			$("#pas_id47").val(data_47[14]);
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
		
		
		$("#form_pasien47").validationEngine({promptPosition : "topRight", scroll: false});
		$("#simpandata47").click(function(){
			$("#h_form47").val($("#simpandata47").val());
			$("#form_pasien47").trigger("submit");
		})
		$("#hpus47").click(function(){
			$("#h_form47").val($("#hpus47").val())
			$("#form_pasien47").trigger("submit");
		});
		$("#form_pasien47").submit(function() { 
			var act=$("#h_form47").val();
			$(this).ajaxSubmit({
			data:{"act":act},
			beforeSubmit:  function (formData, jqForm, options) { 
							if($("#form_pasien47").validationEngine("validate")){
								var conf = confirm("Yakin Akan "+act+" Data Ini?");
								if(conf) {
								$('#curtain').css('display','block');
								return true;
								
								} else return false;
							}else{
								return false;
							}
						} ,
			success:       function(data)  {
							if(data.dt.status) 
							{
								$("#simpandata47").val("Simpan");
								jQuery("#list247").trigger("reloadGrid");
								$("#batal47").trigger('click');
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
							$('#curtain').css('display','none');
						} ,
	 
			url:base_js+'index.php/pasien/crud47',
			type:"post",       
			dataType:"JSON",
			});
			return false; 
		}); 
			
			
		
		$("#batal47").click(function(){
			
			$("#form_pasien47").validationEngine('hideAll');
			$('#simpandata47').val('Simpan');
			$("#h_form47").val("")
			$('#pas_id47').val('');
		  $("select#pas_sex47").prop('selectedIndex', 0);
		  $("select#pas_agama_id47").prop('selectedIndex', 0);
		  $("select#pas_prop_id47").prop('selectedIndex', 0);
		  $("select#pas_kab_id47").prop('selectedIndex', 0);
		  $("select#pas_desa_id47").prop('selectedIndex', 0);
		  $("select#pas_kec_id47").prop('selectedIndex', 0);
		  $("select#pas_pendidikan_id47").prop('selectedIndex', 0);
		  $("select#pas_pekerjaan_id47").prop('selectedIndex', 0);
		  $("select#pas_meninggal47").prop('selectedIndex', 0);
		  $("select#pas_identitas_id47").prop('selectedIndex', 0);
		  $("select#pas_aktif47").prop('selectedIndex', 0);
		  $("#form_pasien47").resetForm();
		  //$("#form_pasien47").clearForm();
			})
		$("#pas_tgl_lahir47").datetimepicker({
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
		})