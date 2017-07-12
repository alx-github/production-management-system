<div class="container">
	<h1><strong>在庫登録・編集</strong></h1>
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
			<form class="form-horizontal">
				<div class="form-group">
					<div class="col-md-3">
							<label for="" class="col-md-offset-6 control-label">取引先名</label>
					</div>
					<div class="col-md-6">
						<select class="form-control stock-select" style="width: 70%;">
						<option>瀧本</option>
					</select>	
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-3">
							<label for="" class="col-md-offset-6 control-label">在庫カテコリ</label>
					</div>
					<div class="col-md-6">
						<select class="form-control stock-select" style="width: 70%;">
							<option>パイピング</option>
						</select>	
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-md-3">
							<label for="" class="col-md-offset-6 control-label">品番</label>
					</div>
					<div class="col-md-6">
						  <input class=" form-account form-control " type="text" name="" id="" placeholder="">
						
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-3">
							<label for="" class="col-md-offset-6 control-label">色番</label>
					</div>
					<div class="col-md-3">
						 <input class=" form-account form-control " type="text" name="" id="" placeholder="コード（例：GL）">	
					</div>
					<div class="col-md-4">
						 <input class=" form-account form-control" type="text" name="" id="" placeholder="色合い（例：ゴールド）">	
					</div>	
				</div>
				<div class="form-group">
					<div class="col-md-3">
							<label for="" class="col-md-offset-6 control-label">単位</label>
					</div>
					<div class="col-md-6">
						 <select class="form-control stock-select" style="width: 50%;">
							<option>反</option>
						</select>	
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-3">
							<label for="" class="col-md-offset-6 control-label">仕様</label>
					</div>
					<div class="col-md-7">
						 <input class=" form-account form-control " type="text" name="" id="" placeholder="巾：10.0、巻m：50.0">	
					</div>
				</div>
				<!-- <div class="form-group">
					<div class="col-md-3">
							<label for="password" class="col-md-offset-6 control-label">パスワード</label>
					</div>
					<div class="col-md-6">
						<div class="input-group">
						  <input class=" form-account form-control " type="password" name="" id="password" placeholder="英数字記号">
						  <span class=" btn input-group-addon form-account" id="">ランダム</span>
						</div>
						
					</div>	
				</div> -->
				<div class="form-group">
					<div class="col-md-3">
							<label for="" class="col-md-offset-6 control-label">表示区分</label>
					</div>
					<div class="col-md-9">
						<div class="btn-group" role="group" aria-label="Basic example">
						  <button type="button" class="btn btn-default stock-select">表示しない</button>
						  <button type="button" class="btn btn-default stock-select">表示する</button>
						</div>
					</div>	
				</div>
				<div class="form-group">
					<div class="col-md-3">
							<label for="" class="col-md-offset-6 control-label">発注先</label>
					</div>
					<div class="col-md-6">
						<select class="form-control stock-select" style="width: 70%;">
							<option>瀧本</option>
						</select>	
					</div>
				</div>
				<br>
				<br>
				<div class="form-group">
					<div class="col-md-3">
						<button id="btn-return" class="col-md-offset-6 btn btn-default">戻る</button>
							
					</div>
					<div class="col-md-3">
						<button type="submit" id="btn-save" class="col-md-offset-6 btn btn-success">保存する</button>
						
					</div>	
				</div>
			</form>
		</div>
	</div>
</div>
