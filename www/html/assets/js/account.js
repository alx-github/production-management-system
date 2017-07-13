$(document).ready(function(){
	var isGettingPassword = false;
	$('#generate-password').click(function(e){
		e.preventDefault();		
		if(!isGettingPassword){
			isGettingPassword = true;
			$.getJSON($(this).data('url'), function(response){
				$('#password').val(response.password);
				isGettingPassword = false;
			});		
		}
	});
});