<?php
$current_url = current_url();
if (strpos($current_url, '/master') !== false)
{
	$current = 'master';
}
if (strpos($current_url, '/production') !== false)
{
	$current = 'production';
}
if (strpos($current_url, '/receive') !== false)
{
	$current = 'receive';
}
if (strpos($current_url, '/shipping') !== false)
{
	$current = 'shipping';
}
if (strpos($current_url, 'stock') !== false)
{
	$current = 'stock';
}
if (strpos($current_url, 'master/stock') !== false)
{
	$current = 'master';
}
if (strpos($current_url, '/order') !== false)
{
	$current = 'order';
}
?>
<div class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<a href="<?= site_url('production') ?>" class="navbar-brand">生産管理システム</a>
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
			<ul class="nav navbar-nav">
				<li <?= ($current ?? '') === 'production' ? 'class="active"' : '' ?>>
					<a href="<?= site_url('production') ?>">生産管理</a>
				</li>
				<?php if ($is_admin): ?>
					<li <?= ($current ?? '') === 'receive' ? 'class="active"' : '' ?>>
						<a href="<?= site_url('receive') ?>">受注管理</a>
					</li>
					<li <?= ($current ?? '') === 'shipping' ? 'class="active"' : '' ?>>
						<a href="<?= site_url('shipping') ?>">請求管理</a>
					</li>
					<li <?= ($current ?? '') === 'stock' ? 'class="active"' : '' ?>>
						<a href="<?= site_url('stock') ?>">在庫管理</a>
					</li>
					<li <?= ($current ?? '') === 'order' ? 'class="active"' : '' ?>>
						<a href="<?= site_url('order') ?>">発注管理</a>
					</li>
				<?php endif; ?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<?php if ($is_admin): ?>
					<li class="dropdown <?= ($current ?? '') === 'master' ? 'active' : '' ?>">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">マスター管理 <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="/master/customer">取引先一覧</a><li>
							<li><a href="/master/product">商品一覧</a><li>
							<li><a href="/master/material">在庫一覧</a><li>
							<li><a href="/master/account">アカウント一覧</a><li>
						</ul>
					</li>
				<?php endif; ?>
				<li><a href="<?= site_url('auth/logout') ?>">ログアウト</a></li>
			</ul>
		</div>
	</div>
</div>

<script>
	$('ul.nav li.dropdown').hover(function () {
		$(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(100);
	}, function () {
		$(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(100);
	});
</script>
