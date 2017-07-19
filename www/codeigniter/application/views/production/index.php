<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<h1>生産管理</h1>
			<ul class="list-inline group-toggle">
				<li class="list-inline-item">
					<h3>表示対象</h3>
				</li>
				<li class="list-inline-item"><button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">未裁断</button></li>
				<li class="list-inline-item"><button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">中断中</button></li>
				<li class="list-inline-item"><button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">未縫製</button></li>
				<li class="list-inline-item"><button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">未出荷</button></li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<br/>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<form method="post">
			<table class="table table-hover ">
				<thead>
				<tr>
					<th>取引先</th>
					<th>商品名</th>
					<th>アイテム名</th>
					<th>指図</th>
					<th>品番</th>
					<th>数量</th>
					<th>依頼日</th>
					<th>人荷</th>
					<th>裁断</th>
					<th>中断</th>
					<th>縫製</th>
					<th>出荷</th>
					<th>出荷予定日</th>
					<th>備考</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td>瀧本</td>
					<td>商品名A</td>
					<td>体操服</td>
					<td>53214</td>
					<td>L3344</td>
					<td class="text-right">100</td>
					<td>2017/07/01</td>
					<td><button type="submit" class="btn btn-default btn-block">未</button></td>
					<td><button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#cutting-model">未</button></td>
					<td><button type="submit" class="btn btn-default btn-block">-</button></td>
					<td><button type="submit" class="btn btn-default btn-block">未</button></td>
					<td><button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#shipment-not-yet-model">未</button></td>
					<td><input type="text" class="form-control datetime" size="10" value=""/></td>
					<td><input type="text" class="form-control" value=""/></td>
				</tr>
				<tr>
					<td>瀧本</td>
					<td>商品名B</td>
					<td>〇〇高校</td>
					<td>53255</td>
					<td>S9999</td>
					<td class="text-right">258</td>
					<td>2017/07/01</td>
					<td><button type="submit" class="btn btn-info btn-block">済み</button></td>
					<td><button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#cutting-model">済み</button></td>
					<td><button type="submit" class="btn btn-default btn-block">-</button></td>
					<td><button type="submit" class="btn btn-default btn-block">未</button></td>
					<td><button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#shipment-not-yet-model">未</button></td>
					<td><input type="text" class="form-control datetime" size="10" value=""/></td>
					<td><input type="text" class="form-control" value=""/></td>
				</tr>
				<tr>
					<td>A株式会社</td>
					<td>商品名C</td>
					<td>制限</td>
					<td>C-1111</td>
					<td>99</td>
					<td class="text-right">50</td>
					<td>2017/06/30</td>
					<td><button type="submit" class="btn btn-info btn-block">済み</button></td>
					<td><button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#cutting-model">済み</button></td>
					<td><button type="submit" class="btn btn-default btn-block">-</button></td>
					<td><button type="submit" class="btn btn-info btn-block">済み</button></td>
					<td><button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#shipment-not-yet-model">未</button></td>
					<td><input type="text" class="form-control datetime" size="10" value="2017/07/10"/></td>
					<td><input type="text" class="form-control" value=""/></td>
				</tr>
				<tr>
					<td>A株式会社</td>
					<td>商品名D</td>
					<td>ユニフォーム</td>
					<td>C-1112</td>
					<td>98</td>
					<td class="text-right">50</td>
					<td>2017/06/30</td>
					<td><button type="submit" class="btn btn-info btn-block">済み</button></td>
					<td><button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#cutting-model">済み</button></td>
					<td><button type="submit" class="btn btn-default btn-block">-</button></td>
					<td><button type="submit" class="btn btn-info btn-block">済み</button></td>
					<td><button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#shipment-already-model">済み</button></td>
					<td><input type="text" class="form-control datetime" size="10" value=""/></td>
					<td><input type="text" class="form-control" value=""/></td>
				</tr>
				<tr>
					<td>△△</td>
					<td>商品名E</td>
					<td>Tシャツ</td>
					<td>D-1111</td>
					<td>C333</td>
					<td class="text-right">1000</td>
					<td>2017/06/01</td>
					<td><button type="submit" class="btn btn-info btn-block">済み</button></td>
					<td><button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#cutting-model">済み</button></td>
					<td><button type="submit" class="btn btn-info btn-block">中断</button></td>
					<td><button type="submit" class="btn btn-default btn-block">未</button></td>
					<td><button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#shipment-not-yet-model">未</button></td>
					<td><input type="text" class="form-control datetime" size="10" value=""/></td>
					<td><input type="text" class="form-control" value=""/></td>
				</tr>
				</tbody>
			</table>
			</form>
		</div>
  	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="cutting-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">使用量を入力してください</h4>
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
			<div class="col-sm-6 ">
				<div class="form-group">
				<label for="" class="col-sm-6 control-label">実裁断数</label>
				<div class="col-sm-6">
					<input type="text" class="form-control text-right" value="95"/>
				</div>
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
						<th class="col-sm-4">実使用量</th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td>品番・色番を表示</td>
						<td class="text-right">200</td>
						<td class="text-right"><input type="text" class="form-control text-right" placeholder="999"/></td>
					</tr>
					<tr>
						<td>品番・色番を表示</td>
						<td class="text-right">150</td>
						<td class="text-right"><input type="text" class="form-control text-right" placeholder="999"/></td>
					</tr>
					<tr>
						<td>品番・色番を表示</td>
						<td class="text-right">150</td>
						<td class="text-right"><input type="text" class="form-control text-right" placeholder="999"/></td>
					</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<br/>
			</div>
		</div>
        <div class="row">
			<div class="col-sm-6">
				<div class="form-group">
				<label for="" class="control-label">出荷状況</label>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-default">
							<input type="radio" name="options1" id="option11" autocomplete="off">未
						</label>
						<label class="btn btn-default active">
							<input type="radio" name="options1" id="option21" autocomplete="off">済み
						</label>
					</div>

				</div>
			</div>
      	</div>
	  </div>
      <div class="modal-footer">
		<div class="col-sm-offset-2 col-sm-3">
        	<button type="button" class="btn btn-default btn-block" data-dismiss="modal">閉じる</button>
		</div>
		<div class="col-sm-offset-2 col-sm-3">
		<form method="post" action="<?= site_url('production') ?>">
			<input type="hidden" name="id" value="">
			<button type="submit" class="btn btn-success btn-block">保存する</button>
		</form>
		</div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="shipment-not-yet-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">出荷状況を入力してください</h4>
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
			<div class="col-sm-12">
				<br/>
			</div>
		</div>
        <div class="row">
			<div class="col-sm-6">
				<div class="form-group">
				<label for="" class="control-label">出荷状況</label>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-default">
							<input type="radio" name="options1" id="option11" autocomplete="off">未
						</label>
						<label class="btn btn-default active">
							<input type="radio" name="options1" id="option21" autocomplete="off">済み
						</label>
					</div>

				</div>
			</div>
      	</div>
	  </div>
      <div class="modal-footer">
		<div class="col-sm-offset-2 col-sm-3">
        	<button type="button" class="btn btn-default btn-block" data-dismiss="modal">閉じる</button>
		</div>
		<div class="col-sm-offset-2 col-sm-3">
		<form method="post" action="<?= site_url('production') ?>">
			<input type="hidden" name="id" value="">
			<button type="submit" class="btn btn-success btn-block">保存する</button>
		</form>
		</div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="shipment-already-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
	  </div>
      <div class="modal-footer">
		<div class="col-sm-offset-2 col-sm-3">
        	<button type="button" class="btn btn-default btn-block" data-dismiss="modal">閉じる</button>
		</div>
      </div>
    </div>
  </div>
</div>

<script src="<?= site_url('assets/js/production.js'); ?>"></script>
<link href="<?= site_url('assets/css/production.css'); ?>" rel="stylesheet">
