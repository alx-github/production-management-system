<div class="container-fluid">
	<h1>アカウント登録・編集</h1>
	<div class="row">
		<div class="col-lg-12">
			<br/>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<?php if($this->session->flashdata('error_message')): ?>
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
		<div class="col-sm-offset-3">
			<form class="form-horizontal col-sm-12" method="POST" action="<?=site_url( (empty($account['account_id'])) ? '/master/account/insert' : '/master/account/update' )  ?>">
				<div>
					<input type="hidden" name="account_id" value="<?= (empty($account['account_id'])) ? '' : $account['account_id'] ?>" >
				</div>
				<div class="form-group">
					<div class="col-sm-3">
							<label for="login_id" class="col-sm-offset-6 control-label">ユーザー名</label>
					</div>
					<div class="col-sm-3">
						<input class="form-account form-control" type="text" name="username" id="username" placeholder="英数字記号" required="true" <?=(empty($account['account_id']))? '': 'disabled';?> value="<?= (empty($account['username'])) ? '' : $account['username'] ?>" >
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
						<label for="" class="col-sm-offset-6  control-label">権限</label>
					</div>
					<div class="col-sm-2">
						<select class="form-control" name="auth">
						<?php if (($account['auth']) === null): ?>
							<option value="<?=ACCOUNT_UNASSIGN?> selected>">指定なし</option>
							<option value="<?=ACCOUNT_CUTTING?>"裁断ユーザー</option>
							<option value="<?=ACCOUNT_SEWING?>">縫製ユーザー</option>
							<option value="<?=ACCOUNT_SHIPPING?>">出荷ユーザー</option>
							<option value="<?=ACCOUNT_CLERICAL?>">受発注ユーザー</option>
							<option value="<?=ACCOUNT_ADMIN?>">管理者ユーザー</option>
						<?php else: ?>
							<option value="<?=ACCOUNT_UNASSIGN?>" <?=($account['auth'] == ACCOUNT_UNASSIGN )? 'selected': '' ;?> >指定なし</option>
							<option value="<?=ACCOUNT_CUTTING?>" <?=($account['auth'] === ACCOUNT_CUTTING )? 'selected': '' ;?> >裁断ユーザー</option>
							<option value="<?=ACCOUNT_SEWING?>" <?=($account['auth'] === ACCOUNT_SEWING )? 'selected': '' ;?> >縫製ユーザー</option>
							<option value="<?=ACCOUNT_SHIPPING?>" <?=($account['auth'] === ACCOUNT_SHIPPING )? 'selected': '' ;?> >出荷ユーザー</option>
							<option value="<?=ACCOUNT_CLERICAL?>" <?=($account['auth'] === ACCOUNT_CLERICAL )? 'selected': '' ;?> >受発注ユーザー</option>
							<option value="<?=ACCOUNT_ADMIN?>" <?=($account['auth'] === ACCOUNT_ADMIN )? 'selected': '' ;?> >管理者ユーザー</option>
						<?php endif ?>
						</select>
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
