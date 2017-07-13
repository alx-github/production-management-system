<div class="navbar navbar-inverse">
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
				<li class="dropdown <?= ($current ?? '') === 'production' ? 'active' : '' ?>">
					<a href="<?= site_url('production') ?>">生産管理 <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="/shipping">取引先・商品ごとの出荷一覧</a><li>
					</ul>
				</li>
				<?php if ($is_admin): ?>
					<li <?= ($current ?? '') === 'receive' ? 'class="active"' : '' ?>>
						<a href="<?= site_url('receive') ?>">受注管理</a>
					</li>
					<li <?= ($current ?? '') === 'request' ? 'class="active"' : '' ?>>
						<a href="<?= site_url('request') ?>">請求管理</a>
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
							<li><a href="/master/stock">在庫一覧</a><li>
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
$('ul.nav li.dropdown').hover(function() {
	$(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(100);
}, function() {
	$(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(100);
});
</script>
