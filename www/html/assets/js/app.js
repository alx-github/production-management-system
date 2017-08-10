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

	$('.sort-column').click(function(e){
		var ASC = 'ASC';
		var DESC = 'DESC';
		var column = $(this).data('column');
		var curent_column = $(this).data('curent-column');
		if (column !== curent_column)
		{
			direction = ASC;
		}
		else
		{
			if ($(this).data('curent-direction') !== DESC)
			{
				direction = DESC;
			}
			else
			{
				direction = ASC;
			}
		}
		$('#frm-search input[name=sort_column]').val(column);
		$('#frm-search input[name=sort_direction]').val(direction);
		$('#frm-search').submit();
	});

	// 商品
	$('#js-row-add').click(function (){
		var number = $("#number_product_materials").html();
		$('#last-row').before(create_row(parseInt(number) + 1));
		$("#number_product_materials").html(parseInt(number) + 1);
	});

	$('#js-row-delete').click(function (){
		var number = $("#number_product_materials").html();
		$('#last-row').before(create_row(parseInt(number) + 1));
		$("#number_product_materials").html(parseInt(number) + 1);
	});

	$('.datetime').datepicker({
		dateFormat: 'yy/mm/dd',
		showButtonPanel: true,
		closeText: 'クリア',
		regional: 'ja',
		onClose: function (dateText, inst) {
			if ($(window.event.srcElement).hasClass('ui-datepicker-close'))
			{
				$(this).val('');
			}
		},
	});
	$('#create-pdf-send-email').click(function (e){
		e.preventDefault();
		window.open("/receive/create_pdf_send_mail");
		setTimeout(function(){
			location.replace('/receive/save_confirm');
		}, 3000);
		
		
	});
});

function remove_row(id)
{
	$('#tr-'+id).remove();
}

function select_part_no(id)
{
	var val = $('#' + id).val();
	var row = id.replace('pn', '');
	if (val.length == 0)
	{
		$('#lb-'+id).html('');
		$('#td-'+id).html($('#select-hidden').html());
	}
	else
	{
		$.getJSON('/api/generate_colors/' + val, function(response){
			$('#lb-'+id).html('');
			$('#td-'+id).html(response.color.replace(/ROWINDEX/g, row));
		});
	}
}

function select_color(id)
{
	var val = $('#' + id).val();
	var row = id.replace('co', '');
	if (val.length == 0)
	{
		$('#lb-pn'+row).html('');
	}
	else
	{
		$.getJSON('/api/generate_unit/' + val, function(response){
			$('#lb-pn'+row).html(response.unit);
		});
	}
}

function create_row(num)
{
	var tb = $('#table-hidden tbody');
	var html= tb.html().replace(/ROWINDEX/g, num);
	return html;
}
