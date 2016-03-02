$(document).ready(function () {
		var mygrid39=jQuery("#list239").jqGrid({
					url: base_js+"/index.php/curr/view_grid39", 
					datatype: "json", 
					height: "250", 
					//postData: { id: '0' },
					mtype: "POST",
					colNames: ['KODE','MATA UANG','STATUS'],
					colModel: [
						//{name:'', index:'',width:50,align:'center'},
						{name:'curr_kode',width:100,index:'curr_kode',editable:false},
						{name:'curr_nama',width:400,index:'curr_nama',editable:false},
						{name:'acurr',width:100,index:'acurr',editable:false},
					],
					
					rowNum: 7,
					rowList: [20,30,50],
					pager: '#pager239',
					sortname: 'curr_nama',
					viewrecords: true,
					sortorder: "asc",
					autowidth: true,
					multiselect: false, 
					rownumbers: true,
					rownumWidth:40,
					caption: "Mata Uang", 
					beforeRequest: function() {
            			responsive_jqgrid($(".jqGrid"));
        			}				
				});
		jQuery("#list239").jqGrid('navGrid','#pager239',{view:false,edit:false,add:false,del:false,search:false,refresh:true});
		jQuery("#list239").jqGrid('navButtonAdd',"#pager239",{caption:"Cari",title:"Cari", buttonicon :'ui-icon-search', onClickButton:function(){ mygrid39[0].toggleToolbar() } }); 
		jQuery("#list239").jqGrid('filterToolbar',{
            stringResult: true,
            searchOnEnter : true
        });
		mygrid39[0].toggleToolbar();
		jQuery("#list239").setGridParam({onSelectRow:function(id){
		var data_39=id.split(',');
			$('#simpandata39').val('Ubah');
			$("#curr_kode39").val(jQuery("#list239").jqGrid('getCell',id,'curr_kode'));
			$("#curr_nama39").val(jQuery("#list239").jqGrid('getCell',id,'curr_nama'));
			$("#curr_aktif39").val(data_39[1]);
			$("#curr_id39").val(data_39[0]);
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
		
		
		$("#form_curr39").validationEngine({promptPosition : "topRight", scroll: false});
		$("#simpandata39").click(function(){
			$("#h_form39").val($("#simpandata39").val());
			$("#form_curr39").trigger("submit");
		})
		$("#hpus39").click(function(){
			$("#h_form39").val($("#hpus39").val())
			$("#form_curr39").trigger("submit");
		});
		$("#form_curr39").submit(function() { 
			var act=$("#h_form39").val();
			$(this).ajaxSubmit({
			data:{"act":act},
			beforeSubmit:  function (formData, jqForm, options) { 
							if($("#form_curr39").validationEngine("validate")){
								var conf = confirm("Yakin Akan "+act+" Data Ini?");
								if(conf) return true; else return false;
							}else{
								return false;
							}
						} ,
			success:       function(data)  {
							if(data.dt.status) 
							{
								$("#simpandata39").val("Simpan");
								jQuery("#list239").trigger("reloadGrid");
								$("#batal39").trigger('click');
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
	 
			url:base_js+'index.php/curr/crud39',
			type:"post",       
			dataType:"JSON",
			});
			return false; 
		}); 
			
			
		
		$("#batal39").click(function(){
			
			$("#form_curr39").validationEngine('hideAll');
			$('#simpandata39').val('Simpan');
			$("#h_form39").val("")
			$('#curr_id39').val('');
		  $("select#curr_aktif39").prop('selectedIndex', 0);
		  $("#form_curr39").resetForm();
			})
		})