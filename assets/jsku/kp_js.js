                        $(document).ready(function () {
		var mygrid42=jQuery("#list242").jqGrid({
					url: base_js+"/index.php/kp/view_grid42", 
					datatype: "json", 
					height: "auto", 
					//postData: { id: '0' },
					mtype: "POST",
					colNames: ['PERUSAHAAN / INVESTASI / STATUS','ALAMAT','NO TLP / FAX','T KERJA','KAPASITAS PRODUKSI'],
					colModel: [
						//{name:'', index:'',width:50,align:'center'},
						{name:'inv',width:120,index:'inv',editable:false},
						{name:'per_alamat',width:180,index:'per_alamat',editable:false},
						{name:'telp',width:80,index:'telp',editable:false},
						{name:'',width:40,index:'',editable:false,align:'right'},
						{name:'',width:200,index:'',editable:false,align:'right'},
						
						
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

		//jQuery("#list242").jqGrid('navButtonAdd',"#pager242",{caption:"Cari",title:"Cari", buttonicon :'ui-icon-search', onClickButton:function(){ mygrid42[0].toggleToolbar() } }); 
		
		//jQuery("#list242").jqGrid('filterToolbar',{
//            stringResult: true,
//            searchOnEnter : true
//        });
//		mygrid42[0].toggleToolbar();
//		jQuery("#list242").setGridParam({onSelectRow:function(id){} 
					//});  
		 function responsive_jqgrid(jqgrid) {
			jqgrid.find('.ui-jqgrid').addClass('clear-margin').css('width', '');
			jqgrid.find('.ui-jqgrid-view').addClass('clear-margin ').css('width', '');
			jqgrid.find('.ui-jqgrid-view > div').eq(1).addClass('clear-margin').css('width', '').css('min-height', '0');
			jqgrid.find('.ui-jqgrid-view > div').eq(2).addClass('clear-margin').css('width', '').css('min-height', '0');
			jqgrid.find('.ui-jqgrid-sdiv').addClass('clear-margin').css('width', '');
			jqgrid.find('.ui-jqgrid-pager').addClass('clear-margin').css('width', '');
	
		}
		
		$('#per_cari').click(function(){
			jQuery("#list242").jqGrid('setGridParam',{url:base_js+"kp/view_grid42?per_seksi_id42="+$('#per_seksi_id42').val()+"&per_kategori_id42="+$('#per_kategori_id42').val()+"&per_np="+$('#per_np').val()+"&per_negara="+$('#per_negara').val()}).trigger("reloadGrid");
			})
			
		})                        