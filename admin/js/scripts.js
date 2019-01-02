$(document).ready(function() {
	ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
});
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
