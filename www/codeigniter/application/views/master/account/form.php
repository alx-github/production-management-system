<div class="container-fluid">
	<h1>アカウント登録・編集</h1>
	<div class="row">
		<div class="col-sm-12">
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
		</div>
	</div>
	<div class="row">
		<div class="col-sm-offset-3 col-sm-9">
			<form class="form-horizontal" method="POST" action="<?=site_url( (empty($account['account_id'])) ? '/master/account/insert' : '/master/account/update' )  ?>">
			<input type="hidden" name="account_id" value="<?= (empty($account['account_id'])) ? '' : $account['account_id'] ?>" >
				<div class="form-group">
					<div class="col-sm-3">
							<label for="username" class="col-sm-offset-6 control-label">ログインID</label>
					</div>
					<div class="col-sm-3">
						<?php if (empty($account['account_id'])) { ?> 
							<input class="form-account form-control" type="text" name="username" id="username" placeholder="英数字記号" required="true" value="<?=$account['username'] ?? '' ?>" >
						<?php } else { ?> 
							<input class="form-account form-control" type="text" disabled value="<?=$account['username'] ?>">
							<input type="hidden" name="username" value="<?=$account['username'] ?>" >
						<?php } ?> 
					</div>	
				</div>
				<div class="form-group">
					<div class="col-sm-3">
							<label for="password" class="col-sm-offset-6 control-label">パスワード</label>
					</div>
					<div class="col-sm-4">
						<div class="input-group">
						  <input class="form-account form-control " type="text" name="password" id="password" placeholder="英数字記号" <?=(empty($account['account_id']))? 'required': '' ;?> >
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
			</form>
		</div>
	</div>
</div>
