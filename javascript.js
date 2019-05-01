$(document).ready(function() {  
	$('#submit').click(function() {   		
		var image_name = $('#image').val();	
		if(image_name == '') {
			alert("Please select image");			
			return false;
		}
		else {
			var extension = $('#image').val().split('.').pop().toLowerCase();
			if(jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
				alert('Invalid Image type');
				$('#image').val('');
				return false;
			}
		}  			
	)};
});
