<div class="container-fluid">
	<h1>アカウント一覧</h1>
	<div class="row">
		<?php if ($this->session->flashdata('message')): ?>
			<div class="col-sm-12">
				<div class="alert alert-dismissible alert-info">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>メッセージ</strong>
					<p><?= $this->session->flashdata('message') ?></p>
				</div>
			</div>
			<?php $this->session->unmark_flash('message'); ?>
		<?php endif; ?>
		<?php if ($this->session->flashdata('error_message')): ?>
			<div class="col-sm-12">	
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>エラー</strong>
					<p><?= $this->session->flashdata('error_message') ?></p>
				</div>
			</div>
			<?php $this->session->unmark_flash('error_message'); ?>
		<?php endif; ?>
	</div>
	<div class="row">
		<div>
			<form class="" method="GET" action="<?= site_url('/master/account')?>">
				<div class="form-group col-sm-2">
					<input class="form-control" type="text" name="keyword" placeholder="キーワード" value="<?=(empty($keyword))? '':$keyword ?>">
				</div>
				<div class="form-group col-sm-1">
					<button id="btn-search" class="btn btn-info btn-block" type="submit">検索</button>
				</div>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-10">
			<?php echo $this->pagination->create_links() ?>
		</div>
		<div class="col-sm-2">
			<a href="<?= site_url('/master/account/create') ?>" class="btn btn-success btn-block pagination">新規登録</a>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
		<?php if ($list_accounts): ?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>ユーザー名</th>
						<th>権限</th>
						<th class="col-sm-2"></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($list_accounts as $account): ?>
					<tr>
						<td><?=$account['username']?></td>
							<td><?= $this->config->item('account_auth')[$account['auth']] ?></td>
						<td>
							<a href="<?= site_url('/master/account/edit')?>?id=<?=$account['account_id']?>" class="btn btn-info col-sm-offset-1 col-sm-5">編集</a>
							<a href="#" id="<?=$account['account_id']?>" class="btn btn-warning col-sm-offset-1 col-sm-5 delete-account <?= ($this->session->userdata('account_id') == $account['account_id'])? 'hidden' :'' ?>"  data-toggle="modal" data-target="#delete-modal">削除</a>
						</td>
					</tr>
				<?php endforeach ?>
				</tbody>
			</table>
		<?php endif ?>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<?php echo $this->pagination->create_links() ?>
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
				<input id="deleted_id" type="hidden" name="id" value="">
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
					<button type="submit" class="btn btn-danger">削除する</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?= site_url('assets/js/account.js'); ?>"></script>
