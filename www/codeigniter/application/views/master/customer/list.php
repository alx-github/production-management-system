<div class="container-fluid">
	<h1>取引先一覧</h1>
	<?= render_message_html(); ?>
	<?= render_error_message_html(); ?>
	<div class="row">
		<?php echo form_open("master/customer/index", ["class" => "form-horizontal", "role" => "form", 'method' => 'get']); ?>
			<div class="form-group col-xs-12">
				<div class="col-sm-4">
					<?= render_input_html('keyword', $keyword, 'キーワード'); ?>
				</div>
				<div class="col-sm-1">
					<input type="submit" class="btn btn-primary" value="検索" />
				</div>
			</div>
		<?php echo form_close(); ?>
	</div>
	
	<div class="row">
		<div class="col-sm-10 col-xs-8">
			<?= $this->pagination->create_links(); ?>
		</div>
		<div class="pagination col-sm-2 col-xs-4">
			<a class="btn btn-success btn-block" 
				href="<?php echo site_url('master/customer/create') ?>"><i class="fa fa-plus fa-fw"></i>新規登録</a>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 table-responsive">
			<table class="table table-hover">
				<?php if (count($customers) <= 0): ?>
					<tr><td colspan="12" rowspan="3" class="text-center">データは登録されていません。<td></tr>
				<?php else: ?>
				<thead>
					<tr>
						<th class="col-sm-2">取引先名</th>
						<th class="col-sm-3">住所</th>
						<th class="col-sm-2">連絡先</th>
						<th class="col-sm-3">メモ</th>
						<th class="col-sm-1"></th>
						<th class="col-sm-1"></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($customers as $data): ?>
						<tr>
							<td><?= $data['name']; ?></td>
							<td>
								<?= $data['postal_code']; ?>
								<br><?= $data['address_1']; ?>
								<br><?= $data['address_2']; ?>
							</td>
							<td>
								<?= $data['phone_number']; ?>
								<br><?= $data['email_1']; ?>
								<br><?= $data['email_2']; ?>
							</td>
							<td><?= $data['memo']; ?></td>
							<td>
								<a class="btn btn-info btn-block" href="<?= site_url("master/customer/update/{$data['customer_id']}"); ?>">編集</a>
							</td>
							<td>
								<a class="btn btn-warning btn-block" href="#" data-delete-id="<?= $data['customer_id']; ?>"
									data-toggle="modal" data-target="#delete-modal">削除</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<?php endif; ?>
		</div>
	</div>
	<div>
		<?= $this->pagination->create_links(); ?>
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

			<form class="form-horizontal" method="post" action="<?= site_url('master/customer/delete') ?>">
				<input type="hidden" name="delete_id" value="">
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
					<button type="submit" class="btn btn-danger js-disabled">削除する</button>
				</div>
			</form>
		</div>
	</div>
</div>
