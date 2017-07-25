<div class="container-fluid">
	<div class="form-group">
		<?php echo form_open("master/customer/save", ["class" => "form-horizontal", "role" => "form"]); ?>
			<h1>取引先登録・編集</h1>
			<?= render_message_html(); ?>
			<?= render_error_message_html(); ?>
			
			<input type="hidden" name="customer_id" value="<?= $customer_id; ?>" />
			<div class="form-group">
				<label class="control-label col-sm-3">取引先名</label>
				<div class="col-sm-4">
					<?= render_input_html('name', set_value('name', $name), NULL); ?>
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-3">担当者名</label>
				<div class="col-sm-4">
					<?= render_input_html('contact', set_value('contact', $contact), NULL); ?>
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-3">郵便番号</label>
				<div class="col-sm-4">
					<?= render_input_html('postal_code', set_value('postal_code', $postal_code), '000-0000', NULL, 
							"onKeyUp=\"AjaxZip3.zip2addr(this, '', 'address_1', 'address_2');\""); ?>
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-3">住所</label>
				<div class="col-sm-8">
					<?= render_input_html('address_1', set_value('address_1', $address_1), "愛媛県八幡浜市大平1-1-1"); ?>
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-3"></label>
				<div class="col-sm-8">
					<?= render_input_html('address_2', set_value('address_2', $address_2), "3F"); ?>
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-3">連絡先</label>
				<div class="col-sm-4">
					<?= render_input_html('phone_number', set_value('phone_number', $phone_number), "03-9999-9999"); ?>
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-3">メールアドレス</label>
				<div class="col-sm-8">
					<?= render_input_html('email_1', set_value('email_1', $email_1), "test@example.com"); ?>
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-3"></label>
				<div class="col-sm-8">
					<?= render_input_html('email_2', set_value('email_2', $email_2), "test@example.com"); ?>
				</div>
			</div>

			<div class="form-group" data-toggle="buttons">
				<label class="control-label col-sm-3">表示区分</label>
				<div class="col-sm-9">
					<?= render_radio_html('display_type', config_item('product')['display_type'], $display_type); ?>
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-3">メモ</label>
				<div class="col-sm-8">
					<?= render_input_html('memo', set_value('memo', $memo), ""); ?>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-sm-offset-4">
					<div class="col-sm-3">
						<a href="/master/customer" class="btn btn-default btn-block">戻る</a>
					</div>
					<div class="col-sm-3">
						<input type="submit" class="btn btn-success btn-block" value="保存する" />
					</div>
				</div>
			</div>
        <?php echo form_close(); ?>
	</div>
</div>
