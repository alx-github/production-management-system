$(document).ready(function() {
	$('.delete-account').each(function(){
		$(this).click(function(event){
			$('#deleted_id').val(event.target.id);
		});
	});
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

	// 取引先一覧
	$('#delete-modal').on('show.bs.modal', function(e) {
	    var delete_id = $(e.relatedTarget).data('delete-id');
	    $(e.currentTarget).find('input[name="delete_id"]').val(delete_id);
	});

	$('.delete-material').each(function(){
		$(this).click(function(event){
			$('#deleted_id').val(event.target.id);
		});
	});
});
