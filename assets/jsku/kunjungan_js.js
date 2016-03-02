$(document).ready(function () {
		var mygrid17=jQuery("#list217").jqGrid({
					url: base_js+"index.php/kunjungan/view_grid17", 
					datatype: "json", 
					height: "500", 
					//postData: { id: '0' },
					mtype: "POST",
					colNames: ['NO INDUK','NAMA','TGL LAHIR','UMUR','L/P','ALAMAT','TUJUAN','UNIT'],
					colModel: [
						//{name:'', index:'',width:50,align:'center'},
						{name:'noinduk',width:100,index:'noinduk',editable:false},
						{name:'pas_nama',width:150,index:'pas_nama',editable:false},
						{name:'pas_tgl_lahir',width:100,index:'pas_tgl_lahir',editable:false},
						{name:'kun_th',width:50,index:'kun_th',editable:false},
						{name:'pas_sex',width:50,index:'pas_sex',editable:false},
						{name:'pas_alamat',width:200,index:'pas_alamat',editable:false},
						{name:'tujuan_nama',width:120,index:'tujuan_nama',editable:false},
						{name:'unit_nama',width:120,index:'unit_nama',editable:false},
					],
					
					rowNum: 7,
					rowList: [20,30,50],
					pager: '#pager217',
					sortname: 'kun_id',
					viewrecords: true,
					sortorder: "asc",
					autowidth: true,
					multiselect: false, 
					rownumbers: true,
					rownumWidth:40,
					caption: "List Kunjungan", 
					beforeRequest: function() {
            			responsive_jqgrid($(".jqGrid"));
        			}				
				});
		jQuery("#list217").jqGrid('navGrid','#pager217',{view:false,edit:false,add:false,del:false,search:false,refresh:true});
		jQuery("#list217").jqGrid('navButtonAdd',"#pager217",{caption:"Cari",title:"Cari", buttonicon :'ui-icon-search', onClickButton:function(){ mygrid17[0].toggleToolbar() } }); 
		jQuery("#list217").jqGrid('filterToolbar',{
            stringResult: true,
            searchOnEnter : true
        });
		mygrid17[0].toggleToolbar();
		jQuery("#list217").setGridParam({onSelectRow:function(id){
		var data_17=id.split(',');
			$('#simpandata17').val('Ubah');
			$("#noinduk17").val(jQuery("#list217").jqGrid('getCell',id,'noinduk'));
			$("#pas_nama17").val(jQuery("#list217").jqGrid('getCell',id,'pas_nama'));
			$("#pas_iskk17").val(data_17[2]);
			$("#pas_kk17").val(data_17[3]);
			$("#pas_sex17").val(jQuery("#list217").jqGrid('getCell',id,'pas_sex'));
			$("#pas_noktp17").val(data_17[4]);
			$("#pas_pekerjaan_id17").val(data_17[5]);
			$("#pas_tgl_lahir17").val(jQuery("#list217").jqGrid('getCell',id,'pas_tgl_lahir'));
			$("#kun_th17").val(jQuery("#list217").jqGrid('getCell',id,'kun_th'));
			$("#kun_bln17").val(data_17[6]);
			$("#kun_hr17").val(data_17[7]);
			//$("#kun_ku_id17").val(data_17[8]);
			$("#pas_asal17").val(data_17[11]);
			$("#pas_kec_id17").val(data_17[12]);
			$("#pas_desa_id17").val(data_17[13]);
			$("#pas_alamat17").val(jQuery("#list217").jqGrid('getCell',id,'pas_alamat'));
			$("#pas_rt17").val(data_17[9]);
			$("#pas_rw17").val(data_17[10]);
			$("#kun_tgl17").val(data_17[22]);
			$("#kun_tujuan_id17").val(data_17[14]);
			$("#kun_kp_id17").val(data_17[15]);
			$("#kun_no_penjamin17").val(data_17[16]);
			$("#kun_karcis17").val(data_17[17]);
			$("#kun_no_seri17").val(data_17[18]);
			$("#kun_unit_id17").val(data_17[19]);
			$("#kun_pustu_id17").val(data_17[20]);
			$("#kun_id17").val(data_17[21]);
			$("#kun_pas_id17").val(data_17[23]);
			$('.selectpicker').selectpicker('refresh');
			
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
		
		
		$("#form_kunjungan17").validationEngine({promptPosition : "topRight", scroll: false});
		$("#simpandata17").click(function(){
			$("#h_form17").val($("#simpandata17").val());
			$("#form_kunjungan17").trigger("submit");
		})
		$("#hpus17").click(function(){
			$("#h_form17").val($("#hpus17").val())
			$("#form_kunjungan17").trigger("submit");
		});
		$("#form_kunjungan17").submit(function() { 
			var act=$("#h_form17").val();
			$(this).ajaxSubmit({
			data:{"act":act},
			beforeSubmit:  function (formData, jqForm, options) { 
							if($("#form_kunjungan17").validationEngine("validate")){
								var conf = confirm("Yakin Akan "+act+" Data Ini?");
								if(conf) return true; else return false;
							}else{
								return false;
							}
						} ,
			success:       function(data)  {
							if(data.dt.status) 
							{
								$("#simpandata17").val("Simpan");
								jQuery("#list217").trigger("reloadGrid");
								$("#batal17").trigger('click');
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
	 
			url:base_js+'index.php/kunjungan/crud17',
			type:"get",       
			dataType:"JSON",
			});
			return false; 
		}); 
			
			
		
		$("#batal17").click(function(){
			
			$("#form_kunjungan17").validationEngine('hideAll');
			$('#simpandata17').val('Simpan');
			$("#h_form17").val("")
			$('#kun_id17').val('');
			$('#kun_ku_id17').val('');
			$('#kun_pas_id17').val('');
		  $("#pas_iskk17").prop("checked", false);
		  $("select#pas_sex17").prop('selectedIndex', 0);
		  $("select#pas_sex17").selectpicker('refresh');
		  $("select#pas_pekerjaan_id17").prop('selectedIndex', 0);
		  $("select#pas_pekerjaan_id17").selectpicker('refresh');
		  $("select#pas_asal17").prop('selectedIndex', 0);
		  $("select#pas_asal17").selectpicker('refresh');
		  $("select#pas_kec_id17").prop('selectedIndex', 0);
		  $("select#pas_kec_id17").selectpicker('refresh');
		  $("select#pas_desa_id17").prop('selectedIndex', 0);
		  $("select#pas_desa_id17").selectpicker('refresh');
		  $("select#kun_tujuan_id17").prop('selectedIndex', 0);
		  $("select#kun_tujuan_id17").selectpicker('refresh');
		  $("select#kun_kp_id17").prop('selectedIndex', 0);
		  $("select#kun_kp_id17").selectpicker('refresh');
		  $("select#kun_karcis17").prop('selectedIndex', 0);
		  $("select#kun_karcis17").selectpicker('refresh');
		  $("select#kun_unit_id17").prop('selectedIndex', 0);
		  $("select#kun_unit_id17").selectpicker('refresh');
		  $("select#kun_pustu_id17").prop('selectedIndex', 0);
		  $("select#kun_pustu_id17").selectpicker('refresh');
		  $("#form_kunjungan17").resetForm();
			})
		$("#pas_tgl_lahir17").datetimepicker({
				language:  "id",
				format:"dd-mm-yyyy",
				autoclose:1,
				todayBtn: true,
				startView: 2,
				minView: 2,
				}).on("hide", function(e) {
					if($(this).val()!=""){
						hitung_umur($('#pas_tgl_lahir17').val());
						//$(this).focus();
						//return false;
						}
				 });
		$("#kun_tgl17").datetimepicker({
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
				 
		$('#pas_kec_id17').change(function(){
				$.ajax({
					url:base_js+'kunjungan/change_kec',
					data:{kec_id:$('#pas_kec_id17').val()},
					dataType:"html",
					type:"post",
					success:function(hsl){
						
						$('#pas_desa_id17').html(hsl);
						 $("select#pas_desa_id17").selectpicker('refresh');
						}
					})
			});
			
		$('#kun_pel_unit17').change(function(){
				$.ajax({
					url:base_js+'kunjungan/change_pel_unit',
					data:{pel_unit:$('#kun_pel_unit17').val()},
					dataType:"html",
					type:"post",
					success:function(hsl){
						
						$('#kun_unit_id17').html(hsl);
						 $("select#kun_unit_id17").selectpicker('refresh');
						}
					})
			});
			
			
		$('#pas_iskk17').click(function(){
			if($("#pas_iskk17").prop("checked")){$('#pas_kk17').val($('#pas_nama17').val()); $('#pas_iskk17').val('1');}else{$('#pas_kk17').val('');$('#pas_iskk17').val('0');}
			
			})
		})
		
		function hitung_umur(tgl){
			$.ajax({
					url:base_js+'kunjungan/umur',
					data:{tgl_lahir:tgl},
					dataType:"html",
					type:"post",
					success:function(hsl){
						var hs=hsl.split('-');
						$('#kun_th17').val(hs[2]);
						$('#kun_bln17').val(hs[1]);
						$('#kun_hr17').val(hs[0]);
						$('#kun_ku_id17').val(hs[3]);
						}
					})
			}