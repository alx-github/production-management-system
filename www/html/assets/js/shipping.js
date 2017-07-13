
$(document).ready(function() {
	$('#products').multiselect({
		nonSelectedText: '指定なし',
		numberDisplayed: '3',
		nSelectedText: 'が選択された',
		allSelectedText: 'が全部選択された',
	});

	$('#date-start').datepicker({
		dateFormat: 'yy/mm/dd',
	});
	$('#date-end').datepicker({
		dateFormat: 'yy/mm/dd',
		useCurrent: false
	});
	$('#date-start').on('change', function () {
		$('#date-end').datepicker( 'option', 'minDate', $('#date-start').val());
	});
	$('#date-end').on('change', function () {
		$('#date-start').datepicker( 'option', 'maxDate', $('#date-end').val());
	});

});
