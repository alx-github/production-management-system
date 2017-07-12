<div class="container">
	<h1><strong>在庫一覧</strong></h1>
	<div class="row">
		<div class="col-md-12">
			<form class="form-inline" method="GET" action="">
				<div class="form-group col-md-4">
					<label class="label-stock"><h3><strong>取引先</strong></h3></label>
					<select class="form-control stock-select" style="width: 70%;">
						<option>瀧本</op tion>
					</select>
				</div>
				<div class="form-group col-md-4">
					<label class="label-stock"><h3><strong>発注先</strong></h3></label>
					<select class="form-control stock-select" style="width: 70%;">
						<option>瀧本</option>
					</select>
				</div>
				
				<div class="form-group col-md-3">
				<h3>
					<input class="form-control " type="text" name=""   placeholder="キーワード" style="width: 100%;">
					</h3>
				</div>
				<div class="form-group col-md-1">
				<h3 class="pull-right"> 
						<button id="btn-search" class="btn btn-info btn-account" type="submit" style="margin-right: -25px;">検索</button>
				</h3>
				
				</div>		
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-hover">
				<thead>
					<tr>
						<th colspan="4">
							<ul class="pagination" style="margin-bottom:0%;">
								<li><a href=""><<</a></li>
									<li class="active"><a href="">1</a></li>
									<li><a href="">2</a></li>
									<li><a href="">3</a></li>
									<li><a href="">4</a></li>
									<li><a href="">5</a></li>
									<li><a href="">6</a></li>
									<li><a href="">7</a></li>
									<li><a href="">8</a></li>
									<li><a href="">9</a></li>
									<li><a href="">>></a></li>
							</ul>
						</th>
						<th colspan="2">
							<ul class="pull-right">
									<a href="<?= site_url('/master/stock/create') ?> ">
									<button id="btn_insert" class="btn btn-success" >新規登録</button>
									  </a>
									
							</ul>
						</th>
					</tr>
				</thead>
				<tbody style="background-color: white; ">
					<tr>
						<td><strong>在庫カテコリ</strong></td>
						<td><strong>品番</strong></td>
						<td><strong>色番</strong></td>
						<td><strong>仕様</strong></td>
						<td><strong>更新日</strong></td>
						<td></td>
					</tr>
					<tr>
						<td>ライン</td>
						<td>KNT18</td>
						<td>黒 x プルー</td>
						<td>巾: 18</td>
						<td>2017/06/30</td>
						<td>
							<div class="btn-toolbar pull-right" aria-label="Toolbar with button groups">
								<button class="btn btn-info btn-account">編集</button>

								<button class="btn btn-warning btn-account">削除</button>
							</div>
						</td>
					</tr>
						<td>ライン</td>
						<td>E-13</td>
						<td>S: サッワス</td>
						<td>巾: 13</td>
						<td>2017/07/07</td>
						<td><div class="btn-toolbar pull-right" aria-label="Toolbar with button groups">
								<button class="btn btn-info btn-account">編集</button>

								<button class="btn btn-warning btn-account">削除</button>
							</div></td>
					</tr>
					<tr>
						<td>パイ匕ング</td>
						<td>?</td>
						<td>K41: 赤</td>
						<td>巾: 10.0、巻m: 50.0</td>
						<td>2017/07/20</td>
						<td>
							<div class="btn-toolbar pull-right" aria-label="Toolbar with button groups">
									<button class="btn btn-info btn-account">編集</button>

									<button class="btn btn-warning btn-account">削除</button>
								</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<br>
		<br>
		<div>
			<table class="table">
				<thead>
					<tr>
						<th colspan="2" style="border-bottom: 0; padding-left: 2%;">
							<ul class="pagination">
						
									<li><a href=""><<</a></li>
									<li  class="active"><a href="">1</a></li>
									<li><a href="">2</a></li>
									<li><a href="">3</a></li>
									<li><a href="">4</a></li>
									<li><a href="">5</a></li>
									<li><a href="">6</a></li>
									<li><a href="">7</a></li>
									<li><a href="">8</a></li>
									<li><a href="">9</a></li>
									<li><a href="">>></a></li>
								
							</ul>
						</th>
					</tr>
				</thead>
			</table>
		</div>
</div>
