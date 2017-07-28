<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<h1>請求管理（取引先・商品ごとの出荷一覧）</h1>
			<form class="form-horizontal">
			<div class="form-group">
				<label for="" class="col-sm-1 control-label">取引先</label>
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
				<label for="" class="col-sm-1 control-label">商品</label>
				<div class="col-sm-3">
					<select class="form-control" id="products" multiple="multiple">
						<option selected>商品名A</option>
						<option selected>商品名B</option>
						<option selected>商品名C</option>
						<option>商品名D</option>
						<option>商品名E</option>
					</select>
				</div>
				<div class="col-sm-offset-1 col-sm-4">
				<div class="input-group">
					<div class="input-group-addon">出荷日:</div>
					<input type="text" class="form-control date" id="date-start" size="10">
					<div class="input-group-addon addon-to">～</div>
					<input type="text" class="form-control date" id="date-end" size="10">
				</div>
				</div>
				<div class="col-sm-1">
					<button type="submit" class="btn btn-primary">検索</button>
				</div>
			</div>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<br/>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<table class="table table-hover ">
				<thead>
				<tr>
					<th>出荷日付</th>
					<th>商品A</th>
					<th>商品B</th>
					<th>商品C</th>
					<th>金額</th>
				</tr>
				</thead>
				<tbody>
				<tr data-toggle="modal" data-target="#myModal">
					<td>2017/04/01</td>
					<td class="text-right"></td>
					<td class="text-right warning">50(未)</td>
					<td class="text-right warning">50(未)</td>
					<td class="text-right">100,000</td>
				</tr>
				<tr data-toggle="modal" data-target="#myModal">
					<td>2017/04/02</td>
					<td class="text-right">200</td>
					<td class="text-right"></td>
					<td class="text-right">100</td>
					<td class="text-right">250,000</td>
				</tr>
				<tr>
				</tr>
				<tr>
					<td><strong>合計</strong></td>
					<td class="text-right">200</td>
					<td class="text-right">50</td>
					<td class="text-right">150</td>
					<td class="text-right">350,000</td>
				</tr>
				</tbody>
			</table>
		</div>
  	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">出荷状況</h4>
      </div>
      <div class="modal-body">
        <div class="row">
			<div class="col-sm-6">
				<div class="form-group">
				<label for="" class="col-sm-6 control-label">指図No</label>
				<span class="col-sm-6">99999</span>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
				<label for="" class="col-sm-6 control-label">品番</label>
				<span class="col-sm-6">99999</span>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="form-group">
				<label for="" class="col-sm-3 control-label">サイズ</label>
				<span class="col-sm-3">M</span>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
				<label for="" class="col-sm-6 control-label">指図数</label>
				<span class="col-sm-6">100</span>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
				<label for="" class="col-sm-6 control-label">実裁断数</label>
				<span class="col-sm-6">95</span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<table class="table table-hover ">
					<thead>
					<tr>
						<th>品番・色番</th>
						<th>概算使用量</th>
						<th>実使用量</th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td>品番・色番を表示</td>
						<td class="text-right">200</td>
						<td class="text-right">190</td>
					</tr>
					<tr>
						<td>品番・色番を表示</td>
						<td class="text-right">150</td>
						<td class="text-right">140</td>
					</tr>
					<tr>
						<td>品番・色番を表示</td>
						<td class="text-right">150</td>
						<td class="text-right">140</td>
					</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<label for="" class="control-label">請求状況</label>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-default">
							<input type="radio" name="options1" id="option11" autocomplete="off">未
						</label>
						<label class="btn btn-info active">
							<input type="radio" name="options1" id="option21" autocomplete="off">済み
						</label>
					</div>
				</div>
			</div>
		</div>
	 </div>
	 <div class="modal-footer">
		<div class="col-sm-offset-1 col-sm-3">
        	<button type="button" class="btn btn-default btn-block" data-dismiss="modal">閉じる</button>
		</div>
		<form method="post" action="<?= site_url('stock') ?>">
			<input type="hidden" name="id" value="">
			<div class="col-sm-offset-1 col-sm-3">
				<button type="submit" class="btn btn-success btn-block">保存</button>
			</div>
			<div class="col-sm-offset-1 col-sm-3">
				<button type="submit" class="btn btn-info btn-block">編集</button>
			</div>
		</form>
      </div>
    </div>
  </div>
</div>

<script src="<?= site_url('assets/js/shipping.js'); ?>"></script>
<script src="<?= site_url('assets/js/bootstrap-multiselect.js'); ?>"></script>
<link href="<?= site_url('assets/css/shipping.css'); ?>" rel="stylesheet">
<link href="<?= site_url('assets/css/bootstrap-multiselect.css'); ?>" rel="stylesheet">
