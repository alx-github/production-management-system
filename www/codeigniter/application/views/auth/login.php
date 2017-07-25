<div class="container-fluid">
	<form class="form-signin" method="post" action="<?= site_url('/auth/login') ?>">
		<h2 class="form-signin-heading text-center" style="margin: 20px 0 30px;">
			生産管理システム
		</h2>
		<div class="row">
			<div class="col-xs-offset-1 col-xs-10 col-sm-offset-3 col-sm-6 col-md-offset-4 col-md-4">
				<div class="well">
					<div class="row">
						<?=render_error_message_html() ?>
					</div>
					<div class="form-group">
						<?= render_input_html('username', (isset($username) ? $username : ''), 'ユーザー名', NULL, 'required autofocus') ?>
					</div>
					<div class="form-group">
						<?= render_input_html('password', NULL, 'パスワード', NULL, 'required', 'password') ?>
					</div>
					<button class="btn btn-lg btn-success btn-block" type="submit">ログイン</button>
				</div>
			</div>
		</div>
	</form>
</div>
