$(document).ready(function () {
		var mygrid17=jQuery("#list217").jqGrid({
					url: base_js+"/index.php/ms_group/view_grid17", 
					datatype: "json", 
					height: "200", 
					//postData: { id: '0' },
					mtype: "POST",
					colNames: ['NAMA GROUP','STATUS'],
					colModel: [
						//{name:'', index:'',width:50,align:'center'},
						{name:'group_nama',width:500,index:'group_nama',editable:false},
						{name:'stgrp',width:100,index:'stgrp',editable:false},
					],
					
					rowNum: 20,
					rowList: [20,30,50],
					pager: '#pager217',
					sortname: 'group_nama',
					viewrecords: true,
					sortorder: "asc",
					autowidth: true,
					multiselect: false, 
					rownumbers: true,
					rownumWidth:40,
					caption: "List Group", 
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
			$("#group_nama17").val(jQuery("#list217").jqGrid('getCell',id,'group_nama'));
			$("#group_aktif17").val(data_17[1]);
			$("#group_id17").val(data_17[0]);
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
		
		
		$("#form_ms_group17").validationEngine({promptPosition : "topRight", scroll: false});
		$("#simpandata17").click(function(){
			$("#h_form17").val($("#simpandata17").val());
			$("#form_ms_group17").trigger("submit");
		})
		$("#hpus17").click(function(){
			$("#h_form17").val($("#hpus17").val())
			$("#form_ms_group17").trigger("submit");
		});
		$("#form_ms_group17").submit(function() { 
			var act=$("#h_form17").val();
			$(this).ajaxSubmit({
			data:{"act":act},
			beforeSubmit:  function (formData, jqForm, options) { 
							if($("#form_ms_group17").validationEngine("validate")){
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
	 
			url:base_js+'index.php/ms_group/crud17',
			type:"post",       
			dataType:"JSON",
			});
			return false; 
		}); 
			
			
		
		$("#batal17").click(function(){
			
			$("#form_ms_group17").validationEngine('hideAll');
			$('#simpandata17').val('Simpan');
			$("#h_form17").val("")
			$('#group_id17').val('');
		  $("select#group_aktif17").prop('selectedIndex', 0);
		  $("select#group_aktif17").selectpicker('refresh');
		  $("#form_ms_group17").resetForm();
			})
		})