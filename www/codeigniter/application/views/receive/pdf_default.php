<link rel="stylesheet" href="pdf.css" media="screen">
<meta http-equiv='Content-Type' content='text/html;charset=utf-8'>
<?php if ($count && $per_page) { ?>
	<?php for ($i = 0; $i < $count; $i += $per_page) { ?>
		<table cellpadding="0" cellpadding="0">
			<tbody class="header">
				<tr >
					<td rowspan="2" class="col-4"></td>
					<td rowspan="2" class="col-4"> <h1>注文書</h1></td>
					<td>
						伝票番号: 00000000-<?= (($i/$per_page+1) <10) ? '0'.($i/$per_page+1) : ($i/$per_page+1)?>
					</td>
				</tr>
				<tr>
					<td>
						発行日付:  <?=date(DATE_FORMAT_Y年M月D日)?>
					</td>
				</tr>
			</tbody>
		</table>
		<div>
			<p>取引先名が人ります。 担当者名が人ります。</p>
			<label>いつもお世話になりありがとうございます。</label>
			<br/>
			<label>下記内容にて注文をお願いいたします。</label>
			<br>
			<br>
		</div>
		<div>
			<table class="table-content" cellspacing="0">
				<thead>
					<tr>
						<th>カテゴリ</th>
						<th>品番</th>
						<th>色番</th>
						<th>数量</th>
						<th>摘要</th>
					</tr>
				</thead>
				<tbody>
				<?php for ($j = $i; $j < ($i + $per_page) AND ($j < $count) ; $j++) { ?>
					<tr>
						<td class="category">生地ネーム</td>
						<td>品番が入ります</td>
						<td>色番が入ります</td>
						<td class="quantity">20反</td>
						<td>指図Noが人ります</td>
					</tr>
				<?php } ?>
				<?php if($i == $per_page* (INT)($count/$per_page) ){ ?>
					<?php for ($j = $count; $j < $per_page*((INT)($count/$per_page)+1); $j++) { ?>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					<?php } ?>
				<?php } ?>
				</tbody>
			</table>
	</div>
	<br>
	<br>
	<br>
	<div>
		<table class="foot-content" cellpadding="0" cellpadding="0">
			<thead>
				<tr>
					<th>メモ・伝言</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td rowspan="2" class="col-8">ここにメモ伝言が記載されます。ここにメモ伝言が記載 されます。 ここにメモ伝言が記載されます。 ここにメモ伝言が記載 されます。 ここにメモ伝言が記載されます。 ここにメモ伝言が記載 されます。 ここにメモ伝言が記載されます。ここにメモ伝言が記載されます。 ここにメモ伝言が記載されます。 ここにメモ伝言が記載されます。 ここにメモ伝言が記載されます。 ここにメモ伝言が記載されます。</td>
					<td>
						株式会社大棟商事
						<br>
						.796-003
						<br>
						愛媛県八幡浜市大平1-787-1
					</td>
				</tr>
				<tr>
					<td>
						TEL: 0894-22-1585
						<br>
						FAX: 0894-24-7330
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="page-break"></div>
	<?php }?>
<?php }?>
