                         
		$(document).ready(function () {
		var mygrid19=jQuery("#list219").jqGrid({
					url: base_js+"/index.php/seksi/view_grid19", 
					datatype: "json", 
					height: "200", 
					//postData: { id: '0' },
					mtype: "POST",
					colNames: ['NAMA SEKSI','STATUS'],
					colModel: [
						//{name:'', index:'',width:50,align:'center'},
						{name:'seksi_nama',width:300,index:'seksi_nama',editable:false},
						{name:'aseksi',width:100,index:'aseksi',editable:false},
					],
					
					rowNum: 20,
					rowList: [20,30,50],
					pager: '#pager219',
					sortname: 'seksi_nama',
					viewrecords: true,
					sortorder: "asc",
					autowidth: true,
					multiselect: false, 
					rownumbers: true,
					rownumWidth:40,
					caption: "Seksi ilmta", 
					beforeRequest: function() {
            			responsive_jqgrid($(".jqGrid"));
        			}				
				});
				
				jQuery("#list219").jqGrid('navGrid','#pager219',{view:false,edit:false,add:false,del:false,search:false,refresh:true});	

		jQuery("#list219").jqGrid('navButtonAdd',"#pager219",{caption:"Cari",title:"Cari", buttonicon :'ui-icon-search', onClickButton:function(){ mygrid19[0].toggleToolbar() } }); 
		
		jQuery("#list219").jqGrid('filterToolbar',{
            stringResult: true,
            searchOnEnter : true
        });
		mygrid19[0].toggleToolbar();
		jQuery("#list219").setGridParam({onSelectRow:function(id){
		var data_19=id.split(',');
			$('#simpandata19').val('Ubah');
			
							$("#seksi_nama19").val(jQuery("#list219").jqGrid('getCell',id,'seksi_nama'));
						
										  $("#seksi_aktif19").val(data_19[1]);			
						  
										  $("#seksi_id19").val(data_19[0]);			
						  
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
		
		
			$("#form_seksi19").validationEngine({promptPosition : "topRight", scroll: false});
			
			$("#simpandata19").click(function(){
					$("#h_form19").val($("#simpandata19").val());
					$("#form_seksi19").trigger("submit");
				})
			$("#hpus19").click(function(){
				$("#h_form19").val($("#hpus19").val())
				$("#form_seksi19").trigger("submit");
			});
			
			
			 $("#form_seksi19").submit(function() { 
		  var act=$("#h_form19").val();
		   $(this).ajaxSubmit({
			data:{"act":act},
			beforeSubmit:  function (formData, jqForm, options) { 
							if($("#form_seksi19").validationEngine("validate")){
								var conf = confirm("Yakin Akan "+act+" Data Ini?");
								if(conf) return true; else return false;
								
							}else{
								return false;
							}
						} ,
			success:       function(data)  { 
			
							if(data.dt.status) 
							{
								$("#simpandata19").val("Simpan");
								$("#form_seksi19").resetForm();
								$("#form_seksi19").clearForm();
								jQuery("#list219").trigger("reloadGrid");
								$("#batal19").trigger('click');
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
	 
			url:base_js+'index.php/seksi/crud19',
			type:"post",       
			dataType:"JSON",   
				 
			}); 
	 
			return false; 
		}); 
			
			
		
		$("#batal19").click(function(){
			
			$("#form_seksi19").validationEngine('hideAll');
			$('#simpandata19').val('Simpan');
			$("#h_form19").val("")
			
						
						$('#seksi_id19').val('');
							$('#seksi_nama19').val('');
						
							
							$("select#seksi_aktif19").prop('selectedIndex', 0);
						
			})
			
		})
		
		                        