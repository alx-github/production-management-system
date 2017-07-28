<div class="container-fluid">
	<h1>アカウント登録・編集</h1>
	<div class="row">
		<?=render_error_message_html() ?>
	</div>
	<div class="row">
		<div class="col-sm-offset-3 col-sm-9">
			<?=form_open(site_url( (empty($account['account_id'])) ? '/master/account/insert' : '/master/account/update' ), ['method' => 'POST', 'class' => 'form-horizontal'])?>
			<?=render_input_hidden_html('account_id', $account['account_id'] ?? '') ?>
				<div class="form-group">
					<div class="col-sm-3">
						<label for="username" class="col-sm-offset-6 control-label">ログインID</label>
					</div>
					<div class="col-sm-3">
						<?php if (empty($account['account_id'])) { ?> 
							<?=render_input_html('username', $account['username'] ?? '', '英数字記号', NULL, 'required') ?>
						<?php } else { ?> 
							<?=render_input_html('', $account['username'], NULL, NULL, 'disabled') ?>
							<?=render_input_hidden_html('username', $account['username'] ?? '') ?>
						<?php } ?>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3">
						<label for="password" class="col-sm-offset-6 control-label">パスワード</label>
					</div>
					<div class="col-sm-4">
						<div class="input-group">
							<?=render_input_html('password', NULL, '英数字記号', NULL, empty($account['account_id']) ? 'required': '') ?>
							<span class="btn input-group-addon form-account" id="generate-password" data-url="<?= site_url('/api/generate_password') ?>">ランダム</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3">
						<label for="" class="col-sm-offset-6 control-label">権限</label>
					</div>
					<div class="col-sm-2">
						<?=render_select_html('auth', config_item('account_auth'), $account['auth'], FALSE) ?>
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
			<?=form_close()?>
		</div>
	</div>
</div>
