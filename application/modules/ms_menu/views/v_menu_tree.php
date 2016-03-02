
<div id="tree">
</div>

<script type="text/javascript">
	
	$("#tree").dynatree({
				initAjax: {url: "<?php echo base_url() ?>index.php/ms_menu/ms_menu_tree/getTree", 
               	},
				   onActivate: function(node) {
					$('#parent_kode31').val(node.data.kode);
					$('#parent_id31').val(node.data.menu_id);
					$('#kode31').val(node.data.kode+".");
					
				  },
      			});
</script>