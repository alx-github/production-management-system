<div class="container">
	<h1>取引先一覧</h1>
	<div class="row">
		<?php echo form_open("master/customer/search", ["class" => "form-horizontal", "role" => "form"]); ?>
			<div class="form-group col-xs-12">
				<div class="col-sm-4">
					<input type = "text" class="form-control input" placeholder="キーワード" 
						id="" name="" value="">
				</div>
				<div class="col-sm-2">
					<input type="submit" class="btn btn-info btn btn-block" value="検索" />
				</div>
			</div>
        <?php echo form_close(); ?>
	</div>
	
	<div class="row" align="right">
		<a class="btn btn-success" 
			href="<?php echo site_url('master/customer/create') ?>"><i class="fa fa-plus fa-fw"></i>新規登録</a>
	</div>
	
	<div class="text-right">
		<?= $this->pagination->create_links(); ?>
	</div>
	<div class="row">
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
		<div class="table-responsive">
			<table class="table table-striped table-hover">
	            <thead>
	              <tr>
	                <th class="col-sm-2">取引先名</th>
	                <th class="col-sm-3">住所</th>
	                <th class="col-sm-2">連絡先</th>
	                <th class="col-sm-3">メモ</th>
	                <th class="col-sm-1"></th>
	                <th class="col-sm-1"></th>
	              </tr>
	            </thead>
	            <tbody>
					<tr>
		                <td>AAA</td>
		                <td>〒999-9999 <br>00県C()市C01・2・3</td>
		                <td>090-999-999<br>test@example.com</td>
		                <td>メモメモメモメモメモメモメモ</td>
		                <td><a class="btn btn-info btn-block" href="<?= site_url("master/customer/update/1"); ?>">編集</a></td>
		                <td>
		                	<a class="btn btn-warning btn-block" href="#" data-toggle="modal" data-target="#delete-modal">削除</a>
		                </td>
	        		</tr>
	        		<tr>
		                <td>BBBB</td>
		                <td>〒999-9999 <br>00県C()市C01・2・3</td>
		                <td>090-999-999<br>test@example.com</td>
		                <td>メモメモメモメモメモメモメモ</td>
		                <td><a class="btn btn-info btn-block" href="<?= site_url("master/customer/update/1"); ?>">編集</a></td>
		                <td>
		                	<a class="btn btn-warning btn-block" href="#" data-toggle="modal" data-target="#delete-modal">削除</a>
		                </td>
	        		</tr>
	        		<tr>
		                <td>CCCC</td>
		                <td>〒999-9999 <br>00県C()市C01・2・3</td>
		                <td>090-999-999<br>test@example.com</td>
		                <td>メモメモメモメモメモメモメモ</td>
		                <td><a class="btn btn-info btn-block" href="<?= site_url("master/customer/update/1"); ?>">編集</a></td>
		                <td>
		                	<a class="btn btn-warning btn-block" href="#" data-toggle="modal" data-target="#delete-modal">削除</a>
		                </td>
	        		</tr>
	            </tbody>
		  	</table>
		 </div>
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

			<form class="form-horizontal" method="post" action="<?= site_url('master/customer/delete') ?>">
				<input type="hidden" name="id" value="0">
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
					<button type="submit" class="btn btn-danger js-disabled">削除する</button>
				</div>
			</form>
		</div>
	</div>
</div>
