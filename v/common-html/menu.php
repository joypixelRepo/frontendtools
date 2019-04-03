
<!-- Page Loader -->
<div class="page-loader-wrapper">
	<div class="loader">        
		<div class="loading-bar"></div>
		<div class="loading-bar"></div>
		<div class="loading-bar"></div>
		<div class="loading-bar"></div>
		<p>Cargando...</p>
	</div>
</div>
<!-- Overlay For Sidebars -->
<div class="overlay"></div><!-- Search  -->
<div class="search-bar">
	<form id="search-form" action="/action/search" method="GET">
		<div class="search-icon"> <i class="material-icons">search</i> </div>
		<input type="text" name="keys" placeholder="Explora en Front End Tools..." autocomplete="off">
		<div class="close-search"> <i class="material-icons">close</i> </div>
	</form>
</div>
<!-- Top Bar -->
<nav class="navbar">
	<div class="col-12">
		<div class="navbar-header">
			<a href="javascript:void(0);" class="bars"></a>
			<a href="/">
				<div class="navbar-brand frontendtools-logo">
					<!-- show only on desktop -->
					<div class="d-none visible-desktop">
						<? include $_SERVER['DOCUMENT_ROOT'].'/assets/images/frontendtools-logo-desktop.svg'; ?>
					</div>
					<!-- show only on tablet & mobile -->
					<div class="d-none visible-mobile">
						<? include $_SERVER['DOCUMENT_ROOT'].'/assets/images/frontendtools-logo-mobile.svg'; ?>
					</div>
				</div>
			</a>
		</div>
		<ul class="nav navbar-nav navbar-left">
			<li><a href="javascript:void(0);" class="ls-toggle-btn" data-close="true"><i class="zmdi zmdi-swap"></i></a></li>
			<li class="hidden-sm-down"><a href="/<?= $_SERVER['VIEWS'] ?>/newCode" title="Añadir nuevo código útil"><i class="zmdi zmdi-code"></i></a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="zmdi zmdi-apps"></i>
				<div class="notify"><span class="heartbit"></span><span class="point"></span></div>
			</a>
			<ul class="dropdown-menu">
				<li class="header">CATEGORÍAS</li>
				<li class="body">
					<ul class="menu list-unstyled category-list-menu">
						<?php foreach ($categories as $category) { ?>
							<li>
								<a href="/<?= $_SERVER['VIEWS'] ?>/util?c=<?= $category['descriptive_name'] ?>">
									<img src="<?= $category['category_logo'] ?>">
									<div class="menu-info">
										<h4><?= $category['category_name'] ?></h4>
										<p> <i class="material-icons">remove_red_eye</i> <?= isset($category['count']) && $category['count'] > 0 ? $category['count'] : 0 ?> </p>
									</div>
								</a> 
							</li>
						<?php } ?>
					</ul>
				</li>
				<li class="footer"> <a href="/<?= $_SERVER['VIEWS'] ?>/util">Ver todas las categorías</a> </li>
			</ul>
		</li>
		<li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="zmdi zmdi-search"></i></a></li>
		<li>
			<a href="#" onclick="toggleFullscreen();" class="hidden-sm-down">
				<i class="zmdi zmdi-fullscreen"></i>                   
			</a>
		</li>
		<?php if($session) { ?>
			<li><a href="/user/sign_out?url=<?= urlencode($_SERVER['REQUEST_URI']) ?>" title="Cerrar sesión" class="mega-menu" data-close="true"><i class="zmdi zmdi-power"></i></a></li>
			<li><a href="javascript:void(0);" title="Administración" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-settings"></i></a></li>
		<?php } else { ?>
			<li><a href="/<?= $_SERVER['VIEWS'] ?>/sign_in?url=<?= urlencode($_SERVER['REQUEST_URI']) ?>" title="Iniciar sesión" class="mega-menu" data-close="true"><i class="zmdi zmdi-sign-in"></i></a></li>
		<?php } ?>
	</ul>
</div>
</nav>
<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">

	<? if(isset($user) && !empty($user)) { ?>
	<!-- User Info -->
	<div class="user-info">
		<div class="image">
			<a href="/<?= $_SERVER['VIEWS'] ?>/profile">
				<img src="<?= $user['image'] ?>" width="48" height="48" alt="User" />
			</a>
		</div>
		<div class="info-container">
			<div class="name" data-toggle="dropdown" title="<?= $user['user'] ?>"><?= $user['user'] ?></div>
			<div class="btn-group user-helper-dropdown">
				<i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="button"> keyboard_arrow_down </i>
				<ul class="dropdown-menu">
					<li><a href="/<?= $_SERVER['VIEWS'] ?>/profile"><i class="material-icons">person</i>Profile</a></li>
					<li class="divider"></li>
					<li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
					<li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
					<li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
					<li class="divider"></li>
					<li><a href="/user/sign_out?url=<?= urlencode($_SERVER['REQUEST_URI']) ?>"><i class="material-icons">power_settings_new</i>Sign Out</a></li>
				</ul>
			</div>
			<div class="email" title="<?= $user['name'] ?>"><?= $user['name'] ?></div>
		</div>
	</div>
	<!-- #User Info -->
	<? } ?>

	<!-- Menu -->
	<div class="menu">
		<ul class="list">
			<li class="header">ELIGE OPCIÓN</li>

			<li><a id="dashboardLink" href="/"><i class="zmdi zmdi-home"></i><span>Inicio</span> </a></li>

			<li> <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block"><i class="zmdi zmdi-delicious"></i><span>Extractos de código</span> </a>
				<ul class="ml-menu">
					<li><a href="/<?= $_SERVER['VIEWS'] ?>/newCode"><i class="zmdi zmdi-code"></i><span>Crear nuevo</span> </a> </li>
					<li><hr class="menu-separator"></li>
					<?php foreach ($categories as $category) { ?>
						<li><a href="/<?= $_SERVER['VIEWS'] ?>/util?c=<?= $category['descriptive_name'] ?>"><i class="zmdi zmdi-delicious"></i><span><?= $category['category_name'] ?></span> </a> </li>
					<?php } ?>
					<li><hr class="menu-separator"></li>
					<li><a href="/<?= $_SERVER['VIEWS'] ?>/util"><i class="zmdi zmdi-delicious"></i><span>Ver todas</span> </a> </li>
				</ul>
			</li>

			<li> <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block"><i class="zmdi zmdi-delicious"></i><span>Herramientas</span> </a>
				<ul class="ml-menu">
					<li><a href="/<?= $_SERVER['VIEWS'] ?>/rem"><i class="zmdi zmdi-delicious"></i><span>Conversor REM</span> </a></li>
					
					<li><a href="/<?= $_SERVER['VIEWS'] ?>/gradient_generator"><i class="zmdi zmdi-delicious"></i><span>Degradado CSS3</span></a></li>

					<li><a href="/<?= $_SERVER['VIEWS'] ?>/text_generator"><i class="zmdi zmdi-delicious"></i><span>Texto aleatorio</span></a></li>
				</ul>
			</li>

			<li><a href="/original" target="_blank"><i class="zmdi zmdi-delicious"></i><span>Original</span> </a> </li>
		</ul>
	</div>
	<!-- #Menu --> 
</aside>

<?php if($session) { ?>
	<!-- Right Sidebar -->
	<aside id="rightsidebar" class="right-sidebar">

		<div class="tab-content">
			<div role="tabpanel" class="tab-pane slideLeft in active" id="settings">
				<div class="settings slim_scroll">
					<form method="POST" action="/options/save" id="adminForm">
						<p class="text-left">Panel de administración</p>
						<ul class="setting-list">
							<li>
								<span id="maintenance-text">Mantenimiento</span>
								<div class="switch">
									<label>
										<input id="maintenance-checkbox" type="checkbox" name="maintenance" <?= $options['maintenance'] == 'on' ? 'checked' : '' ?> >
										<span class="lever switch-col-amber"></span>
									</label>
								</div>
							</li>
							<li>
								<div class="form-group form-float form-group-sm">
									<div class="form-line <?= !empty($options['ips']) ? 'focused' : '' ?>">
										<input type="text" id="ips" name="ips" class="form-control" value="<?= $options['ips'] ?>">
										<label class="form-label">Ip's permitidas</label>
									</div>
									<button type="button" id="addIp" class="btn btn-default waves-effect mt-2">Añadir mi IP</button>
									<button type="button" id="clearIps" class="btn btn-default waves-effect mt-2">Limpiar</button>
									<input type="hidden" id="myIp" value="<?= $_SERVER['REMOTE_ADDR'] ?>">
								</div>
							</li>
									<!--
									<li> <span>Email Redirect</span>
										<div class="switch">
											<label>
												<input type="checkbox">
												<span class="lever"></span>
											</label>
										</div>
									</li>
								-->
								<li>
									<button type="submit" class="btn bg-custom waves-effect mt-4" onclick="javascript: if(!confirm('¿Confirmas que deseas guardar los cambios?')) { return false }"><i class="zmdi zmdi-save"></i>&nbsp;&nbsp;Guardar</button>
								</li>
							</ul>
						</form>
					</div>
				</div>
			</div>
		</aside>
		<?php } ?>