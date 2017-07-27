<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>生産管理システム</title>
		<link href="<?= base_url('assets/libs/umi/css/bootstrap.min.css'); ?>" rel="stylesheet">
		<link href="<?= base_url('assets/libs/umi/css/jquery-ui.min.css'); ?>" rel="stylesheet">
		<link href="<?= base_url('assets/libs/umi/css/jquery.timepicker.min.css'); ?>" rel="stylesheet">
		<link href="<?= base_url('assets/libs/umi/css/jquery-ui-timepicker-addon.min.css'); ?>" rel="stylesheet">
		<link href="<?= base_url('assets/libs/select2/css/select2.min.css'); ?>" rel="stylesheet">
		<link href="<?= base_url('assets/css/app.css'); ?>" rel="stylesheet">
		<script src="<?= base_url('assets/libs/jquery.min.js'); ?>"></script>
		<script src="<?= base_url('assets/js/ajaxzip3.js'); ?>"></script>
	</head>
	<body>
		<?php if (strpos(current_url(), '/auth') === false): ?>
			<?= $this->load->view('menu', ['is_admin' => $is_admin], true) ?>
		<?php endif; ?>
		
		<div class="content">
			<?= $content ?>
		</div>
		
		<script src="<?= base_url('assets/libs/umi/js/bootstrap.min.js'); ?>"></script>
		<script src="<?= base_url('assets/libs/umi/js/jquery-ui.min.js'); ?>"></script>
		<script src="<?= base_url('assets/libs/umi/js/jquery.timepicker.min.js'); ?>"></script>
		<script src="<?= base_url('assets/libs/umi/js/jquery-ui-timepicker-addon.min.js'); ?>"></script>
		<script src="<?= base_url('assets/libs/umi/js/jquery-ui-timepicker-ja.js'); ?>"></script>
		<script src="<?= base_url('assets/libs/select2/js/select2.min.js'); ?>"></script>
		<script src="<?= base_url('assets/libs/select2/js/i18n/ja.js'); ?>"></script>
		<script src="<?= base_url('assets/js/app.js'); ?>"></script>
	</body>
</html>
