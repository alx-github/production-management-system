<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<h1>商品登録・編集</h1>
		</div>
	</div>
	<div class="row">
		<?=render_error_message_html()?>
	</div>
	<div class="row">
		<div class="col-sm-12">
		<?=form_open(site_url('/master/product/insert_or_update'), ['method' => 'POST', 'class' => 'form-horizontal'])?>
			<input type="hidden" name="product_id" value="<?=$product['product_id']?>" >
			<div class="form-group">
				<label for="" class="col-sm-offset-2 col-sm-2 control-label">取引先名</label>
				<div class="col-sm-3">
					<?=render_select_html_from_database('receive_order_customer_id', $customers, 'customer_id', 'name', $product['receive_order_customer_id'])?>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-offset-2 col-sm-2 control-label">商品カテゴリ</label>
				<div class="col-sm-3">
					<?=render_select_html('category', config_item('product')['categories'], $product['category'])?>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-offset-2 col-sm-2 control-label">品名</label>
				<div class="col-sm-5">
					<?=render_input_html('name', $product['name'], NULL, NULL, 'required')?>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-offset-2 col-sm-2 control-label">品番</label>
				<div class="col-sm-5">
					<?=render_input_html('part_number', $product['part_number'])?>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-offset-2 col-sm-2 control-label">表示区分</label>
				<div class="col-sm-8">
					<?=render_radio_html('display_type', config_item('product')['display_type'], $product['display_type'])?>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-offset-2 col-sm-2 control-label">単位</label>
				<div class="col-sm-1">
					<?=render_select_html('unit', config_item('product')['units'], $product['unit'])?>
				</div>
				<label for="" class="col-sm-offset-1 col-sm-1 control-label">加工賃</label>
				<div class="col-sm-1">
					<?=render_input_html('processing_fee', $product['processing_fee'], '9999', 'text-right', NULL, 'number')?>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-offset-2 col-sm-2 control-label">在庫ひも付け</label>
				<div class="col-sm-6">
					<span class="hidden" id="number_product_materials"><?=count($product['product_materials'])?></span>
					<table class="table borderless">
						<thead>
						<tr>
							<th class="col-sm-1"></th>
							<th class="col-sm-4">品番</th>
							<th class="col-sm-4">色番</th>
							<th class="col-sm-2">要尺</th>
							<th class="col-sm-1">単位</th>
						</tr>
						</thead>
						<tbody>
						<?php 
						$index = 0;
						foreach ($product['product_materials'] as $product_material)
						{
							$index ++;
							?>
							<tr id="tr-r<?=$index?>">
								<td>
									<a href="#" class="btn btn-warning js-row-delete"  id="r<?=$index?>" onclick="remove_row(this.id);">
									<span class="glyphicon glyphicon-remove"></span>
									</a>
								</td>
								<td>
									<?=render_select_html_from_database('part_numbers[' . $index . ']', $part_numbers, 'part_number', 'part_number', $product_material['part_number'], 'id="pn' . $index . '" onchange="select_part_no(this.id);"')?>
								</td>
								<td id="td-pn<?=$index?>">
									<?=render_select_html_from_database('material_ids[' . $index . ']', $product_material['colors'], 'material_id', 'color', $product_material['material_id'], 'id="co' . $index . '" onchange="select_color(this.id);"')?>
								</td>
								<td>
									<?=render_input_html('required_scales[' . $index . ']', $product_material['required_scale'], '9999', 'text-right', 'required', 'number')?>
								</td>
								<td>
									<label for="" class="control-label" id="lb-pn<?=$index?>"><?=config_item('material')['units'][$product_material['unit']] ?? ''?></label>
								</td>
							</tr>
						<?php
						} ?>
						<tr id="last-row">
							<td></td>
							<td></td>
							<td></td>
							<td>
								<a href="#" class="btn btn-info form-control" id="js-row-add">
								<span class="glyphicon glyphicon-plus"></span>
								</a>
							</td>
							<td></td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-2">
				<a href="<?= site_url('master/product'); ?>" class="btn btn-default form-control">戻る</a>
				</div>
				<div class="col-sm-offset-1 col-sm-2">
				<button type="submit" id="btn-save" class="btn btn-success btn-block">保存する</button>
				</div>
			</div>
		<<?=form_close()?>
		</div>
	</div>
</div>

<div class="hidden">
	<?php $index = 'ROWINDEX'; ?>
	<table id="table-hidden">
		<tr id="tr-r<?=$index?>">
			<td>
				<a href="#" class="btn btn-warning js-row-delete"  id="r<?=$index?>" onclick="remove_row(this.id);">
				<span class="glyphicon glyphicon-remove"></span>
				</a>
			</td>
			<td>
				<?=render_select_html_from_database('part_numbers[' . $index . ']', $part_numbers, 'part_number', 'part_number', NULL, 'id="pn' . $index . '" onchange="select_part_no(this.id);"')?>
			</td>
			<td id="td-pn<?=$index?>">
				<?=render_select_html('material_ids[' . $index . ']', [], NULL)?>
			</td>
			<td>
				<?=render_input_html('required_scales[' . $index . ']', NULL, '9999', 'text-right', NULL, 'number')?>
			</td>
			<td>
				<label for="" class="control-label" id="lb-pn<?=$index?>"></label>
			</td>
		</tr>
	</table>
	<div id="select-hidden"><?=render_select_html('', [], NULL)?></div>
</div>
