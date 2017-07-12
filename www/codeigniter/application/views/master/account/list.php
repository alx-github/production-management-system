<div class="container-fluid">
	<h1>アカウント一覧</h1>
	<div class="row">
		<div class="col-md-5">
			<form class="form-inline" method="GET" action="">
				<div class="form-group">
					<input class="form-control" type="text" name=""   placeholder="キーワード">
				</div>
				<div class="form-group">
					<button id="btn-search" class="btn btn-info " type="submit">検索</button>
				</div>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-hover">
				<thead>
					<tr>
						<td colspan="3">
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
						<td colspan="2">
							<ul class="">
									<a href="<?= site_url('/master/account/create') ?> ">
									<button id="btn_insert" class="btn btn-success btn-block" >新規登録</button>
									  </a>
									
							</ul>
						</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><strong>ロクインID</strong></td>
						<td colspan="3"><strong>権限</strong></td>
					</tr>
					<tr>
						<td>admin</td>
						<td>システム管理者</td>
						<td colspan="1"></td>
						<td>		
							<a href="<?= site_url('/master/account/edit')?>">
							<button class="btn btn-info btn-block">編集</button>
							</a>			
						</td>
						<td>
							<button class="btn btn-warning btn-block" data-toggle="modal" data-target="#delete-modal">削除</button>
						</td>
					</tr>
						<td>user1</td>
						<td>一般ユーザー</td>
						<td colspan="1"></td>
						<td>
							<a href="<?= site_url('/master/account/edit')?>"
								class="btn btn-info btn-block" >編集
								</a>	
						</td>
						<td>
							<button class="btn btn-warning btn-block" data-toggle="modal" data-target="#delete-modal">削除</button>
						</td>
					</tr>
					<tr>
						<td>user2</td>
						<td>一般ユーザー</td>
						<td colspan="1"></td>
						<td>
						
								<a href="<?= site_url('/master/account/edit')?>">
									<button class="btn btn-info btn-block" >編集</button>
								</a>							
						</td>
						<td>
							<button class="btn btn-warning btn-block" data-toggle="modal" data-target="#delete-modal">削除</button>
						</td>
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="3">
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
		<div>
			<table class="table">
				<thead>
					
				</thead>
			</table>
		</div>
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
					<form class="form-horizontal" method="post" action="<?= site_url('/master/account/delete') ?>">
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