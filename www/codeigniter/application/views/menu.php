<div class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#"></a>
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
					<li <?= ($current ?? '') === 'master' ? 'class="active"' : ''; ?>>
						<a href="<?= site_url('master') ?>">マスター管理</a>
					</li>
				<?php endif; ?>
				<li><a href="<?= site_url('auth/logout') ?>">ログアウト</a></li>
			</ul>
		</div>
	</div>
</div>
