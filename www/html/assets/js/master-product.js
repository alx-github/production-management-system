
$(document).ready(function() {

	$('#js-row-add').click(function (){
		var number = $("input[name=number]").val();
		$('#last-row').before(create_row(parseInt(number) + 1));
		$("input[name=number]").val(parseInt(number) + 1);
	});

	$('#js-row-delete').click(function (){
		var number = $("input[name=number]").val();
		$('#last-row').before(create_row(parseInt(number) + 1));
		$("input[name=number]").val(parseInt(number) + 1);
	});
});

function remove_row(id)
{
	$('#tr-'+id).remove();
}

function select_part_no(id)
{
	var val = $('#' + id).val();
	if (val == '品番A' || val == '品番C')
	{
		$('#lb-'+id).html('m');
	}
	else if (val == '品番B' || val == '品番D')
	{
		$('#lb-'+id).html('枚');
	}
	else
	{
		$('#lb-'+id).html('');
	}
}

function create_row(num)
{
	return '<tr id="tr-r' + num + '">' +
		'<td>' +
			'<a href="#" class="btn btn-warning js-row-delete"  id="r' + num + '" onclick="remove_row(this.id);">' +
			'<span class="glyphicon glyphicon-remove"></span>' +
			'</a>' +
		'</td>' +
		'<td>' +
			'<select class="form-control" id="pn' + num + '" onchange="select_part_no(this.id);">' +
				'<option>指定なし</option>' +
				'<option>品番A</option>' +
				'<option>品番B</option>' +
				'<option>品番C</option>' +
				'<option>品番D</option>' +
			'</select>' +
		'</td>' +
		'<td>' +
			'<select class="form-control">' +
				'<option>指定なし</option>' +
				'<option>色番A</option>' +
				'<option>色番B</option>' +
				'<option>色番C</option>' +
				'<option>色番D</option>' +
			'</select>' +
		'</td>' +
		'<td>' +
			'<input type="text" class="form-control text-right" id="" placeholder="9999">' +
		'</td>' +
		'<td>' +
			'<label for="" class="control-label" id="lb-pn' + num + '"></label>' +
		'</td>' +
	'</tr>';
}
