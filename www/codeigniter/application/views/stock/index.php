<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<h1>在庫入出庫</h1>
		</div>	
		<form class="form-horizontal">
		<div class="col-sm-6">
			<div class="form-group">
				<label for="" class="col-sm-3 control-label">取引先</label>
				<div class="col-sm-7">
				<select class="form-control">
					<option>指定なし</option>
					<option selected>瀧本</option>
					<option>A株式会社</option>
					<option>△△</option>
					<option>△△△△</option>
				</select>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="form-group">
				<label for="" class="col-sm-3 control-label">在庫カテゴリ</label>
				<div class="col-sm-7">
				<select class="form-control">
					<option>指定なし</option>
					<option selected>パイピング</option>
					<option>△△</option>
					<option>△△△△</option>
				</select>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="form-group">
				<label for="" class="col-sm-3 control-label">仕様</label>
				<label for="" class="col-sm-7 control-label">巾：10.0、巻m：50.0</label>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				<label for="" class="col-sm-3 control-label">品番</label>
				<div class="col-sm-7">
				<select class="form-control">
					<option>指定なし</option>
					<option selected>K-19</option>
					<option>K-20</option>
					<option>K-21</option>
					<option>K-22</option>
				</select>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="form-group">
				<label for="" class="col-sm-3 control-label">色番</label>
				<div class="col-sm-7">
				<select class="form-control">
					<option>指定なし</option>
					<option selected>35SA：白xサックスxグレー</option>
					<option>△△</option>
					<option>△△△△</option>
				</select>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="col-sm-offset-3 col-sm-3">
				<button type="submit" class="btn btn-info form-control">検索</button>
			</div>
		</div>
		</form>
	</div>
	<hr class="clearfix" />
	<div class="row">
		<div class="col-sm-6">
		<form class="form-horizontal">
			<div class="form-group">
				<label for="" class="col-sm-3 control-label">入庫日</label>
				<div class="col-sm-4">
				<input type="text" class="form-control datetime" value="2017/07/20" />
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="form-group">
				<label for="" class="col-sm-3 control-label">入庫数</label>
				<div class="col-sm-3">
				<input type="text" class="form-control text-right" placeholder="9999" />
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="form-group">
				<label for="" class="col-sm-3 control-label">理由</label>
				<div class="btn-group col-sm-9" data-toggle="buttons">
					<label class="btn btn-default">
						<input type="radio" name="options" id="option1" autocomplete="off">発注
					</label>
					<label class="btn btn-default">
						<input type="radio" name="options" id="option2" autocomplete="off">返却
					</label>
					<label class="btn btn-default">
						<input type="radio" name="options" id="option3" autocomplete="off">転送
					</label>
					<label class="btn btn-default">
						<input type="radio" name="options" id="option4" autocomplete="off">棚卸し
					</label>
					<label class="btn btn-default">
						<input type="radio" name="options" id="option5" autocomplete="off">その他
					</label>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="form-group">
				<label for="" class="col-sm-3 control-label">発注ID</label>
				<div class="col-sm-4">
				<input type="text" class="form-control" value="" />
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="form-group">
				<label for="" class="col-sm-3 control-label">備考</label>
				<div class="col-sm-7">
				<input type="text" class="form-control" value="" />
				</div>
				<div class="col-sm-2">
					<button type="submit" class="btn btn-success form-control">保存</button>
				</div>
			</div>
		</form>
		</div>
		<div class="col-sm-6">
		<form class="form-horizontal">
			<div class="form-group">
				<label for="" class="col-sm-3 control-label">出庫日</label>
				<div class="col-sm-4">
				<input type="text" class="form-control datetime" value="2017/07/20" />
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="form-group">
				<label for="" class="col-sm-3 control-label">出庫数</label>
				<div class="col-sm-3">
				<input type="text" class="form-control text-right" placeholder="9999" />
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="form-group">
				<label for="" class="col-sm-3 control-label">理由</label>
				<div class="btn-group col-sm-9" data-toggle="buttons">
					<label class="btn btn-default">
						<input type="radio" name="options1" id="option11" autocomplete="off">仮押さえ
					</label>
					<label class="btn btn-default">
						<input type="radio" name="options1" id="option21" autocomplete="off">製造
					</label>
					<label class="btn btn-default">
						<input type="radio" name="options1" id="option31" autocomplete="off">転送
					</label>
					<label class="btn btn-default">
						<input type="radio" name="options1" id="option41" autocomplete="off">棚卸し
					</label>
					<label class="btn btn-default">
						<input type="radio" name="options1" id="option51" autocomplete="off">その他
					</label>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="form-group">
				<label for="" class="col-sm-3 control-label">発注ID</label>
				<div class="col-sm-4">
				<input type="text" class="form-control" value="" />
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="form-group">
				<label for="" class="col-sm-3 control-label">備考</label>
				<div class="col-sm-7">
				<input type="text" class="form-control" value="" />
				</div>
				<div class="col-sm-2">
					<button type="submit" class="btn btn-success form-control">保存</button>
				</div>
			</div>
		</form>
		</div>
	</div>
	<div class="clearfix"><br/></div>
	<div class="row">
		<div class="col-lg-12">
			<table class="table table-striped">
				<thead>
				<tr>
					<th class="col-sm-3">日付</th>
					<th class="col-sm-3">入庫</th>
					<th class="col-sm-3">出庫</th>
					<th class="col-sm-3">在庫数</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td>2017/07/05</td>
					<td class="text-right">100</td>
					<td class="text-right">50</td>
					<td class="text-right">150</td>
				</tr>
				<tr>
					<td>2017/07/04</td>
					<td class="text-right"></td>
					<td class="text-right">200</td>
					<td class="text-right">100</td>
				</tr>
				<tr>
					<td>2017/07/03</td>
					<td class="text-right">100</td>
					<td class="text-right"></td>
					<td class="text-right">300</td>
				</tr>
				</tbody>
			</table>
		</div>
  	</div>
</div>

<script src="<?= site_url('assets/js/stock.js'); ?>"></script>
<link href="<?= site_url('assets/css/stock.css'); ?>" rel="stylesheet">
