<div class="row">
 
	
      <div class="col-xs-12 col-md-12 col-lg-12">
             
             <div class="row">
             	<div class="col-md-12">
                	<h3><u>Generator CodeIgniter</u></h3>
                </div>
             </div>	
           
               		<form id="form_ms_menu31" name="form_ms_menu31" class="form-group" >
               <input id="idnegara"  name="idnegara" value="" type="hidden" />
               
                <div class="row">
           			 <div class="col-lg-3">
                          <label for="nama_perusahaan">Nama Controller</label>
                          <div class="field">
                              <input name="controller" id="controller" type="text" class="form-control validate[required]"  placeholder="Nama Controller" value="" />
                           	<span class="help-block"></span>
                           </div>
                      </div>
                 
               </div> 
               
               <div class="row">
           			 <div class="col-lg-12">
                          <label for="fullquery">Full Query</label>
                          <div class="field">
                              <textarea name="fullquery" id="fullquery" class="form-control validate[required]"  placeholder="Full Query" value="" /></textarea>
                           	<span class="help-block"></span>
                           </div>
                      </div>
                 
               </div> 
                         
                         
                <div class="row">
             	<div class="col-md-12">
                	<h3><u>Form Builder</u></h3>
                </div>
             </div>	         
                                  
                <div class="row">
                     
                      
                      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" >
                          <input  type="button" id="tambah" class="btn btn-info" value="+">&nbsp;&nbsp;
                
                 <input  type="button" name="hapus_data" id="hapus_data" class="btn btn-danger" value="-">&nbsp;&nbsp;
                 
                          
                     </div>     
                                   
             	</div>
            
            <div class="row">
                  
                     
                          <div class="col-sm-12">
                              <table id="kdata" class="table cell-border table-striped table-bordered dataTable table-hover" >
                  
                    <thead>
                     <tr>
                     
                      <th class="col-md-2" >Tipe Field</th>
                      <th  class="col-md-2" >Label</th>
                      <th  class="col-md-2" >ID Field</th>
                      <th  class="col-md-3" >Query If Used</th>
                      <th  class="col-md-3" >Validasi</th>
                     
                      
                     </tr>
                      </thead>
                      
                  
                  </table>
                  
                  
                        
                       </div>
                    
                    
                    
                 </div>
                 
                 
                 
                  <div class="row">
                     
                     
                      <div class="col-lg-2" style="padding-top:2.2%">
                          <input  type="button" id="ctambah" class="btn btn-info" value="+">&nbsp;&nbsp;
                
                 <input  type="button" name="chapus_data" id="chapus_data" class="btn btn-danger" value="-">&nbsp;&nbsp;
                 		</div>  
                 
                 		 <div class="col-lg-3">
                          <label for="nama_perusahaan">Procces Crud</label>
                          <div class="field">
                              <select name="crud" id="crud" type="text" class="form-control validate[required]"  >
                              	<option value="ins">Insert</option>
                                <option value="upd">Update</option>
                                <option value="del">Delete</option>
                              </select>
                           	<span class="help-block"></span>
                           </div>
                      </div>
                 
                          
                          
                        
                                   
             	</div>
            
            <div class="row">
                  
                          <div class="col-sm-12">
                              <table id="ckdata" class="table cell-border table-striped table-bordered dataTable table-hover" >
                  
                    <thead>
                     <tr>
                     
                      <th class="col-md-2" >Table</th>
                      <th  class="col-md-2" >Procces</th>
                      <th  class="col-md-6" >Field</th>
                      <th  class="col-md-2" >ID</th>
                      
                     
                      
                     </tr>
                      </thead>
                      
                  
                  </table>
                  
                  
                    </div>
                    
                    
                 </div>
           
             </form>  
             
             
      </div>   
                
    
            
               
    
 		
</div>
 
            
            
             
             
             
            
            <script>
			
			 $(document).ready(function () {
			var hapus='';
			
			
				
	 dataTable = $('#kdata').DataTable( {
					"dom":'<"top">rt<"bottom"p><"clear">',
					"processing": false,
					"autoWidth": false,
					"select": {
						style: 'single'
					},
					"serverSide": false,
					
					
					
					
				} );
			
		var counter = 1;
			
		$('#tambah').on( 'click', function () {
        dataTable.row.add( [
            '<select class="form-control validate[required] " style="width:100%" id="typefield[]" name="typefield[]"><option value="txt">Text Field</option><option value="dd">Drop down</option><option value="ac">Auto Complite</option><option value="dp">Date Picker</option><option value="ta">Text Area</option><option value="hf">Hiden Fileld</option></select>',
            '<input type="text" value="" placeholder="Label / Caption" style="width:100%"  class="form-control opsional" id="caption[]" name="caption[]">',
			'<input type="text" value="" placeholder="Id Field" style="width:100%"  class="form-control validate[required]" id="idfield[]" name="idfield[]">',
            '<textarea value="" placeholder="Query" style="width:100%"  class="form-control opsional" id="query[]" name="query[]"></textarea>',
            '<select class="form-control validate[required]" style="width:100%"  id="validasi[]" name="validasi[]"><option value="no">None</option><option value="rq">Required</option></select>',
           
        ] ).draw( false );
 			counter++;
			 } );
		
		
		
		
		 $('#kdata tbody').on( 'click', 'tr', function () {
			if ( $(this).hasClass('danger') ) {
				$(this).removeClass('danger');
			}
			else {
				dataTable.$('tr.danger').removeClass('danger');
				$(this).addClass('danger');
			}
		} );
	 
		$('#hapus_data').click( function () {
			dataTable.row('.danger').remove().draw( false );
		} );
		
		
		
		cdataTable = $('#ckdata').DataTable( {
					"dom":'<"top">rt<"bottom"p><"clear">',
					"processing": false,
					"autoWidth": false,
					
					"select": {
						style: 'single'
					},
					"serverSide": false,
					
					
					
					
				} );
			
		
		
		$('#ctambah').on( 'click', function () {
		
		var data_f1= '';
        var data_f2= '';
		var data_f3= '';
        var data_f4= '';
       
		
		if ($('#crud').val()=='ins'){
		data_f1= '<input type="text" value="" placeholder="Nama Tabel" style="width:100%"  class="form-control [required]" id="namatabel[]" name="namatabel[]">';
        data_f2= '<select placeholder="Procces" style="width:100%"  class="form-control opsional" id="proccess[]" name="proccess[]"><option value="ins">Insert<option></select>';
		data_f3= '<input type="text" value="" placeholder="Nama Field" style="width:100%"  class="form-control validate[required]" id="namafield[]" name="namafield[]">';
        data_f4= '';
        }else if($('#crud').val()=='upt'){
		data_f1= '<input type="text" value="" placeholder="Nama Tabel" style="width:100%"  class="form-control [required]" id="namatabel[]" name="namatabel[]">';
        data_f2= '<select placeholder="Procces" style="width:100%"  class="form-control opsional" id="proccess[]" name="proccess[]"><option value="upt">Update<option></select>';
		data_f3= '<input type="text" value="" placeholder="Nama Field" style="width:100%"  class="form-control validate[required]" id="namafield[]" name="namafield[]">';
        data_f4= '<input value="" placeholder="id primery" style="width:100%"  class="form-control opsional" id="id_primer[]" name="id_primer[]"/>';
        	}
		else{
		data_f1= '<input type="text" value="" placeholder="Nama Tabel" style="width:100%"  class="form-control [required]" id="namatabel[]" name="namatabel[]">';
        data_f2= '<select placeholder="Procces" style="width:100%"  class="form-control opsional" id="proccess[]" name="proccess[]"><option value="del">Hapus<option></select>';
		data_f3= '<input type="text" value="" placeholder="Nama Field" style="width:100%"  class="form-control validate[required]" id="namafield[]" name="namafield[]">';
        data_f4= '<input value="" placeholder="id primery" style="width:100%"  class="form-control opsional" id="id_primer[]" name="id_primer[]"/>';
        	
			}	
			
			
        cdataTable.row.add( [
            data_f1,data_f2,data_f3,data_f4
        ] ).draw( false );
 			counter++;
			 } );
		
		
		
		
		 $('#ckdata tbody').on( 'click', 'tr', function () {
			if ( $(this).hasClass('danger') ) {
				$(this).removeClass('danger');
			}
			else {
				cdataTable.$('tr.danger').removeClass('danger');
				$(this).addClass('danger');
			}
		} );
	 
		$('#chapus_data').click( function () {
			cdataTable.row('.danger').remove().draw( false );
		} );
		
		
		
		
		
		
		
		
		
		
		
		 })
		
		
			 		
			</script>
          