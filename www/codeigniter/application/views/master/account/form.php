<div class="container">
	<h1><strong>アカウント登録・編集</strong></h1>
	<br>
	<br>
	<div class="row">
		<div class="col-md-offset-3 ">
			<?php 
				if($this->session->flashdata('error_message')):
			 ?>
			<div class="alert alert-dismissable alert-danger">
				
				<h4>エラー</h4>
				<p>
					<?= $this->session->flashdata('error_message')?>	
				</p>
				<?php $this->session->unmark_flash('error_message') ?>

			</div>

		<?php endif; ?>
			<form class="form-horizontal">
				<div class="form-group">
					<div class="col-md-3">
							<label for="login_id" class="col-md-offset-6 control-label">ユーザーID</label>
					</div>
					<div class="col-md-5">
						<input class="form-account form-control" type="text" name="" id="login_id" placeholder="英数字記号">
					</div>	
				</div>
				<div class="form-group">
					<div class="col-md-3">
							<label for="password" class="col-md-offset-6 control-label">パスワード</label>
					</div>
					<div class="col-md-6">
						<div class="input-group">
						  <input class="form-account form-control " type="text" name="password" id="password" placeholder="英数字記号">
						  <span class="btn input-group-addon form-account" id="generate-password" data-url="<?= site_url('/api/generate_password') ?>">ランダム</span>
						</div>
						
					</div>	
				</div>
				<div class="form-group">
					<div class="col-md-3">
							<label for="" class="col-md-offset-6 control-label">権限</label>
					</div>
					<div class="col-md-9 col-xl-9">
						<div class="btn-group" role="group" aria-label="Basic example">
						  <button type="button" class="btn btn-default">指定なし</button>
						  <button type="button" class="btn btn-default">管理者ユーザー</button>
						  <button type="button" class="btn btn-default">受発注ユーザー</button>
						  <button type="button" class="btn btn-default">裁断ユーザー</button>
						  <button type="button" class="btn btn-default">縫製ユーザー</button>
						  <button type="button" class="btn btn-default">出荷ユーザー</button>
						</div>
					</div>	
				</div>
				<br>
				<br>
				<div class="form-group">
					<div class="col-md-3">
						<button id="btn-return" class="col-md-offset-6 btn btn-default">戻る</button>
							
					</div>
					<div class="col-md-3">
						<button type="submit" id="btn-save" class="col-md-offset-6 btn btn-success">保存する</button>
						
					</div>	
				</div>
			</form>
		</div>
	</div>
</div>
