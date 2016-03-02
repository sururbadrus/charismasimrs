                         
		$(document).ready(function () {
		var mygrid05=jQuery("#list205").jqGrid({
					url: base_js+"/index.php/kategori/view_grid05", 
					datatype: "json", 
					height: "300", 
					//postData: { id: '0' },
					mtype: "POST",
					colNames: ['NAMA KATEGORI','STATUS'],
					colModel: [
						//{name:'', index:'',width:50,align:'center'},
						{name:'kategori_nama',width:300,index:'kategori_nama',editable:false},
						{name:'akategori',width:100,index:'akategori',editable:false},
					],
					
					rowNum: 20,
					rowList: [20,30,50],
					pager: '#pager205',
					sortname: 'kategori_nama',
					viewrecords: true,
					sortorder: "asc",
					autowidth: true,
					multiselect: false, 
					rownumbers: true,
					rownumWidth:40,
					caption: "Kategori", 
					beforeRequest: function() {
            			responsive_jqgrid($(".jqGrid"));
        			}				
				});
				
				jQuery("#list205").jqGrid('navGrid','#pager205',{view:false,edit:false,add:false,del:false,search:false,refresh:true});	

		jQuery("#list205").jqGrid('navButtonAdd',"#pager205",{caption:"Cari",title:"Cari", buttonicon :'ui-icon-search', onClickButton:function(){ mygrid05[0].toggleToolbar() } }); 
		
		jQuery("#list205").jqGrid('filterToolbar',{
            stringResult: true,
            searchOnEnter : true
        });
		mygrid05[0].toggleToolbar();
		jQuery("#list205").setGridParam({onSelectRow:function(id){
		var data_05=id.split(',');
			$('#simpandata05').val('Ubah');
			
							$("#kategori_nama05").val(jQuery("#list205").jqGrid('getCell',id,'kategori_nama'));
						
										  $("#kategori_aktif05").val(data_05[1]);			
						  
										  $("#kategori_id05").val(data_05[0]);			
						  
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
		
		
			$("#form_kategori05").validationEngine({promptPosition : "topRight", scroll: false});
			
			$("#simpandata05").click(function(){
					$("#h_form05").val($("#simpandata05").val());
					$("#form_kategori05").trigger("submit");
				})
			$("#hpus05").click(function(){
				$("#h_form05").val($("#hpus05").val())
				$("#form_kategori05").trigger("submit");
			});
			
			
			 $("#form_kategori05").submit(function() { 
		  var act=$("#h_form05").val();
		   $(this).ajaxSubmit({
			data:{"act":act},
			beforeSubmit:  function (formData, jqForm, options) { 
							if($("#form_kategori05").validationEngine("validate")){
								var conf = confirm("Yakin Akan "+act+" Data Ini?");
								if(conf) return true; else return false;
								
							}else{
								return false;
							}
						} ,
			success:       function(data)  { 
			
							if(data.dt.status) 
							{
								$("#simpandata05").val("Simpan");
								$("#form_kategori05").resetForm();
								$("#form_kategori05").clearForm();
								jQuery("#list205").trigger("reloadGrid");
								$("#batal05").trigger('click');
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
	 
			url:base_js+'index.php/kategori/crud05',
			type:"post",       
			dataType:"JSON",   
				 
			}); 
	 
			return false; 
		}); 
			
			
		
		$("#batal05").click(function(){
			
			$("#form_kategori05").validationEngine('hideAll');
			$('#simpandata05').val('Simpan');
			$("#h_form05").val("")
			
						
						$('#kategori_id05').val('');
							$('#kategori_nama05').val('');
						
							
							$("select#kategori_aktif05").prop('selectedIndex', 0);
						
			})
			
		})
		
		                        