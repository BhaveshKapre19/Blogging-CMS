 </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
    <script src="js/scripts.js"></script>

    <script>
		$(document).ready(function() {
			$('#selectAllBoxs').click(function(event) {
			/* Act on the event */
				console.log("Clicked");
				if(this.checked){
					$('.checkbox').each(function() {
					this.checked = true;
					});
				}
				else{
					$('.checkbox').each(function() {
					this.checked = false;
					});
				}
			});
		});
	</script>

</body>

</html>
