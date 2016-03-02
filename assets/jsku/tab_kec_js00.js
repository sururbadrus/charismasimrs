<script>
			
			 $(document).ready(function () {
				$("#tab_kec00 a").click(function (e) {
					e.preventDefault();
				  	var url = $(this).attr("data-url");
					var href = this.hash;
					var pane = $(this);
					tampil_tab00(href,url,pane);
				})
				
				$("#tab_kec00 a").click(function(e){
					e.preventDefault();
				  	var url = $(this).attr("data-url");
					var href = this.hash;
					var pane = $(this);
					tampil_tab00(href,url,pane);
				});
				


			 })
			 
			  function tampil_tab00(target,url,pane){
				 $.ajax({
					 url:url,
					 success:function(result){
						 $(target).html(result);
						 pane.tab("show");
						 }
					 })
				 
				};
			 		
		</script>