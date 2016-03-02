
<div class="row">




            <div class="row">
              
                  
                        
                     <h4 class="col-xs-12 col-sm-10 col-md-10 col-lg-10 "><u>Master Group Akses</u></h4>
                    
                    
                        
               
                   
			</div>

					<div class="row">						      
					 
					 <div class="col-xs-8 col-sm-4 col-md-3 col-lg-3">  
					 
                                    <label>Group</label>
                                    <div class="field">
<?=form_dropdown('fk_ms_group_id03',$fk_ms_group_id03,'','id="fk_ms_group_id03"  class="form-control"')?>
										

 
                                    </div>
                             </div> 
                             </div>

				<div class="row">						      
					 
					 <div class="col-xs-8 col-sm-3 col-md-4 col-lg-4">  
					 
                                    <label>Tree Menu</label>
                                    <div class="field">

										
										<div id="tree03">
											
										</div>

 
                                    </div>
                             </div> 
                             </div>

                             </div>  
<script type="text/javascript">
 $(document).ready(function () {
$("#fk_ms_group_id03").change(function(){
	 $.ajax({
					url: "<?php echo base_url() ?>index.php/ms_group_akses/getTree",
					 data: {
                      fk_ms_group_id : $("#fk_ms_group_id03").val()
                      }, 
					type : 'POST',
					dataType :'json',
					beforeSend:function(){                
					},
					success : function(data){
						$("#tree03").dynatree({children:data});
						$("#tree03").dynatree("getTree").reload();
					 }
					});
});

	
	$("#tree03").dynatree({
					 initAjax: {url: "<?php echo base_url() ?>index.php/ms_group_akses/getTree", 
               data: {
                      fk_ms_group_id : $("#fk_ms_group_id03").val()
                      }
               },
               checkbox : true,
				onSelect: function(select, node) {
               	if($("#fk_ms_group_id03").val()==''){
               		alert("Pilih Group terlebih dahulu");
               		 return false;

               	}else{
               	 	$.ajax({
						url : "<?=base_url()?>index.php/ms_group_akses/crud",
						data : {
							action : (select)?'Simpan':'Hapus',
							fk_ms_group_id : $('#fk_ms_group_id03').val(),
							fk_ms_menu_id : node.data.id,
						},
						type : 'POST',
						dataType :'JSON',
						beforeSend:function(){             
						},
						success : function(data){
								alert(data.ket);
							
						 }
					});
               	 }

               }
      			});
 })
</script>