$(document).ready(function() {
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

	//取引先一覧
	$('#delete-modal').on('show.bs.modal', function(e) {
		var delete_id = $(e.relatedTarget).data('delete-id');
		$(e.currentTarget).find('input[name="id"]').val(delete_id);
	});
});
