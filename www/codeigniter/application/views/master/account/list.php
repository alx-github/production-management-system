<div class="container">
	<h1><strong>アカウント一覧</strong></h1>
	<div class="row">
		<div class="col-md-5">
			<form class="form-inline" method="GET" action="">
				<div class="form-group">
					<input class="form-control" type="text" name=""   placeholder="キーワード">
				</div>
				<div class="form-group">
					<button id="btn-search" class="btn btn-info btn-account" type="submit">検索</button>
				</div>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-hover">
				<thead>
					<tr>
						<th colspan="2">
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
						<th>
							<ul class="pull-right">
									<a href="<?= site_url('/master/account/create') ?> ">
									<button id="btn_insert" class="btn btn-success" >新規登録</button>
									  </a>
									
							</ul>
						</th>
					</tr>
				</thead>
				<tbody style="background-color: white; ">
					<tr>
						<td><strong>ロクインID</strong></td>
						<td><strong>権限</strong></td>
						<td></td>
					</tr>
					<tr>
						<td>admin</td>
						<td>システム管理者</td>
						<td>
							<div class="btn-toolbar pull-right" aria-label="Toolbar with button groups">
								<button class="btn btn-info btn-account">編集</button>

								<button class="btn btn-warning btn-account">削除</button>
							</div>
						</td>
					</tr>
						<td>user1</td>
						<td>一般ユーザー</td>
						<td><div class="btn-toolbar pull-right" aria-label="Toolbar with button groups">
								<button class="btn btn-info btn-account">編集</button>

								<button class="btn btn-warning btn-account">削除</button>
							</div></td>
					</tr>
					<tr>
						<td>user2</td>
						<td >一般ユーザー</td>
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
