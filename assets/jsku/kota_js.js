                         
		$(document).ready(function () {
		var mygrid45=jQuery("#list245").jqGrid({
					url: base_js+"/index.php/kota/view_grid45", 
					datatype: "json", 
					height:250, 
					//postData: { id: '0' },
					mtype: "POST",
					colNames: ['NAMA KOTA','AKTIF'],
					colModel: [
						//{name:'', index:'',width:50,align:'center'},
						{name:'kota_nama',width:300,index:'kota_nama',editable:false},
						{name:'kaktif',width:100,index:'kaktif',editable:false},
					],
					
					rowNum: 7,
					rowList: [7,20,30,50],
					pager: '#pager245',
					sortname: 'kota_nama',
					viewrecords: true,
					sortorder: "asc",
					autowidth: true,
					multiselect: false, 
					rownumbers: true,
					rownumWidth:40,
					caption: "Kota", 
					beforeRequest: function() {
            			responsive_jqgrid($(".jqGrid"));
        			}				
				});
				
				jQuery("#list245").jqGrid('navGrid','#pager245',{view:false,edit:false,add:false,del:false,search:false,refresh:true});	

		jQuery("#list245").jqGrid('navButtonAdd',"#pager245",{caption:"Cari",title:"Cari", buttonicon :'ui-icon-search', onClickButton:function(){ mygrid45[0].toggleToolbar() } }); 
		
		jQuery("#list245").jqGrid('filterToolbar',{
            stringResult: true,
            searchOnEnter : true
        });
		mygrid45[0].toggleToolbar();
		jQuery("#list245").setGridParam({onSelectRow:function(id){
		var data_45=id.split(',');
			$('#simpandata45').val('Ubah');
			
							$("#kota_nama45").val(jQuery("#list245").jqGrid('getCell',id,'kota_nama'));
						
										  $("#kota_aktif45").val(data_45[1]);			
						  
										  $("#kota_id45").val(data_45[0]);			
						  
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
		
		
			$("#form_kota45").validationEngine({promptPosition : "topRight", scroll: false});
			
			$("#simpandata45").click(function(){
					$("#h_form45").val($("#simpandata45").val());
					$("#form_kota45").trigger("submit");
				})
			$("#hpus45").click(function(){
				$("#h_form45").val($("#hpus45").val())
				$("#form_kota45").trigger("submit");
			});
			
			
			 $("#form_kota45").submit(function() { 
		  var act=$("#h_form45").val();
		   $(this).ajaxSubmit({
			data:{"act":act},
			beforeSubmit:  function (formData, jqForm, options) { 
							if($("#form_kota45").validationEngine("validate")){
								var conf = confirm("Yakin Akan "+act+" Data Ini?");
								if(conf) return true; else return false;
								
							}else{
								return false;
							}
						} ,
			success:       function(data)  { 
			
							if(data.dt.status) 
							{
								$("#simpandata45").val("Simpan");
								$("#form_kota45").resetForm();
								$("#form_kota45").clearForm();
								jQuery("#list245").trigger("reloadGrid");
								$("#batal45").trigger('click');
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
	 
			url:base_js+'index.php/kota/crud45',
			type:"post",       
			dataType:"JSON",   
				 
			}); 
	 
			return false; 
		}); 
			
			
		
		$("#batal45").click(function(){
			
			$("#form_kota45").validationEngine('hideAll');
			$('#simpandata45').val('Simpan');
			$("#h_form45").val("")
			
						
						$('#kota_id45').val('');
							$('#kota_nama45').val('');
						
							
							$("select#kota_aktif45").prop('selectedIndex', 0);
						
			})
			
		})
		
		                        