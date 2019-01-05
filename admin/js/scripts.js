CKEDITOR.replace( 'editor1', {
	filebrowserBrowseUrl: 'http://localhost/Cms%20Blogger/admin/ckfinder/ckfinder.html',
	filebrowserUploadUrl: 'http://localhost/Cms%20Blogger/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
} );
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
var div_box= "<div id='load-screen'><div id='loading'></div></div>";
$("body").prepend(div_box);
$('#load-screen').delay(700).fadeOut(600, function() {
    $(this).remove();
});

