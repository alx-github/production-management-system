<?php echo form_open("/receive/form", ["class" => "form-horizontal", "role" => "form"]); ?>
<h1>受注フォーム</h1>

<input type="hidden" name="id" value="0" />
<input type="hidden" name="number" id="number" value="3">

<div class="form-group">
	<div class="col-sm-7">
		<label class="control-label col-sm-4">取引先</label>
		<div class="col-sm-6">
			<select class="form-control">
				<option>指定なし</option>
				<option selected>瀧本</option>
				<option>A株式会社</option>
				<option>△△</option>
				<option>△△△△</option>
			</select>
		</div>
	</div>
	<div class="col-sm-5">
		<label class="control-label col-sm-6">依頼日</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" id="requested_date" placeholder="2017/12/31">
		</div>
	</div>
</div>

<div class="form-group">
	<div class="col-sm-7">
		<label class="control-label col-sm-4">ステータス</label>
		<div class="col-sm-8 btn-group" data-toggle="buttons">
			<label class="btn btn-default">
				<input type="radio" name="status" id="0">未受注
			</label>
			<label class="btn btn-default">
				<input type="radio" name="status" id="1">受注
			</label>
			<label class="btn btn-default">
				<input type="radio" name="status" id="2">発送済
			</label>
			<label class="btn btn-default">
				<input type="radio" name="status" id="3">請求済
			</label>
		</div>
	</div>
	<div class="col-sm-5">
		<label class="control-label col-sm-6">消費税</label>
		<div class="col-sm-6">
			<div class="input-group">
				<input type="number" class="form-control" id="" placeholder="8">
				<div class="input-group-addon addon-to">%</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-12 scrollable-x">
		<table class="table table-hover table-fixed" id="table">
			<colgroup>
				<col style="width:60px;">
				<col style="width:100px;">
				<col style="width:100px;">
				<col style="width:100px;">
				<col style="width:180px;">
				<col style="width:160px;">
				<col style="width:80px;">
				<col style="width:100px;">
				<col style="width:100px;">
				<col style="width:130px;">
				<col style="width:120px;">
				<col style="width:140px;">
				<col style="width:100px;">
				<col style="width:160px;">
				<col style="width:120px;">
				<col style="width:140px;">
			</colgroup>
			<thead>
				<tr>
					<th>
						<a href="#" id="add_row" class="btn btn-info">
							<span class="glyphicon glyphicon-plus"></span></a>
					</th>
					<th>指図No</th>
					<th>品番</th>
					<th></th>
					<th>品名</th>
					<th>ｱｲﾃﾑ名</th>
					<th>ｻｲｽﾞ</th>
					<th>数量</th>
					<th>実数量</th>
					<th>出荷予定日</th>
					<th>加工費</th>
					<th>請求金額</th>
					<th>運送料</th>
					<th>送り先</th>
					<th>運送便</th>
					<th>メモ</th>
				</tr>
			</thead>
			<tbody>
				<tr id="tr_1">
					<td>
						<a href="#" class="btn btn-warning" onclick="remove_row(1);">
							<span class="glyphicon glyphicon-remove"></span>
						</a>
					</td>
					<td><input type="text" class="form-control" id="" placeholder="59999"></td>
					<td><input type="text" class="form-control" id="" placeholder="C999"></td>
					<td>
						<select class="form-control">
							<option>指定なし</option>
							<option selected>定番</option>
							<option>ｽﾎﾟｯﾄ</option>
						</select>
					</td>
					<td>
						<select class="product_name" id="product_name1">
							<option>指定なし</option>
							<option selected>品名A</option>
							<option>品名B</option>
							<option>品名C</option>
							<option>品名D</option>
							<option>品名E</option>
						</select>
					</td>
					<td><input type="text" class="form-control" id=""></td>
					<td>
						<select class="form-control">
							<option>指定なし</option>
							<option selected>L</option>
							<option>M</option>
							<option>S</option>
							<option>LL</option>
						</select>
					</td>
					<td><input type="number" class="form-control text-right" id="" placeholder="999"></td>
					<td><input type="number" class="form-control text-right" id="" placeholder="999"></td>
					<td><input type="text" class="form-control  text-center estimated_shipping_date" placeholder="2017/12/31"></td>
					<td><input type="number" class="form-control text-right" id="" placeholder="999"></td>
					<td><input type="number" class="form-control text-right" id="" placeholder="999"></td>
					<td>
						<select class="form-control">
							<option>指定なし</option>
							<option selected>請求</option>
							<option>負担</option>
						</select>
					</td>
					<td><input type="text" class="form-control" id=""></td>
					<td><input type="text" class="form-control" id=""></td>
					<td><input type="text" class="form-control" id=""></td>
				</tr>
				<tr id="tr_2">
					<td>
						<a href="#" class="btn btn-warning" onclick="remove_row(2);">
							<span class="glyphicon glyphicon-remove"></span>
						</a>
					</td>
					<td><input type="text" class="form-control" id="" placeholder="59999"></td>
					<td><input type="text" class="form-control" id="" placeholder="C999"></td>
					<td>
						<select class="form-control">
							<option>指定なし</option>
							<option selected>定番</option>
							<option>ｽﾎﾟｯﾄ</option>
						</select>
					</td>
					<td>
						<select class="product_name" id="product_name2">
							<option>指定なし</option>
							<option>品名A</option>
							<option selected>品名B</option>
							<option>品名C</option>
							<option>品名D</option>
							<option>品名E</option>
						</select>
					</td>
					<td><input type="text" class="form-control" id="" placeholder="体操服"></td>
					<td>
						<select class="form-control">
							<option>指定なし</option>
							<option>L</option>
							<option selected>M</option>
							<option>S</option>
							<option>LL</option>
						</select>
					</td>
					<td><input type="number" class="form-control text-right" id="" placeholder="999"></td>
					<td><input type="number" class="form-control text-right" id="" placeholder="999"></td>
					<td><input type="text" class="form-control  text-center estimated_shipping_date" placeholder="2017/12/31"></td>
					<td><input type="number" class="form-control text-right" id="" placeholder="999"></td>
					<td><input type="number" class="form-control text-right" id="" placeholder="999"></td>
					<td>
						<select class="form-control">
							<option>指定なし</option>
							<option>請求</option>
							<option selected>負担</option>
						</select>
					</td>
					<td><input type="text" class="form-control" id=""></td>
					<td><input type="text" class="form-control" id=""></td>
					<td><input type="text" class="form-control" id=""></td>
				</tr>
				<tr id="tr_3">
					<td>
						<a href="#" class="btn btn-warning" onclick="remove_row(3);">
							<span class="glyphicon glyphicon-remove"></span>
						</a>
					</td>
					<td><input type="text" class="form-control" id="" placeholder="59999"></td>
					<td><input type="text" class="form-control" id="" placeholder="C999"></td>
					<td>
						<select class="form-control">
							<option>指定なし</option>
							<option>定番</option>
							<option selected>ｽﾎﾟｯﾄ</option>
						</select>
					</td>
					<td>
						<select class="product_name" id="product_name3">
							<option>指定なし</option>
							<option>品名A</option>
							<option>品名B</option>
							<option selected>品名C</option>
							<option>品名D</option>
							<option>品名E</option>
						</select>
					</td>
					<td><input type="text" class="form-control" id=""></td>
					<td>
						<select class="form-control">
							<option>指定なし</option>
							<option>L</option>
							<option selected>M</option>
							<option>S</option>
							<option>LL</option>
						</select>
					</td>
					<td><input type="number" class="form-control text-right" id="" placeholder="999"></td>
					<td><input type="number" class="form-control text-right" id="" placeholder="999"></td>
					<td><input type="text" class="form-control  text-center estimated_shipping_date" placeholder="2017/12/31"></td>
					<td><input type="number" class="form-control text-right" id="" placeholder="999"></td>
					<td><input type="number" class="form-control text-right" id="" placeholder="999"></td>
					<td>
						<select class="form-control">
							<option>指定なし</option>
							<option selected>請求</option>
							<option>負担</option>
						</select>
					</td>
					<td><input type="text" class="form-control" id=""></td>
					<td><input type="text" class="form-control" id=""></td>
					<td><input type="text" class="form-control" id=""></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<div class="form-group">
	<div class="col-sm-offset-2 col-md-offset-2">
		<div class="col-sm-3 col-md-3">
			<a href="/receive" class="btn btn-default btn-block">戻る</a>
		</div>
		<div class="col-sm-3 col-md-3">
			<a href="/receive/save_confirm" class="btn btn-success btn-block">保存し在庫確認</a>
		</div>
		<div class="col-sm-3 col-md-3">
			<a href="/receive/save" class="btn btn-success btn-block">保存する</a>
		</div>
	</div>
</div>
<?php echo form_close(); ?>


<script type="text/javascript">
	$(document).ready(function () {
		$('#requested_date').datepicker({
			dateFormat: 'yy/mm/dd',
		});
		$('.estimated_shipping_date').datepicker({
			dateFormat: 'yy/mm/dd',
		});

		$('#add_row').click(function () {
			var number = $("input[name=number]").val();
			number = parseInt(number) + 1;
			var html = create_row(number);
			$('tbody').append(html);
			$("input[name=number]").val(number);

			$('.estimated_shipping_date').datepicker({
				dateFormat: 'yy/mm/dd',
			});
			$(".product_name").select2();
		});

		// 品名
		$(".product_name").select2();
	});

	function create_row(index)
	{
		return '<tr id="tr_' + index + '">' +
				'    <td>' +
				'	 	<a href="#" class="btn btn-warning pull-right" onclick="remove_row(' + index + ');">' +
				'			<span class="glyphicon glyphicon-remove"></span>' +
				'		</a>' +
				'	 </td>' +
				'    <td><input type="text" class="form-control" id="" placeholder="59999"></td>' +
				'    <td><input type="text" class="form-control" id="" placeholder="C999"></td>' +
				'    <td>' +
				'    	<select class="form-control">' +
				'			<option>指定なし</option>' +
				'			<option selected>定番</option>' +
				'			<option>ｽﾎﾟｯﾄ</option>' +
				'		</select>' +
				'	</td>' +
				'   <td>' +
				'    	<select class="product_name" id="product_name' + index + '">' +
				'			<option>指定なし</option>' +
				'			<option>品名A</option>' +
				'			<option selected>品名B</option>' +
				'			<option>品名C</option>' +
				'			<option>品名D</option>' +
				'			<option>品名E</option>' +
				'		</select>' +
				'   </td>' +
				'   <td><input type="text" class="form-control" id=""></td>' +
				'   <td>' +
				'    	<select class="form-control">' +
				'			<option>指定なし</option>' +
				'			<option selected>L</option>' +
				'			<option>M</option>' +
				'			<option>S</option>' +
				'			<option>LL</option>' +
				'		</select>' +
				'	</td>' +
				'   <td><input type="number" class="form-control" id="" placeholder="999"></td>' +
				'   <td><input type="number" class="form-control" id="" placeholder="999"></td>' +
				'   <td><input type="text" class="form-control estimated_shipping_date" id="estimated_shipping_date_' + index + '" placeholder="2017/12/31"></td>' +
				'   <td><input type="number" class="form-control" id="" placeholder="999"></td>' +
				'   <td><input type="number" class="form-control" id="" placeholder="999"></td>' +
				'   <td>' +
				'    	<select class="form-control">' +
				'			<option>指定なし</option>' +
				'			<option selected>請求</option>' +
				'			<option>負担</option>' +
				'		</select>' +
				'	</td>' +
				'	<td><input type="text" class="form-control" id=""></td>' +
				'	<td><input type="text" class="form-control" id=""></td>' +
				'	<td><input type="text" class="form-control" id=""></td>' +
				'</tr>';
	};

	function remove_row(id)
	{
		$('#tr_' + id).remove();
	};

</script>
<link href="<?= site_url('assets/css/common.css'); ?>" rel="stylesheet">
