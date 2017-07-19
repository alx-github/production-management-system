<div class="container-fluid">
	<div class="form-group">
		<?php echo form_open("master/customer/save", ["class" => "form-horizontal", "role" => "form"]); ?>
			<h1>取引先登録・編集</h1>
			
			<?php if ($this->session->flashdata('message')): ?>
				<div class="alert alert-dismissible alert-info">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>メッセージ</strong>
					<p><?= $this->session->flashdata('message') ?></p>
				</div>
				<?php $this->session->unmark_flash('message'); ?>
			<?php endif; ?>
			<?php if ($this->session->flashdata('error_message')): ?>
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>エラー</strong>
					<p><?= $this->session->flashdata('error_message') ?></p>
				</div>
				<?php $this->session->unmark_flash('error_message'); ?>
			<?php endif; ?>
			
			<input type="hidden" name="id" value="0" />
			<div class="form-group">
				<label class="control-label col-sm-3">取引先名</label>
				<div class="col-sm-4">
					<input type = "text" class="form-control" id="" name="" 
						value="">
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-3">担当者名</label>
				<div class="col-sm-4">
					<input type = "text" class="form-control" id="" name="" 
						value="">
				</div>
			</div>
				
			<div class="form-group">
				<label class="control-label col-sm-3">郵便番号</label>
				<div class="col-sm-4">
					<input type = "text" class="form-control" id="" name="" placeholder="000-0000" 
						value="">
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-3">住所</label>
				<div class="col-sm-8">
					<input type = "text" class="form-control" id="" name="" placeholder="愛媛県八幡浜市大平1-1-1"
						value="">
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-3"></label>
				<div class="col-sm-8">
					<input type = "text" class="form-control" id="" name="" placeholder="3F"
						value="">
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-3">連絡先</label>
				<div class="col-sm-4">
					<input type = "text" class="form-control" id="" name="" placeholder="03-9999-9999"
						value="">
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-3">メールアドレス</label>
				<div class="col-sm-8">
					<input type = "text" class="form-control" id="" name="" placeholder="test@example.com"
						value="">
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-3"></label>
				<div class="col-sm-8">
					<input type = "text" class="form-control" id="" name="" placeholder="test@example.com"
						value="">
				</div>
			</div>
			
			<div class="form-group" data-toggle="buttons">
				<label class="control-label col-sm-3">表示区分</label>
				<div class="col-sm-9 btn-group" data-toggle="buttons">
					<label class="btn btn-default active col-sm-3">
						<input type="radio" name="options" id="option1" autocomplete="off" checked> 表示しない
					</label>
					<label class="btn btn-default col-sm-3">
						<input type="radio" name="options" id="option1" autocomplete="off" checked> 受注先のみ
					</label>
					<label class="btn btn-default col-sm-3">
						<input type="radio" name="options" id="option1" autocomplete="off" checked> 発注先のみ
					</label>
					<label class="btn btn-default col-sm-3">
						<input type="radio" name="options" id="option1" autocomplete="off" checked> 両方
					</label>
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
<link href="<?= site_url('assets/css/common.css'); ?>" rel="stylesheet">
