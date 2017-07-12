<div class="container-fluid">
	<h1>在庫登録・編集</h1>
	<div class="row">
		<div class="col-md-offset-3">
		<?php 
				if($this->session->flashdata('error_message')):
			 ?>
			<div class="alert alert-dismissable alert-danger">
				
				<h4>エラー</h4>
				<p>
					<?= $this->session->flashdata('error_message')?>	
				</p>
				<?php $this->session->unmark_flash('error_message') ?>

			</div>

		<?php endif; ?>
			<form class="form-horizontal" method="POST" action="<?= site_url('/master/stock/insert') ?>">
				<div class="form-group">
					<div class="col-md-3">
							<label for="" class="col-md-offset-6 control-label">取引先名</label>
					</div>
					<div class="col-md-6">
						<select class="form-control ">
						<option>指定なし</option>
						<option selected>瀧本</option>
					</select>	
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-3">
							<label for="" class="col-md-offset-6 control-label">在庫カテコリ</label>
					</div>
					<div class="col-md-6">
						<select class="form-control ">
							<option>指定なし</option>
							<option selected>パイピング</option>
						</select>	
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-md-3">
							<label for="" class="col-md-offset-6 control-label">品番</label>
					</div>
					<div class="col-md-6">
						  <input class="  form-control " type="text" name="" id="" placeholder="">
						
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-3">
							<label for="" class="col-md-offset-6 control-label">色番</label>
					</div>
					<div class="col-md-3">
						 <input class="  form-control " type="text" name="" id="" placeholder="コード（例：GL）">	
					</div>
					<div class="col-md-4">
						 <input class="  form-control" type="text" name="" id="" placeholder="色合い（例：ゴールド）">	
					</div>	
				</div>
				<div class="form-group">
					<div class="col-md-3">
							<label for="" class="col-md-offset-6 control-label">単位</label>
					</div>
					<div class="col-md-6">
						 <select class="form-control ">
						 	<option>指定なし</option>
							<option selected="true">反</option>
						</select>	
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-3">
							<label for="" class="col-md-offset-6 control-label">仕様</label>
					</div>
					<div class="col-md-7">
						 <input class="  form-control " type="text" name="" id="" placeholder="巾：10.0、巻m：50.0">	
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-3">
							<label for="" class="col-md-offset-6 control-label">表示区分</label>
					</div>
					<div class="col-md-9">
						<div class="btn-group" data-toggle="buttons">
						  <label class="btn btn-default active">
						    <input type="radio" name="options" id="option1" autocomplete="off" checked> 表示しない
						  </label>
						  <label class="btn btn-default">
						    <input type="radio" name="options" id="option2" autocomplete="off">表示する
						  </label>
						</div>
					</div>	
				</div>
				<div class="form-group">
					<div class="col-md-3">
							<label for="" class="col-md-offset-6 control-label">発注先</label>
					</div>
					<div class="col-md-6">
						<select class="form-control ">
							<option>指定なし</option>
							<option selected="true">瀧本</option>
						</select>	
					</div>
				</div>
				<br>
				<br>
				<div class="form-group">
					<div class="col-md-2">
						<div class="col-md-offset-6">
							<a href="<?= site_url('/master/account') ?>">
							<div id="btn-return" class="col-md-offset-6 btn btn-default btn-block">戻る</div>
						</a>
						</div>	
					</div>
					<div class="col-md-4">
						<div class="col-md-6">
							<button type="submit" id="btn-save" class="col-md-offset-9 btn btn-success btn-block">保存する</button>
						</div>	
					</div>
					<div class="col-md-1">
						
					</div>	
				</div>
			</form>
		</div>
	</div>
</div>
<link href="<?= base_url('assets/css/account.css'); ?>" rel="stylesheet">
<script type="text/javascript" src="<?= base_url('assets/js/account.js'); ?>"></script>