<div class="container-fluid">
	<h1>在庫一覧</h1>
	<div class="row">
		<div>
			<form class="form-horizontal" method="GET" action="">
				<div class="form-group col-md-4">
					<div class="col-md-3">
						<label>取引先</label>
					</div>
					<div class="col-md-9">
						<select class="form-control">
							<option>指定なし</option>
							<option selected>瀧本</option>
							<option>A株式会社</option>
							<option>△△</option>
							<option>△△△△</option>
						</select>
					</div>
				</div>
				<div class="form-group col-md-4">
					<div class="col-md-3">
						<label>発注先</label>
					</div>
					<div class="col-md-9">
						<select class="form-control">
							<option>指定なし</option>
							<option selected>瀧本</option>
							<option>A株式会社</option>
							<option>△△</option>
							<option>△△△△</option>
						</select>
					</div>
				</div>
				<div class="form-group col-md-4">
					<div class="col-md-9">
						<input class="form-control" type="text" name=""   placeholder="キーワード">
					</div>
					<div class="col-md-3">
						<button id="btn-search" class="btn btn-info" type="submit">検索</button>
					</div>
					
				</div>
				<div class="form-group col-md-1">
				</div>		
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-hover">
				<thead>
					<tr>
						<td colspan="5">
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
						</td>
						<th colspan="2">
							<ul class="">
									<a href="<?= site_url('/master/stock/create') ?> ">
									<button id="btn_insert" class="btn btn-success btn-block" >新規登録</button>
									  </a>
									
							</ul>
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><strong>在庫カテコリ</strong></td>
						<td><strong>品番</strong></td>
						<td><strong>色番</strong></td>
						<td><strong>仕様</strong></td>
						<td><strong>更新日</strong></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>ライン</td>
						<td>KNT18</td>
						<td>黒 x プルー</td>
						<td>巾: 18</td>
						<td>2017/06/30</td>
						<td>
							<a href="<?= site_url('/master/stock/edit')?>">
								<button class="btn btn-info btn-block " >編集</button>
								</a>	
						</td>
						<td>
							<button class="btn btn-warning btn-block" data-toggle="modal" data-target="#delete-modal">削除</button>
						</td>
					</tr>
						<td>ライン</td>
						<td>E-13</td>
						<td>S: サッワス</td>
						<td>巾: 13</td>
						<td>2017/07/07</td>
						<td>
							<a href="<?= site_url('/master/stock/edit')?>">
								<button class="btn btn-info btn-block " >編集</button>
								</a>	
						</td>
						<td>
							<button class="btn btn-warning btn-block" data-toggle="modal" data-target="#delete-modal">削除</button>
						</td>
					</tr>
					<tr>
						<td>パイ匕ング</td>
						<td>?</td>
						<td>K41: 赤</td>
						<td>巾: 10.0、巻m: 50.0</td>
						<td>2017/07/20</td>
						<td>
							<a href="<?= site_url('/master/stock/edit')?>">
								<button class="btn btn-info btn-block " >編集</button>
								</a>	
						</td>
						<td>
							<button class="btn btn-warning btn-block" data-toggle="modal" data-target="#delete-modal">削除</button>
						</td>
					</tr>

				</tbody>
				<tfoot>
					<tr>
						<td colspan="6">
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
						</td>
					</tr>
				</tfoot>
			</table>
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
<link href="<?= base_url('assets/css/account.css'); ?>" rel="stylesheet">
<script type="text/javascript" src="<?= base_url('assets/js/account.js'); ?>"></script>
