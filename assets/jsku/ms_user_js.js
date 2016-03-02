$(document).ready(function () {
		
		var mygrid07=jQuery("#list207").jqGrid({
					url: base_js+"/index.php/ms_user/view_grid07", 
					datatype: "json", 
					height:200, 
					//postData: { id: '0' },
					mtype: "POST",
					colNames: ['USER NAME','NAMA PEGAWAI','NAMA GROUP','AKTIF'],
					colModel: [
						//{name:'', index:'',width:50,align:'center'},
						{name:'user_name',width:200,index:'user_name',editable:false},
						{name:'user_pegawai',width:250,index:'user_pegawai',editable:false},
						{name:'group_nama',width:180,index:'group_nama',editable:false},
						{name:'st_user',width:100,index:'st_user',editable:false},
					],
					
					rowNum: 20,
					rowList: [20,30,50],
					pager: '#pager207',
					sortname: 'user_pegawai',
					viewrecords: true,
					sortorder: "asc",
					autowidth: true,
					multiselect: false, 
					rownumbers: true,
					rownumWidth:40,
					caption: "List user", 
					beforeRequest: function() {
            			responsive_jqgrid($(".jqGrid"));
        			}				
				});
		jQuery("#list207").jqGrid('navGrid','#pager207',{view:false,edit:false,add:false,del:false,search:false,refresh:true});
		jQuery("#list207").jqGrid('navButtonAdd',"#pager207",{caption:"Cari",title:"Cari", buttonicon :'ui-icon-search', onClickButton:function(){ mygrid07[0].toggleToolbar() } }); 
		jQuery("#list207").jqGrid('filterToolbar',{
            stringResult: true,
            searchOnEnter : true
        });
		mygrid07[0].toggleToolbar();
		jQuery("#list207").setGridParam({onSelectRow:function(id){
		var data_07=id.split(',');
			$('#simpandata07').val('Ubah');
			$("#user_name07").val(jQuery("#list207").jqGrid('getCell',id,'user_name'));
			$("#user_pwd07").val(data_07[2]);
			$("#user_pegawai07").val(jQuery("#list207").jqGrid('getCell',id,'user_pegawai'));
			$("#user_group_id07").val(data_07[1]);
			$("#user_aktif07").val(data_07[3]);
			$("#user_id07").val(data_07[0]);
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
		
		$(".selectpicker").selectpicker().on("blur change", function() {
            $(this).validationEngine("validate");
        });
		
		$("#form_ms_user07").validationEngine({promptPosition : "topRight", scroll: false});
		$("#simpandata07").click(function(){
			$("#h_form07").val($("#simpandata07").val());
			$("#form_ms_user07").trigger("submit");
		})
		$("#hpus07").click(function(){
			$("#h_form07").val($("#hpus07").val())
			$("#form_ms_user07").trigger("submit");
		});
		$("#form_ms_user07").submit(function() { 
			var act=$("#h_form07").val();
			$(this).ajaxSubmit({
			data:{"act":act},
			beforeSubmit:  function (formData, jqForm, options) { 
							if($("#form_ms_user07").validationEngine("validate")){
								var conf = confirm("Yakin Akan "+act+" Data Ini?");
								if(conf) return true; else return false;
							}else{
								return false;
							}
						} ,
			success:       function(data)  {
							if(data.dt.status) 
							{
								$("#simpandata07").val("Simpan");
								jQuery("#list207").trigger("reloadGrid");
								$("#batal07").trigger('click');
								alert(data.ket);
								}
							else
							{
								for (var i = 0; i < data.dt.inputerror.length; i++) 
								{
									$('[name="'+data.dt.inputerror[i]+'"]').parent().parent().addClass('has-error'); 
									//$('[name="'+data.dt.inputerror[i]+'"]').next('.help-block').text(data.dt.error_string[i]); 
								}
							}
							
						} ,
	 
			url:base_js+'index.php/ms_user/crud07',
			type:"post",       
			dataType:"JSON"
			});
			return false; 
		}); 
			
			
		
		$("#batal07").click(function(){
			
			$("#form_ms_user07").validationEngine('hideAll');
			$('#simpandata07').val('Simpan');
			$("#h_form07").val("")
			$('#user_id07').val('');
		  $("select#user_group_id07").prop('selectedIndex', 0);
		  $("select#user_aktif07").prop('selectedIndex', 0);
		   $("select#user_group_id07").selectpicker('refresh');
		  $("#form_ms_user07").resetForm();
			})
		})