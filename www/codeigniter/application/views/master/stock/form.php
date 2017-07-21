<div class="container-fluid">
	<h1>在庫登録・編集</h1>
	<div class="row">
		<div class="col-sm-offset-3">
		<?php if($this->session->flashdata('error_message')) { ?>
			<div class="alert alert-dismissable alert-danger">
				<h4>エラー</h4>
				<p>
					<?= $this->session->flashdata('error_message')?>	
				</p>
				<?php $this->session->unmark_flash('error_message') ?>
			</div>
		<?php } ?>
			<form class="form-horizontal col-sm-12" method="POST" action="<?=site_url( (empty($material['material_id'])) ? '/master/stock/insert' : '/master/stock/update' ) ?>">
				<input type="hidden" name="material_id" value="<?= empty($material['material_id']) ? NULL : $material['material_id'] ;?>" >
				<div class="form-group">
					<div class="col-sm-3">
							<label for="" class="col-sm-offset-6 control-label">取引先名</label>
					</div>
					<div class="col-sm-2">
						<?=render_select_html_from_database('receive_order_customer_id',$list_customers, 'customer_id', 'name', $material['receive_order_customer_id'], TRUE) ?>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3">
							<label for="" class="col-sm-offset-6 control-label">在庫カテコリ</label>
					</div>
					<div class="col-sm-2">
						<?=render_select_html('category', config_item('category'), $material['category'], FALSE) ?>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-3">
							<label for="" class="col-sm-offset-6 control-label">品番</label>
					</div>
					<div class="col-sm-3">
						  <input class="form-control" type="text" name="part_number" value="<?=$material['part_number']?>" id="" placeholder="" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3">
							<label for="" class="col-sm-offset-6 control-label">色番</label>
					</div>
					<div>
						<div class="col-sm-2">
							 <input class="form-control" type="text" name="color_number_code" value="<?=$material['color_number_code']?>" id="" placeholder="コード（例：GL）">
						</div>
						<div class="col-sm-2">
							 <input class="form-control" type="text" name="color_number_tint" value="<?=$material['color_number_tint']?>" id="" placeholder="色合い（例：ゴールド）">
						</div>	
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3">
							<label for="" class="col-sm-offset-6 control-label">単位</label>
					</div>
					<div class="col-sm-1">
						 <select class="form-control" name="unit" required>
						 	<option value="">指定なし</option>
							<option value="1" selected>反</option>
						</select>	
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3">
							<label for="" class="col-sm-offset-6 control-label">仕様</label>
					</div>
					<div class="col-sm-4">
						 <input class="form-control" type="text" name="spec" value="<?=$material['spec']?>" id="" placeholder="巾：10.0、巻m：50.0">	
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3">	
							<label for="" class="col-sm-offset-6 control-label">表示区分</label>
					</div>
					<div class="col-sm-9">
						<?=render_radio_html('display_type', config_item('display_type'), $material['display_type']) ?>
					</div>	
				</div>
				<div class="form-group">
					<div class="col-sm-3">
						<label for="" class="col-sm-offset-6 control-label">発注先</label>
					</div>
					<div class="col-sm-2">
						<?=render_select_html_from_database('send_order_customer_id',$list_customers, 'customer_id', 'name', $material['send_order_customer_id'], TRUE) ?>
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
			</form>
		</div>
	</div>
</div>
