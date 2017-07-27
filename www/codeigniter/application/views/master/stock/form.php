<div class="container-fluid">
	<h1>在庫登録・編集</h1>
	<div class="row">
		<?=render_error_message_html() ?>
	</div>
	<div class="row">
		<div class="col-sm-offset-3">
			<?php echo form_open(site_url( (empty($material['material_id'])) ? '/master/stock/insert' : '/master/stock/update' ), 'class="form-horizontal col-sm-12"')?>
				<?=render_input_hidden_html('material_id', $material['material_id'] ?? '') ?>
				<div class="form-group">
					<div class="col-sm-3">
							<label for="" class="col-sm-offset-6 control-label">取引先名</label>
					</div>
					<div class="col-sm-2">
						<?=render_select_html_from_database('receive_order_customer_id', $list_receive_customers, 'customer_id', 'name', $material['receive_order_customer_id']) ?>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3">
							<label for="" class="col-sm-offset-6 control-label">在庫カテコリ</label>
					</div>
					<div class="col-sm-2">
						<?=render_select_html('category', config_item('material')['categories'], $material['category']) ?>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-3">
							<label for="" class="col-sm-offset-6 control-label">品番</label>
					</div>
					<div class="col-sm-3">
						<?=render_input_html('part_number', $material['part_number'] ?? '', NULL, NULL, 'required') ?>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3">
							<label for="" class="col-sm-offset-6 control-label">色番</label>
					</div>
					<div>
						<div class="col-sm-2">
							<?=render_input_html('color_number_code', $material['color_number_code'] ?? '', 'コード（例：GL）') ?>
						</div>
						<div class="col-sm-2">
							<?=render_input_html('color_number_tint', $material['color_number_tint'] ?? '', '色合い（例：ゴールド）') ?>
						</div>	
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3">
						<label for="" class="col-sm-offset-6 control-label">単位</label>
					</div>
					<div class="col-sm-1">
						<?=render_select_html('unit', config_item('material')['units'], $material['unit']) ?>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3">
							<label for="" class="col-sm-offset-6 control-label">仕様</label>
					</div>
					<div class="col-sm-4">
						<?=render_input_html('spec', $material['spec'], '巾：10.0、巻m：50.0') ?>	
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3">	
							<label for="" class="col-sm-offset-6 control-label">表示区分</label>
					</div>
					<div class="col-sm-9">
						<?=render_radio_html('display_type', config_item('material')['display_type'], $material['display_type']) ?>
					</div>	
				</div>
				<div class="form-group">
					<div class="col-sm-3">
						<label for="" class="col-sm-offset-6 control-label">発注先</label>
					</div>
					<div class="col-sm-2">
						<?=render_select_html_from_database('send_order_customer_id', $list_send_customers, 'customer_id', 'name', $material['send_order_customer_id']) ?>
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
							<a href="<?= site_url('/master/stock') ?>" class="btn btn-default btn-block">戻る</a>
						</div>	
					</div>
					<div class="col-sm-3">
						<div class="col-sm-offset-1 col-sm-7">
							<button type="submit" id="btn-save" class="btn btn-success btn-block">保存する</button>
						</div>	
					</div>
				</div>
			<?php echo form_close() ?>
		</div>
	</div>
</div>
