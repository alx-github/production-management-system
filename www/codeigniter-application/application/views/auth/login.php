<div class="container">
	<form class="form-signin" method="post" action="<?= site_url('/auth/login') ?>">
		<h2 class="form-signin-heading text-center" style="margin: 20px 0 30px;">
			生産管理システム
		</h2>
		<div class="row">
			<div class="col-xs-offset-1 col-xs-10 col-sm-offset-3 col-sm-6">
				<div class="well">
					<?php if ($this->session->has_userdata('error_message')): ?>
						<div class="alert alert-dismissible alert-danger">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong>エラー</strong>
							<p><?= $this->session->flashdata('error_message') ?></p>
							<?php $this->session->unmark_flash('error_message'); ?>
						</div>
					<?php endif; ?>
					<div class="form-group">
						<input id="login_id" name="login_id" class="form-control" 
							placeholder="ユーザー名" value="<?= isset($login_id) ? $login_id : '' ?>" required autofocus>
					</div>
					<div class="form-group">
						<input type="password" id="password" name="password" class="form-control" placeholder="パスワード" required>
					</div>
					<button class="btn btn-lg btn-success btn-block" type="submit">ログイン</button>
				</div>
			</div>
		</div>
	</form>
</div>
