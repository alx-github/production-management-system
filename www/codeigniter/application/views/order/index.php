<div class="container-fluid">
	<h1>発注一覧</h1>
	<div class="form-group">
		<?php echo form_open("order/search", ["class" => "form-horizontal", "role" => "form"]); ?>
			<div class="row col-xs-12 col-sm-12">
				<div class="col-sm-2">
					<input type = "text" class="form-control input" placeholder="発注ID" 
						id="" name="" value="">
				</div>
				<div class="col-sm-2">
					<input type = "text" class="form-control input" placeholder="キーワード" 
						id="" name="" value="">
				</div>
				<div class="col-sm-6">
					<div class="input-group">
						<div class="input-group-addon">発注日</div>
						<input type="text" class="form-control date" id="date-start" size="10">
						<div class="input-group-addon addon-to">～</div>
						<input type="text" class="form-control date" id="date-end" size="10">
					</div>
				</div>
				<div class="col-sm-1">
					<input type="submit" class="btn btn-primary" value="検索" />
				</div>
			</div>
        <?php echo form_close(); ?>
	</div>
	
	<div class="text-right">
		<?= $this->pagination->create_links(); ?>
	</div>
	<div class="row col-sm-12">
		<ul class="pagination" style="margin-bottom:0%;">
				<li><a href=""><<</a></li>
				<li class="active"><a href="">1</a></li>
				<li><a href="">2</a></li>
				<li><a href="">3</a></li>
				<li><a href="">4</a></li>
				<li><a href="">5</a></li>
				<li><a href="">6</a></li>
				<li><a href="">7</a></li>
				<li><a href="">8</a></li>
				<li><a href="">>></a></li>
		</ul>
		<div class="col-sm-12 table-responsive">
			<table class="table table-hover">
	            <thead>
	              <tr>
	                <th class="col-sm-1">発注ID</th>
	                <th class="col-sm-3">取引先</th>
	                <th class="col-sm-2">発注日</th>
	                <th class="col-sm-2">ステータス</th>
	                <th class="col-sm-2">更新日</th>
	                <th class="col-sm-1"></th>
	                <th class="col-sm-1"></th>
	              </tr>
	            </thead>
	            <tbody>
					<tr>
		                <td>123</td>
		                <td>◯◯繊維</td>
		                <td>2017/06/30</td>
		                <td>一部入荷</td>
		                <td>2017/07/02</td>
		                <td><a class="btn btn-default btn-block" href="<?= site_url("order/order_status/1"); ?>">発注状況</a></td>
		                <td>
		                	<a class="btn btn-warning btn-block" href="#" data-toggle="modal" data-target="#delete-modal">キャンセル</a>
		                </td>
	        		</tr>
	        		<tr>
		                <td>122</td>
		                <td>△△株式会社</td>
		                <td>2017/06/30</td>
		                <td>発注</td>
		                <td>2017/07/02</td>
		                <td><a class="btn btn-default btn-block" href="<?= site_url("order/order_status/1"); ?>">発注状況</a></td>
		                <td>
		                	<a class="btn btn-warning btn-block" href="#" data-toggle="modal" data-target="#delete-modal">キャンセル</a>
		                </td>
	        		</tr>
	            </tbody>
		  	</table>
		 </div>
		 <ul class="pagination col-sm-12" style="margin-bottom:0%;">
				<li><a href=""><<</a></li>
				<li class="active"><a href="">1</a></li>
				<li><a href="">2</a></li>
				<li><a href="">3</a></li>
				<li><a href="">4</a></li>
				<li><a href="">5</a></li>
				<li><a href="">6</a></li>
				<li><a href="">7</a></li>
				<li><a href="">8</a></li>
				<li><a href="">>></a></li>
		</ul>
	 </div>
	 <div class="text-right">
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

			<form class="form-horizontal" method="post" action="<?= site_url('order/delete') ?>">
				<input type="hidden" name="id" value="0">
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
					<button type="submit" class="btn btn-danger js-disabled">削除する</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function() {
	$('#date-start').datepicker({
		dateFormat: 'yy/mm/dd',
	});
	$('#date-end').datepicker({
		dateFormat: 'yy/mm/dd',
		useCurrent: false
	});
	$('#date-start').on('change', function () {
		$('#date-end').datepicker('option', 'minDate', $('#date-start').val());
	});
	$('#date-end').on('change', function () {
		$('#date-start').datepicker('option', 'maxDate', $('#date-end').val());
	});
});
</script>
<link href="<?= site_url('assets/css/shipping.css'); ?>" rel="stylesheet">
