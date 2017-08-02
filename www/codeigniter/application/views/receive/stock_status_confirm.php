<div class="container-fluid">
	<div class="row">
		<?=render_message_html() ?>
		<?=render_error_message_html() ?>
	</div>
	<div class="form-group">
		<?php echo form_open("/receive", ["class" => "form-horizontal", "role" => "form"]); ?>
			<h1>在庫状況チェック</h1>
			
			<div class="form-group">
				<div class="col-sm-5 col-md-6">
					<div class="row">
						<label class="control-label col-sm-6"></label>
						<div class="col-sm-4">
							<p class="form-control-static"></p>
						</div>
					</div>
					<div class="row">
						<label class="control-label col-sm-3">取引先</label>
						<div class="col-sm-4">
							<p class="form-control-static">瀧本</p>
						</div>
					</div>
					<div class="row">
						<label class="control-label col-sm-3">依頼日</label>
						<div class="col-sm-4">
							<p class="form-control-static">2017/07/01</p>
						</div>
					</div>
				</div>
				<div class="col-sm-7 col-md-6">
					<div class="table-responsive">
						<table class="table table-hover">
				            <thead>
				              <tr>
				                <th class="col-sm-3"></th>
				                <th class="col-sm-3">発注ID</th>
				                <th class="col-sm-3">発注日</th>
				                <th class="col-sm-3"></th>
				              </tr>
				            </thead>
				            <tbody>
								<tr>
									<td>発注履歴</td>
									<td>99999</td>
			                		<td>2017/07/01</td>
			                		<td>
			                			<a class="btn btn-default btn-sm btn-block" href="<?= site_url("order/order_status/1"); ?>">発注状況</a>
			                		</td>
			                	</tr>
								<tr>
									<td></td>
									<td>99999</td>
			                		<td>2017/07/02</td>
			                		<td><a class="btn btn-default btn-sm btn-block" href="<?= site_url("order/order_status/1"); ?>">発注状況</a></td>
			                	</tr>
			                </tbody>
			            </table>
			         </div>
				</div>
			</div>
				
			<div class="row">
				<div class="table-responsive">
					<table class="table table-hover">
			            <thead>
			              <tr>
			                <th class="col-sm-1">指図No</th>
			                <th class="col-sm-1">品番</th>
			                <th class="col-sm-3">品名（アイテム名）</th>
			                <th class="col-sm-1">数量</th>
			                <th class="col-sm-1">出荷予定日</th>
			                <th class="col-sm-2">品番・色番</th>
			                <th class="col-sm-1">必要量</th>
			                <th class="col-sm-1">在庫量</th>
			                <th class="col-sm-1">不足</th>
			              </tr>
			            </thead>
			            <tbody>
							<tr>
				                <td>C-00000</td>
				                <td></td>
				                <td>品名A（◯◯高校）</td>
				                <td>999</td>
				                <td>2017/08/01</td>
				                <td>生地Bの品番色番</td>
				                <td>1000</td>
				                <td>1500</td>
				                <td></td>
			        		</tr>
			        		<tr>
				                <td colspan="2" rowspan="1" style="vertical-align:middle;">
				                </td>
				                <td colspan="3" rowspan="1" style="vertical-align:middle;">
								</td>
				                <td>生地Bの品番色番</td>
				                <td>500</td>
				                <td>300</td>
				                <td style="color: red">-200</td>
			        		</tr>
			        		<tr>
				                <td>C-00002</td>
				                <td>555555</td>
				                <td>品名B</td>
				                <td>100</td>
				                <td>2017/08/01</td>
				                <td>生地Aの品番色番</td>
				                <td>100</td>
				                <td>100</td>
				                <td></td>
			        		</tr>
			        		<tr>
				                <td colspan="2" rowspan="1" style="vertical-align:middle;">
				                </td>
				                <td colspan="3" rowspan="1" style="vertical-align:middle;">
								</td>
				                <td>生地Bの品番色番</td>
				                <td>100</td>
				                <td>100</td>
				                <td></td>
			        		</tr>
			        		<tr>
				                <td>C-00003</td>
				                <td>444444</td>
				                <td></td>
				                <td>500</td>
				                <td>2017/08/01</td>
				                <td>生地Dの品番色番</td>
				                <td>50</td>
				                <td>5000</td>
				                <td></td>
			        		</tr>
			            </tbody>
				  	</table>
				 </div>
			 </div>

			<div class="form-group">
				<div class="col-md-offset-2">
					<div class="col-sm-4 col-md-3">
						<a href="/receive/form" class="btn btn-default btn-block">戻る</a>
					</div>
					<div class="col-sm-4 col-md-3">
						<a href="/receive/create_pdf" class="btn btn-success btn-block">発注書PDF</a>
					</div>
					<div class="col-sm-4 col-md-3">
						<a id="create-pdf-send-email" href="/receive/create_pdf_send_mail" class="btn btn-success btn-block">発注書PDFを送信する</a>
					</div>
				</div>
			</div>
        <?php echo form_close(); ?>
	</div>
</div>
<link href="<?= site_url('assets/css/common.css'); ?>" rel="stylesheet">
<script>
$(document).ready(function(){
	$('#create-pdf-send-email').click(function (e){
		e.preventDefault();
		window.open("/receive/create_pdf_send_mail");
		location.replace('/receive/save_confirm');
	});
});
</script>