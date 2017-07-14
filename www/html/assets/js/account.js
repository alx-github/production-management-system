$(document).ready(function(){
	var isGettingPassword = false;
	$('#generate-password').click(function(e){
		e.preventDefault();		
		if(!isGettingPassword){
			isGettingPassword = true;
			$.getJSON($(this).data('url'), function(response){
				$('#password').val(response.password);
				isGettsingPassword = false;
			});		
		}
	});
	$('.delete-account').each(function(){
		$(this).click(function(event){
			$('#deleted_id').val(event.target.id);
		});
	});
});