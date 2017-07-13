<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<h1>商品一覧</h1>
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
				<div class="col-sm-2">
				<input type="text" class="form-control" placeholder="キーワード" size="10">
				</div>
				<div class="col-sm-1">
					<button type="submit" class="btn btn-info form-control">検索</button>
				</div>
			</div>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-10">
			<nav aria-label="Page navigation">
			<ul class="pagination">
				<li>
				<a href="#" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
				</li>
				<li><a href="#">1</a></li>
				<li class="active"><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li><a href="#">6</a></li>
				<li><a href="#">7</a></li>
				<li><a href="#">8</a></li>
				<li><a href="#">9</a></li>
				<li>
				<a href="#" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				</a>
				</li>
			</ul>
			</nav>
		</div>
		<div class="col-sm-2">
			<a href="<?= site_url('/master/product/create') ?>" class="btn btn-success btn-block pagination">新規登録</a>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-12">
			<table class="table table-striped table-hover ">
				<thead>
				<tr>
					<th>商品カテゴリ</th>
					<th>商品名</th>
					<th>品番</th>
					<th>更新日</th>
					<th class="col-sm-2"></th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td>ユニフォーム</td>
					<td>◯◯高校2017
					</td>
					<td>A00001</td>
					<td>2017/06/30</td>
					<td>
						<a href="<?= site_url('/master/product/edit/1') ?>" class="btn btn-info col-sm-offset-1 col-sm-5">編集</a>
						<a href="#" class="btn btn-warning col-sm-offset-1 col-sm-5"  data-toggle="modal" data-target="#delete-modal">削除</a>
					</td>
				</tr>
				<tr>
					<td>スクールウェア</td>
					<td>◯◯高校 Lサイズ</td>
					<td>B00999</td>
					<td>2017/07/07</td>
					<td>
						<a href="<?= site_url('/master/product/edit/2') ?>" class="btn btn-info col-sm-offset-1 col-sm-5">編集</a>
						<a href="#" class="btn btn-warning col-sm-offset-1 col-sm-5"  data-toggle="modal" data-target="#delete-modal">削除</a>
					</td>
				</tr>
				</tbody>
			</table>
		</div>
  	</div>
	<div class="row">
		<div class="col-sm-12">
			<nav aria-label="Page navigation">
			<ul class="pagination">
				<li>
				<a href="#" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
				</li>
				<li><a href="#">1</a></li>
				<li class="active"><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li><a href="#">6</a></li>
				<li><a href="#">7</a></li>
				<li><a href="#">8</a></li>
				<li><a href="#">9</a></li>
				<li>
				<a href="#" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				</a>
				</li>
			</ul>
			</nav>
		</div>
	</div>
</div>

<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">お知らせ</h4>
			</div>
			
			<div class="modal-body">
				削除してよろしいですか。
			</div>

			<form class="form-horizontal" method="post" action="<?= site_url('master/product') ?>">
				<input type="hidden" name="id" value="">
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
					<button type="submit" class="btn btn-danger">削除する</button>
				</div>
			</form>
		</div>
	</div>
</div>

<link href="<?= site_url('assets/css/master-product.css'); ?>" rel="stylesheet">
