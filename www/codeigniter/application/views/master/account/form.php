<div class="container-fluid">
	<h1>アカウント登録・編集</h1>
	<div class="row">
		<div class="col-lg-12">
			<br/>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-offset-3 ">
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
			<form class="form-horizontal" method="POST" action="<?=site_url('/master/account/insert') ?>">
				<div class="form-group">
					<div class="col-sm-3">
							<label for="login_id" class="col-sm-offset-6 control-label">ユーザーID</label>
					</div>
					<div class="col-sm-3">
						<input class="form-account form-control" type="text" name="" id="login_id" placeholder="英数字記号">
					</div>	
				</div>
				<div class="form-group">
					<div class="col-sm-3">
							<label for="password" class="col-sm-offset-6 control-label">パスワード</label>
					</div>
					<div class="col-sm-4">
						<div class="input-group">
						  <input class="form-account form-control " type="text" name="" id="password" placeholder="英数字記号">
						  <span class="btn input-group-addon form-account" id="generate-password" data-url="<?= site_url('/api/generate_password') ?>">ランダム</span>
						</div>
					</div>	
				</div>
				<div class="form-group">
					<div class="col-sm-3">
						<label for="" class="col-sm-offset-6 control-label">権限</label>
					</div>
					<div class="col-sm-2">
						<select class="form-control">
							<option>指定なし</option>
							<option selected>管理者ユーザー</option>
							<option>受発注ユーザー</option>
							<option>裁断ユーザー</option>
							<option>縫製ユーザー</option>
							<option>出荷ユーザー</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3">
						<br/>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3">
						<div class="col-sm-offset-6">
							<a href="<?= site_url('/master/account') ?>" class="btn btn-default btn-block">戻る</a>
						</div>	
					</div>
					<div class="col-sm-3">
						<div class="col-sm-offset-1 col-sm-7">
							<button type="submit" id="btn-save" class="btn btn-success btn-block">保存する</button>
						</div>	
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?= site_url('assets/js/account.js'); ?>"></script>
