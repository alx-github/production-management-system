<div class="container-fluid">
	<h1>在庫入出庫</h1>
	<div class="row">
		<div class="col-sm-6">
			<div class="row">
				<div class="col-sm-12">
					<form class="form-horizontal">
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
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">仕様</label>
							<label for="" class="col-sm-7 control-label">巾：10.0、巻m：50.0</label>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-3">
								<button type="submit" class="btn btn-primary form-control">検索</button>
							</div>
						</div>
					</form>
				</div>
				<div class="col-sm-12">
					<div>
						<ul class="nav nav-tabs nav-justified" role="tablist">
							<li role="presentation" class="active">
								<a href="#in" aria-controls="in" role="tab" data-toggle="tab">入庫</a>
							</li>
							<li role="presentation">
								<a href="#out" aria-controls="out" role="tab" data-toggle="tab">出庫</a>
							</li>
						</ul>
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="in">
								<form class="form-horizontal">
									<div class="form-group">
										<label for="" class="col-sm-3 control-label">入庫日</label>
										<div class="col-sm-4">
											<input type="text" class="form-control datetime" value="2017/07/20" />
										</div>
									</div>
									<div class="form-group">
										<label for="" class="col-sm-3 control-label">入庫数</label>
										<div class="col-sm-3">
											<input type="text" class="form-control text-right" placeholder="9999" />
										</div>
									</div>
									<div class="form-group">
										<label for="" class="col-sm-3 control-label">理由</label>
										<div class="btn-group col-sm-9" data-toggle="buttons">
											<label class="btn btn-default">
												<input type="radio" name="options" id="option1" autocomplete="off">発注
											</label>
											<label class="btn btn-default">
												<input type="radio" name="options" id="option2" autocomplete="off">入荷
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
									<div class="form-group">
										<label for="" class="col-sm-3 control-label">発注ID</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" value="" />
										</div>
									</div>
									<div class="form-group">
										<label for="" class="col-sm-3 control-label">備考</label>
										<div class="col-sm-7">
											<input type="text" class="form-control" value="" />
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-3">
											<button type="submit" class="btn btn-success form-control">保存</button>
										</div>
										<div class="col-sm-3">
											<button type="submit" class="btn btn-warning form-control">削除</button>
										</div>
									</div>
								</form>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="out">
								<form class="form-horizontal">
									<div class="form-group">
										<label for="" class="col-sm-3 control-label">出庫日</label>
										<div class="col-sm-4">
											<input type="text" class="form-control datetime" value="2017/07/20" />
										</div>
									</div>
									<div class="form-group">
										<label for="" class="col-sm-3 control-label">出庫数</label>
										<div class="col-sm-3">
											<input type="text" class="form-control text-right" placeholder="9999" />
										</div>
									</div>
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
									<div class="form-group">
										<label for="" class="col-sm-3 control-label">受注ID</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" value="" />
										</div>
									</div>
									<div class="form-group">
										<label for="" class="col-sm-3 control-label">備考</label>
										<div class="col-sm-7">
											<input type="text" class="form-control" value="" />
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-3">
											<button type="submit" class="btn btn-success form-control">保存</button>
										</div>
										<div class="col-sm-3">
											<button type="submit" class="btn btn-warning form-control">削除</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<table class="table">
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
					<td class="text-right"></td>
					<td class="text-right">200</td>
				</tr>
				<tr>
					<td></td>
					<td class="text-right">100</td>
					<td class="text-right"></td>
					<td class="text-right">100</td>
				</tr>
				<tr>
					<td></td>
					<td class="text-right"></td>
					<td class="text-right">50</td>
					<td class="text-right">0</td>
				</tr>
				<tr>
					<td></td>
					<td class="text-right"></td>
					<td class="text-right">50</td>
					<td class="text-right">50</td>
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
				<tr>
					<td>・・・</td>
					<td class="text-right"></td>
					<td class="text-right"></td>
					<td class="text-right"></td>
				</tr>
				<tr>
					<td>・・・</td>
					<td class="text-right"></td>
					<td class="text-right"></td>
					<td class="text-right"></td>
				</tr>
				<tr>
					<td>・・・</td>
					<td class="text-right"></td>
					<td class="text-right"></td>
					<td class="text-right"></td>
				</tr>
				<tr>
					<td>・・・</td>
					<td class="text-right"></td>
					<td class="text-right"></td>
					<td class="text-right"></td>
				</tr>
				<tr>
					<td>・・・</td>
					<td class="text-right"></td>
					<td class="text-right"></td>
					<td class="text-right"></td>
				</tr>
				<tr>
					<td>・・・</td>
					<td class="text-right"></td>
					<td class="text-right"></td>
					<td class="text-right"></td>
				</tr>
				<tr>
					<td>・・・</td>
					<td class="text-right"></td>
					<td class="text-right"></td>
					<td class="text-right"></td>
				</tr>
				</tbody>
			</table>
			 <ul class="pagination col-sm-12">
				<li><a href=""><<</a></li>
				<li class="active"><a href="">1</a></li>
				<li><a href="">2</a></li>
				<li><a href="">3</a></li>
				<li><a href="">4</a></li>
				<li><a href="">5</a></li>
				<li><a href="">6</a></li>
				<li><a href="">7</a></li>
				<li><a href="">8</a></li>
				<li><a href="">>></a></li>
			</ul>
		</div>
	</div>
</div>

<script src="<?= site_url('assets/js/stock.js'); ?>"></script>
<link href="<?= site_url('assets/css/stock.css'); ?>" rel="stylesheet">
