	<div class="row">
		<div class="col-lg-12">
			<h1>商品登録・編集</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<br/>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<form class="form-horizontal">
			<div class="form-group">
				<label for="" class="col-sm-offset-2 col-sm-2 control-label">取引先名</label>
				<div class="col-sm-3">
				<select class="form-control">
					<option>指定なし</option>
					<option selected>瀧本</option>
					<option>A株式会社</option>
					<option>△△</option>
					<option>△△△△</option>
				</select>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-offset-2 col-sm-2 control-label">商品カテゴリ</label>
				<div class="col-sm-3">
				<select class="form-control">
					<option>指定なし</option>
					<option selected>ユニフォーム</option>
					<option>ユニフォーム2</option>
					<option>△△</option>
					<option>△△△△</option>
				</select>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-offset-2 col-sm-2 control-label">商品名</label>
				<div class="col-sm-5">
				<input type="text" class="form-control" id="" value="">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-offset-2 col-sm-2 control-label">品番</label>
				<div class="col-sm-5">
				<input type="text" class="form-control" id="" value="">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-offset-2 col-sm-2 control-label">表示区分</label>
				<div class="col-sm-8 btn-group" data-toggle="buttons">
					<label class="btn btn-default">
						<input type="radio" name="options" id="option1" autocomplete="off">表示しない
					</label>
					<label class="btn btn-default">
						<input type="radio" name="options" id="option2" autocomplete="off">表示する
					</label>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-offset-2 col-sm-2 control-label">単位</label>
				<div class="col-sm-1">
				<select class="form-control">
					<option>-----</option>
					<option selected>枚</option>
					<option>m</option>
				</select>
				</div>
				<label for="" class="col-sm-offset-1 col-sm-1 control-label">加工賃</label>
				<div class="col-sm-1">
				<input type="text" class="form-control text-right" id="" placeholder="9999">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-offset-2 col-sm-2 control-label">在庫ひも付け</label>
				<div class="col-sm-6">
					<table class="table borderless">
						<input type="hidden" name="number" value="2">
						<thead>
						<tr>
							<th class="col-sm-1"></th>
							<th>品番</th>
							<th>色番</th>
							<th class="col-sm-2">要尺</th>
							<th class="col-sm-1">単位</th>
						</tr>
						</thead>
						<tbody>
						<tr id="tr-r1">
							<td>
								<a href="#" class="btn btn-warning js-row-delete"  id="r1" onclick="remove_row(this.id);">
								<span class="glyphicon glyphicon-remove"></span>
								</a>
							</td>
							<td>
								<select class="form-control" id="pn1" onchange="select_part_no(this.id);">
									<option>指定なし</option>
									<option selected>品番A</option>
									<option>品番B</option>
									<option>品番C</option>
									<option>品番D</option>
								</select>
							</td>
							<td>
								<select class="form-control">
									<option>指定なし</option>
									<option selected>色番A</option>
									<option>色番B</option>
									<option>色番C</option>
									<option>色番D</option>
								</select>
							</td>
							<td>
								<input type="text" class="form-control text-right" id="" placeholder="9999">
							</td>
							<td>
								<label for="" class="control-label" id="lb-pn1">m</label>
							</td>
						</tr>
						<tr id="tr-r2">
							<td>
								<a href="#" class="btn btn-warning js-row-delete" id="r2" onclick="remove_row(this.id);">
								<span class="glyphicon glyphicon-remove"></span>
								</a>
							</td>
							<td>
								<select class="form-control" id="pn2" onchange="select_part_no(this.id);">
									<option>指定なし</option>
									<option>品番A</option>
									<option selected>品番B</option>
									<option>品番C</option>
									<option>品番D</option>
								</select>
							</td>
							<td>
								<select class="form-control">
									<option>指定なし</option>
									<option>色番A</option>
									<option>色番B</option>
									<option selected>色番C</option>
									<option>色番D</option>
								</select>
							</td>
							<td>
								<input type="text" class="form-control text-right" id="" placeholder="9999">
							</td>
							<td>
								<label for="" class="control-label" id="lb-pn2">枚</label>
							</td>
						</tr>
						<tr id="last-row">
							<td></td>
							<td></td>
							<td></td>
							<td>
								<a href="#" class="btn btn-info form-control" id="js-row-add">
								<span class="glyphicon glyphicon-plus"></span>
								</a>
							</td>
							<td></td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-2">
				<a href="<?= site_url('master/product'); ?>" class="btn btn-default form-control">戻る</a>
				</div>
				<div class="col-sm-offset-1 col-sm-2">
				<a href="<?= site_url('master/product'); ?>" class="btn btn-success form-control">保存する</a>
				</div>
			</div>
			</form>
		</div>
	</div>
<script src="<?= site_url('assets/js/master-product.js'); ?>"></script>
<link href="<?= site_url('assets/css/master-product.css'); ?>" rel="stylesheet">
