                        $(document).ready(function () {
		var mygrid42=jQuery("#list242").jqGrid({
					url: base_js+"/index.php/kproduksi/view_grid42", 
					datatype: "json", 
					height: "470", 
					//postData: { id: '0' },
					mtype: "POST",
					colNames: ['NAMA PERUSAHAAN','PIMPINAN','ALAMAT','NOTLP','NO FAX','DETIL'],
					colModel: [
						//{name:'', index:'',width:50,align:'center'},
						{name:'per_nama',width:170,index:'per_nama',editable:false},
						{name:'per_dir',width:150,index:'per_dir',editable:false},
						{name:'per_alamat',width:210,index:'per_alamat',editable:false},
						{name:'per_notlp',width:100,index:'per_notlp',editable:false},
						{name:'per_fax',width:100,index:'per_fax',editable:false},
						{name:'',width:47,index:'',editable:false,align:"center"},
						
						
					],
					
					rowNum: 10,
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
		jQuery("#list242").setGridParam({onSelectRow:function(id){} 
					});  
		 function responsive_jqgrid(jqgrid) {
			jqgrid.find('.ui-jqgrid').addClass('clear-margin').css('width', '');
			jqgrid.find('.ui-jqgrid-view').addClass('clear-margin ').css('width', '');
			jqgrid.find('.ui-jqgrid-view > div').eq(1).addClass('clear-margin').css('width', '').css('min-height', '0');
			jqgrid.find('.ui-jqgrid-view > div').eq(2).addClass('clear-margin').css('width', '').css('min-height', '0');
			jqgrid.find('.ui-jqgrid-sdiv').addClass('clear-margin').css('width', '');
			jqgrid.find('.ui-jqgrid-pager').addClass('clear-margin').css('width', '');
	
		}
		
			
		})                        