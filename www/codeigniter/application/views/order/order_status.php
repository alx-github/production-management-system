<div class="container">
	<div class="row form-group">
		<?php echo form_open("order/save", ["class" => "form-horizontal", "role" => "form"]); ?>
			<h1>発注状況</h1>
			
			<input type="hidden" name="id" value="0" />
		        	 
			<div class="form-group">
				<div class="col-sm-4">
					<label class="control-label col-sm-6">取引先</label>
					<div class="col-sm-4">
						<p class="form-control-static">瀧本</p>
					</div>
				</div>
				<div class="col-sm-8">
					<label class="control-label col-sm-2 col-md-2">発注先</label>
					<div class="col-sm-6">
						<p class="form-control-static">瀧本</p>
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-sm-4">
					<label class="control-label col-sm-6">依頼日</label>
					<div class="col-sm-4">
						<p class="form-control-static">2017/07/01</p>
					</div>
				</div>
				<div class="col-sm-8">
					<label class="control-label col-sm-2 col-md-2">発注日</label>
					<div class="col-sm-6">
						<p class="form-control-static">2017/07/01</p>
					</div>
				</div>
			</div>
				
			<div class="row">
				<div class="table-responsive">
					<table class="table table-striped table-hover">
			            <thead>
			              <tr>
			                <th class="col-sm-1">指図No</th>
			                <th class="col-sm-1">品番</th>
			                <th class="col-sm-3">品名（アイテム名）</th>
			                <th class="col-sm-1">数量</th>
			                <th class="col-sm-1">出荷予定日</th>
			                <th class="col-sm-3">品番・色番</th>
			                <th class="col-sm-2">数量</th>
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
				                <td>500</td>
			        		</tr>
			        		<tr>
				                <td colspan="2" rowspan="2" style="vertical-align:middle;">
									<div class="btn btn-info btn-block btn-lg">入荷済み</div>
				                </td>
				                <td colspan="3" rowspan="2" style="vertical-align:middle;">
				                	<a href="/stock" class="btn btn-default btn-lg">入庫</a>
								</td>
				                <td>2017/07/07入荷</td>
				                <td>200</td>
			        		</tr>
			        		<tr>
				                <td>2017/07/08入荷</td>
				                <td>300</td>
			        		</tr>
			        		
			        		<tr>
				                <td>C-00002</td>
				                <td>555555</td>
				                <td>品名B</td>
				                <td>500</td>
				                <td>2017/08/01</td>
				                <td>生地Aの品番色番</td>
				                <td>200</td>
			        		</tr>
			        		<tr>
				                <td colspan="2" rowspan="2" style="vertical-align:middle;">
									<div class="btn btn-warning btn-block btn-lg">未入荷</div>
				                </td>
				                <td colspan="3" rowspan="2" style="vertical-align:middle;">
				                	<a href="/stock" class="btn btn-default btn-lg">入庫</a>
								</td>
				                <td></td>
				                <td></td>
			        		</tr>
			        		<tr>
				                <td></td>
				                <td></td>
			        		</tr>
			            </tbody>
				  	</table>
				 </div>
			 </div>

			<div class="form-group">
				<div class="col-sm-offset-4">
					<div class="col-sm-3">
						<a href="/order" class="btn btn-default btn-block">戻る</a>
					</div>
				</div>
			</div>
        <?php echo form_close(); ?>
	</div>
</div>
