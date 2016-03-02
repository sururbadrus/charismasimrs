                        $(document).ready(function () {
		
		$("#kblicode").click(function(){
			 
			  $.ajax({
				  		type: "post",
						url:base_js+"/index.php/perusahaan/tree",
						dataType: "html",
						cache: true,
						success: function(hsl) {
							$('#caption_header').html('Struktur KBLI');
							$("#contain_body").html(hsl);
							$(".bs-example-modal-lg").modal("show");
						}
				  })
			})					
		
		var mygrid42=jQuery("#list242").jqGrid({
					url: base_js+"/index.php/perusahaan/view_grid42", 
					datatype: "json", 
					height: "300", 
					//postData: { id: '0' },
					mtype: "POST",
					colNames: ['NAMA PERUSAHAAN','NAMA KOTA','ALAMAT','NOTLP','NO FAX','NAMA DIR','KATEGORI_NAMA','SEKSI_NAMA','PARENT_UTAMA'],
					colModel: [
						//{name:'', index:'',width:50,align:'center'},
						{name:'per_nama',width:170,index:'per_nama',editable:false},
						{name:'kota_nama',width:150,index:'kota_nama',editable:false},
						{name:'per_alamat',width:210,index:'per_alamat',editable:false},
						{name:'per_notlp',width:100,index:'per_notlp',editable:false},
						{name:'per_fax',width:100,index:'per_fax',editable:false},
						{name:'per_dir',width:150,index:'per_dir',editable:false},
						{name:'kategori_nama',width:150,index:'kategori_nama',editable:false},
						{name:'seksi_nama',width:150,index:'seksi_nama',editable:false},
						{name:'per_kode',width:100,index:'per_kode',editable:false},
					],
					
					rowNum: 20,
					rowList: [20,30,50],
					pager: '#pager242',
					sortname: 'per_nama',
					viewrecords: true,
					sortorder: "asc",
					autowidth: true,
					multiselect: false, 
					rownumbers: true,
					rownumWidth:40,
					caption: "List perusahaan", 
					beforeRequest: function() {
            			responsive_jqgrid($(".jqGrid"));
        			}				
				});
				
				jQuery("#list242").jqGrid('navGrid','#pager242',{view:false,edit:false,add:false,del:false,search:false,refresh:true});	

		jQuery("#list242").jqGrid('navButtonAdd',"#pager242",{caption:"Cari",title:"Cari", buttonicon :'ui-icon-search', onClickButton:function(){ mygrid42[0].toggleToolbar() } }); 
		
		jQuery("#list242").jqGrid('filterToolbar',{
            stringResult: true,
            searchOnEnter : true
        });
		mygrid42[0].toggleToolbar();
		jQuery("#list242").setGridParam({onSelectRow:function(id){
		var data_42=id.split(',');
			$('#simpandata42').val('Ubah');
			
							$("#per_nama42").val(jQuery("#list242").jqGrid('getCell',id,'per_nama'));
						
										  $("#per_kota_id42").val(data_42[4]);			
						  
							$("#per_alamat42").val(jQuery("#list242").jqGrid('getCell',id,'per_alamat'));
						
							$("#per_notlp42").val(jQuery("#list242").jqGrid('getCell',id,'per_notlp'));
						
							$("#per_fax42").val(jQuery("#list242").jqGrid('getCell',id,'per_fax'));
						
							$("#per_dir42").val(jQuery("#list242").jqGrid('getCell',id,'per_dir'));
						
										  $("#per_kp42").val(data_42[1]);			
						  
										  $("#per_jkp42").val(data_42[2]);			
						  
										  $("#per_notlp_kp42").val(data_42[3]);			
						  
										  $("#per_kategori_id42").val(data_42[6]);			
						  
										  $("#per_seksi_id42").val(data_42[5]);			
						  
							  $("#per_kode42").val(jQuery("#list242").jqGrid('getCell',id,'per_kode'));
							  
										  $("#per_id42").val(data_42[0]);			
						  
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
		
		
			$("#form_perusahaan42").validationEngine({promptPosition : "topRight", scroll: false});
			
			$("#simpandata42").click(function(){
					$("#h_form42").val($("#simpandata42").val());
					$("#form_perusahaan42").trigger("submit");
				})
			$("#hpus42").click(function(){
				$("#h_form42").val($("#hpus42").val())
				$("#form_perusahaan42").trigger("submit");
			});
			
			
			 $("#form_perusahaan42").submit(function() { 
		  var act=$("#h_form42").val();
		   $(this).ajaxSubmit({
			data:{"act":act},
			beforeSubmit:  function (formData, jqForm, options) { 
							if($("#form_perusahaan42").validationEngine("validate")){
								var conf = confirm("Yakin Akan "+act+" Data Ini?");
								if(conf) return true; else return false;
								
							}else{
								return false;
							}
						} ,
			success:       function(data)  { 
			
							if(data.dt.status) 
							{
								$("#simpandata42").val("Simpan");
								$("#form_perusahaan42").resetForm();
								$("#form_perusahaan42").clearForm();
								jQuery("#list242").trigger("reloadGrid");
								$("#batal42").trigger('click');
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
	 
			url:base_js+'index.php/perusahaan/crud42',
			type:"post",       
			dataType:"JSON",   
				 
			}); 
	 
			return false; 
		}); 
			
			
		
		$("#batal42").click(function(){
			
			$("#form_perusahaan42").validationEngine('hideAll');
			$('#simpandata42').val('Simpan');
			$("#h_form42").val("")
			
						
						$('#per_id42').val('');
							$('#per_nama42').val('');
						
							
							$("select#per_kota_id42").prop('selectedIndex', 0);
						
							$('#per_alamat42').val('');
						
							$('#per_notlp42').val('');
						
							$('#per_fax42').val('');
						
							$('#per_dir42').val('');
						
							$('#per_kp42').val('');
						
							$('#per_jkp42').val('');
						
							$('#per_notlp_kp42').val('');
						
							
							$("select#per_kategori_id42").prop('selectedIndex', 0);
						
							
							$("select#per_seksi_id42").prop('selectedIndex', 0);
						
							$('#per_kode42').val('');
						
			})
			
		})                        