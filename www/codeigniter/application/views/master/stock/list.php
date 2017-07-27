<div class="container-fluid">
	<h1>在庫一覧</h1>
	<div class="row">
		<?=render_message_html() ?>
		<?=render_error_message_html() ?>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<form class="form-horizontal" method="GET" action="<?= site_url('/master/stock')?>">
				<div class="form-group col-sm-4">
					<div class="col-sm-3 text-right">
						<label class="control-label">取引先</label>
					</div>
					<div class="col-sm-9">
						<?=render_select_html_from_database('receive_order_customer_id',$list_receive_customers, 'customer_id', 'name', $receive_order_customer_id) ?>					
					</div>
				</div>
				<div class="form-group col-sm-4">
					<div class="col-sm-3 text-right">
						<label class="control-label">発注先</label>
					</div>
					<div class="col-sm-9">
						<?=render_select_html_from_database('send_order_customer_id',$list_send_customers, 'customer_id', 'name', $send_order_customer_id) ?>
					</div>
				</div>
				<div class="form-group col-sm-4">
					<div class="col-sm-9">
						<?=render_input_html('keyword', $keyword, 'キーワード', NULL, NULL) ?>
					</div>
					<div class="col-sm-3">
						<button id="btn-search" class="btn btn-primary" type="submit">検索</button>
					</div>
				</div>		
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-10">
			<?php echo $this->pagination->create_links() ?>
		</div>
		<div class="col-sm-2">
			<a href="<?= site_url('/master/stock/create') ?>" class="btn btn-success btn-block pagination">新規登録</a>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
		<?php if ($list_materials){ ?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>在庫カテコリ</th>
						<th>品番</th>
						<th>色番</th>
						<th>仕様</th>
						<th>更新日</th>
						<th class="col-sm-2"></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($list_materials as $material){ ?>
					<tr>
						<td><?=$this->config->item('material')['categories'][$material['category']] ?? '' ?></td>
						<td><?=$material['part_number']?></td>
						<td><?=$material['color_number_code'].' '.$material['color_number_tint'] ?></td>	
						<td><?=$material['spec']?></td>
						<td><?=format_datetime($material['updated_at'],DATE_FORMAT_YMD)?></td>
						<td>
							<a href="<?= site_url('/master/stock/edit')?>?id=<?=$material['material_id']?>" class="btn btn-info col-sm-offset-1 col-sm-5">編集</a>
							<a href="#" data-delete-id="<?=$material['material_id']?>" class="btn btn-warning col-sm-offset-1 col-sm-5"  data-toggle="modal" data-target="#delete-modal">削除</a>
						</td>
					</tr>
				<?php }?>
				</tbody>
			</table>
		<?php }?>
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
			</div>
			<form class="form-horizontal" method="post" action="<?= site_url('/master/stock/delete') ?>">
				<input type="hidden" id="deleted_id" name="id" value="">
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
					<button type="submit" class="btn btn-danger">削除する</button>
				</div>
			</form>
		</div>
	</div>
</div>
