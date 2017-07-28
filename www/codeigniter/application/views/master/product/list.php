<div class="container-fluid">
	<h1>商品一覧</h1>
	<div class="row">
		<?=render_message_html() ?>
		<?=render_error_message_html() ?>
	</div>
	<div class="row">
		<div class="col-sm-12">
		<?=form_open('', ['method' => 'GET', 'id' => 'frm-search'])?>
		<?=render_input_hidden_html('sort_column', $sort_column ?? NULL)?>
		<?=render_input_hidden_html('sort_direction', $sort_direction ?? NULL)?>
			<div class="form-group">
				<label for="" class="col-sm-1 control-label">取引先</label>
				<div class="col-sm-3">
					<?=render_select_html_from_database('customer_id', $customers, 'customer_id', 'name', $customer_id ?? '')?>
				</div>
				<div class="col-sm-2">
					<?=render_input_html('keyword', $keyword ?? '', 'キーワード', NULL, 'size="10"')?>
				</div>
				<div class="col-sm-1">
					<button type="submit" class="btn btn-primary">検索</button>
				</div>
			</div>
		<?=form_close()?>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-10">
			<?php echo $this->pagination->create_links() ?>
		</div>
		<div class="col-sm-2">
			<a href="<?= site_url('/master/product/create') ?>" class="btn btn-success btn-block pagination">新規登録</a>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-12">
		<?php if ($products) { ?>
			<table class="table table-hover ">
				<thead>
				<tr>
					<th>商品カテゴリ<?=render_sort_column('category')?></th>
					<th>商品名<?=render_sort_column('name')?></th>
					<th>品番<?=render_sort_column('part_number')?></th>
					<th>更新日<?=render_sort_column('updated_at')?></th>
					<th class="col-sm-2"></th>
				</tr>
				</thead>
				<tbody>
				<?php 
					$categories = config_item('product')['categories'];
					foreach ($products as $product) { ?>
					<tr>
						<td><?=$categories[$product['category']] ?? ''?></td>
						<td><?=$product['name']?></td>
						<td><?=$product['part_number']?></td>
						<td><?=format_datetime($product['updated_at'], DATE_FORMAT_YMD)?></td>
						<td>
							<a href="<?= site_url('/master/product/edit')?>?id=<?=$product['product_id']?>" class="btn btn-info col-sm-offset-1 col-sm-5">編集</a>
							<a href="#" data-delete-id="<?=$product['product_id']?>" class="btn btn-warning col-sm-offset-1 col-sm-5"  data-toggle="modal" data-target="#delete-modal">削除</a>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		<?php } ?>
		</div>
  	</div>
	<div class="row">
		<div class="col-sm-12">
			<?php echo $this->pagination->create_links() ?>
		</div>
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

			<form class="form-horizontal" method="post" action="<?= site_url('master/product/delete') ?>">
				<input type="hidden" name="delete_id" value="">
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
					<button type="submit" class="btn btn-danger">削除する</button>
				</div>
			</form>
		</div>
	</div>
</div>
