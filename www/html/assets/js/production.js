
$(document).ready(function() {
	$('.btn').click(function() {
		$('#frm-filter').submit();
	});

	$('.datetime').datepicker({
		dateFormat: 'yy/mm/dd'
	});

	$('input').change(function (){
		$('#frm-filter').submit();
	});
});
