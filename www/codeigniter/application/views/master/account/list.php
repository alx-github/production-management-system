<div class="container-fluid">
	<h1>アカウント一覧</h1>
	<div class="row">
		<div class="col-sm-12">
			<form class="" method="GET" action="">
				<div class="form-group col-sm-2">
					<input class="form-control" type="text" name="" placeholder="キーワード">
				</div>
				<div class="form-group col-sm-1">
					<button id="btn-search" class="btn btn-info btn-block" type="submit">検索</button>
				</div>
			</form>
		</div>
	</div>
	<div class="row">
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
			<a href="<?= site_url('/master/account/create') ?>" class="btn btn-success btn-block pagination">新規登録</a>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-12">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>ユーザー名</th>
						<th>権限</th>
						<th class="col-sm-2"></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>admin</td>
						<td>システム管理者</td>
						<td>
							<a href="<?= site_url('/master/account/edit/1') ?>" class="btn btn-info col-sm-offset-1 col-sm-5">編集</a>
							<a href="#" class="btn btn-warning col-sm-offset-1 col-sm-5"  data-toggle="modal" data-target="#delete-modal">削除</a>
						</td>
					</tr>
						<td>user1</td>
						<td>一般ユーザー</td>
						<td>
							<a href="<?= site_url('/master/account/edit/1') ?>" class="btn btn-info col-sm-offset-1 col-sm-5">編集</a>
							<a href="#" class="btn btn-warning col-sm-offset-1 col-sm-5"  data-toggle="modal" data-target="#delete-modal">削除</a>					
						</td>
					</tr>
					<tr>
						<td>user2</td>
						<td>一般ユーザー</td>
						<td>
							<a href="<?= site_url('/master/account/edit/1') ?>" class="btn btn-info col-sm-offset-1 col-sm-5">編集</a>
							<a href="#" class="btn btn-warning col-sm-offset-1 col-sm-5"  data-toggle="modal" data-target="#delete-modal">削除</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
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
	</div>
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
