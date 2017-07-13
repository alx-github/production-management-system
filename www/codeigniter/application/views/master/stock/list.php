<div class="container-fluid">
	<h1>在庫一覧</h1>
	<div class="row">
		<div>
			<form class="form-horizontal" method="GET" action="">
				<div class="form-group col-sm-4">
					<div class="col-sm-3 text-right">
						<label class="control-label">取引先</label>
					</div>
					<div class="col-sm-9">
						<select class="form-control">
							<option>指定なし</option>
							<option selected>瀧本</option>
							<option>A株式会社</option>
							<option>△△</option>
							<option>△△△△</option>
						</select>
					</div>
				</div>
				<div class="form-group col-sm-4">
					<div class="col-sm-3 text-right">
						<label class="control-label">発注先</label>
					</div>
					<div class="col-sm-9">
						<select class="form-control">
							<option>指定なし</option>
							<option selected>瀧本</option>
							<option>A株式会社</option>
							<option>△△</option>
							<option>△△△△</option>
						</select>
					</div>
				</div>
				<div class="form-group col-sm-4">
					<div class="col-sm-9">
						<input class="form-control" type="text" name=""   placeholder="キーワード">
					</div>
					<div class="col-sm-3">
						<button id="btn-search" class="btn btn-info" type="submit">検索</button>
					</div>
				</div>		
			</form>
		</div>
	</div>
	<div class="row">
		<div>
			<div class="col-sm-10">
				<ul class="pagination">
					<li><a href="#" aria-label="Previous">
				        <span aria-hidden="true">&laquo;</span>
				      </a></li>
						<li><a href="">1</a></li>
						<li  class="active"><a href="">2</a></li>
						<li><a href="">3</a></li>
						<li><a href="">4</a></li>
						<li><a href="">5</a></li>
						<li><a href="">6</a></li>
						<li><a href="">7</a></li>
						<li><a href="">8</a></li>
						<li><a href="">9</a></li>
						<li><a href="#" aria-label="Previous">
				        <span aria-hidden="true">&raquo;</span>
				      </a></li>
				</ul>
			</div>
			<div class="col-sm-2">
				<ul class="pagination">
						<a href="<?= site_url('/master/stock/create') ?> ">
									<button id="btn_insert" class="btn btn-success btn-block" >新規登録</button>
					   </a>
				</ul>
			</div>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>在庫カテコリ</th>
						<th>品番</th>
						<th>色番</th>
						<th>仕様</th>
						<th>更新日</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>ライン</td>
						<td>KNT18</td>
						<td>黒 x プルー</td>
						<td>巾: 18</td>
						<td>2017/06/30</td>
						<td>
							<a href="<?= site_url('/master/stock/edit')?>" class="btn btn-info" >編集</a>	
								<button class="btn btn-warning" data-toggle="modal" data-target="#delete-modal">削除</button>
						</td>
					</tr>
						<td>ライン</td>
						<td>E-13</td>
						<td>S: サッワス</td>
						<td>巾: 13</td>
						<td>2017/07/07</td>
						<td>
							<a href="<?= site_url('/master/stock/edit')?>" class="btn btn-info" >編集</a>	
								<button class="btn btn-warning" data-toggle="modal" data-target="#delete-modal">削除</button>
						</td>
					</tr>
					<tr>
						<td>パイ匕ング</td>
						<td>?</td>
						<td>K41: 赤</td>
						<td>巾: 10.0、巻m: 50.0</td>
						<td>2017/07/20</td>
						<td>
							<a href="<?= site_url('/master/stock/edit')?>" class="btn btn-info" >編集</a>	
								<button class="btn btn-warning" data-toggle="modal" data-target="#delete-modal">削除</button>
						</td>
					</tr>

				</tbody>
			</table>
			<div class="col-sm-10">
				<ul class="pagination">
					<li><a href="#" aria-label="Previous">
			        <span aria-hidden="true">&laquo;</span>
			      </a></li>
					<li><a href="">1</a></li>
					<li  class="active"><a href="">2</a></li>
					<li><a href="">3</a></li>
					<li><a href="">4</a></li>
					<li><a href="">5</a></li>
					<li><a href="">6</a></li>
					<li><a href="">7</a></li>
					<li><a href="">8</a></li>
					<li><a href="">9</a></li>
					<li><a href="#" aria-label="Next">
			        <span aria-hidden="true">&raquo;</span>
			      </a></li>
				</ul>
			</div>
		</div>
		<br>
		<br>
	<!-- Modal -->
	
		<div class="modal fade" id="delete-modal" tabindex="0" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel">削除確認</h4>
					</div>
					<div class="modal-body">
						削除してよろしいですか。<br>
						<!-- 一度削除したアカウントは元に戻すことはできません。 -->
					</div>
					<form class="form-horizontal" method="post" action="<?= site_url('/master/stock/delete') ?>">
						<input type="hidden" name="id" value="">
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
							<button type="submit" class="btn btn-danger">削除する</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	

</div>
<link href="<?= site_url('assets/css/account.css'); ?>" rel="stylesheet">
<script type="text/javascript" src="<?= site_url('assets/js/account.js'); ?>"></script>
