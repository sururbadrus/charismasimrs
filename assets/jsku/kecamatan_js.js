$(document).ready(function () {
		var mygrid33=jQuery("#list233").jqGrid({
					url: base_js+"index.php/kecamatan/view_grid33", 
					datatype: "json", 
					height: "250", 
					//postData: { id: '0' },
					mtype: "POST",
					colNames: ['KODE','NAMA KEC','STATUS'],
					colModel: [
						//{name:'', index:'',width:50,align:'center'},
						{name:'kec_kode',width:100,index:'kec_kode',editable:false},
						{name:'kec_nama',width:200,index:'kec_nama',editable:false},
						{name:'st',width:80,index:'st',editable:false},
					],
					
					rowNum: 7,
					rowList: [20,30,50],
					pager: '#pager233',
					sortname: 'kec_nama',
					viewrecords: true,
					sortorder: "asc",
					autowidth: true,
					multiselect: false, 
					rownumbers: true,
					rownumWidth:40,
					caption: "List kecamatan", 
					beforeRequest: function() {
            			responsive_jqgrid($(".jqGrid"));
        			}				
				});
		jQuery("#list233").jqGrid('navGrid','#pager233',{view:false,edit:false,add:false,del:false,search:false,refresh:true});
		jQuery("#list233").jqGrid('navButtonAdd',"#pager233",{caption:"Cari",title:"Cari", buttonicon :'ui-icon-search', onClickButton:function(){ mygrid33[0].toggleToolbar() } }); 
		jQuery("#list233").jqGrid('filterToolbar',{
            stringResult: true,
            searchOnEnter : true
        });
		mygrid33[0].toggleToolbar();
		jQuery("#list233").setGridParam({onSelectRow:function(id){
		var data_33=id.split(',');
			$('#simpandata33').val('Ubah');
			$("#kec_kode33").val(jQuery("#list233").jqGrid('getCell',id,'kec_kode'));
			$("#kec_nama33").val(jQuery("#list233").jqGrid('getCell',id,'kec_nama'));
			$("#kec_aktif33").val(data_33[1]);
			$("#kec_id33").val(data_33[0]);
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
		
		
		$("#form_kecamatan33").validationEngine({promptPosition : "topRight", scroll: false});
		$("#simpandata33").click(function(){
			$("#h_form33").val($("#simpandata33").val());
			$("#form_kecamatan33").trigger("submit");
		})
		$("#hpus33").click(function(){
			$("#h_form33").val($("#hpus33").val())
			$("#form_kecamatan33").trigger("submit");
		});
		$("#form_kecamatan33").submit(function() { 
			var act=$("#h_form33").val();
			$(this).ajaxSubmit({
			data:{"act":act},
			beforeSubmit:  function (formData, jqForm, options) { 
							if($("#form_kecamatan33").validationEngine("validate")){
								var conf = confirm("Yakin Akan "+act+" Data Ini?");
								if(conf) return true; else return false;
							}else{
								return false;
							}
						} ,
			success:       function(data)  {
							if(data.dt.status) 
							{
								$("#simpandata33").val("Simpan");
								jQuery("#list233").trigger("reloadGrid");
								$("#batal33").trigger('click');
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
	 
			url:base_js+'index.php/kecamatan/crud33',
			type:"post",       
			dataType:"JSON",
			});
			return false; 
		}); 
			
			
		
		$("#batal33").click(function(){
			
			$("#form_kecamatan33").validationEngine('hideAll');
			$('#simpandata33').val('Simpan');
			$("#h_form33").val("")
			$('#kec_id33').val('');
		  $("select#kec_aktif33").prop('selectedIndex', 0);
		  $("select#kec_aktif33").selectpicker('refresh');
		  $("#form_kecamatan33").resetForm();
			})
		})