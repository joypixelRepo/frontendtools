
<!-- Page Loader -->
<div class="page-loader-wrapper">
	<div class="loader">        
		<div class="loading-bar"></div>
		<div class="loading-bar"></div>
		<div class="loading-bar"></div>
		<div class="loading-bar"></div>
		<p><?= LANG['loading'] ?></p>
	</div>
</div>
<!-- Overlay For Sidebars -->
<div class="overlay"></div><!-- Search  -->
<div class="search-bar">
	<form class="search-form" action="/" method="GET">
		<div class="search-icon"> <i class="material-icons">search</i> </div>
		<input type="text" name="keys" placeholder="<?= LANG['explore_fet'] ?>" autocomplete="off">
		<div class="close-search"> <i class="material-icons">close</i> </div>
	</form>
  <div class="search-ajax-result"></div>
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
			<li><a href="javascript:void(0);" class="ls-toggle-btn" data-close="true" title="<?= LANG['horizontal_maximize'] ?>"><i class="material-icons">swap_horiz</i></a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">

      <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><img class="menu-lang-flag" src="/assets/images/languages/flags/<?= $_SESSION['lang'] ?>.svg" alt="language-flag">
      </a>
      <ul class="dropdown-menu">
        <li class="header"><?= LANG['change_language'] ?></li>
        <li class="body">
          <ul class="menu list-unstyled category-list-menu">
            <li>
              <a href="<?= VController::languageUrl('en') ?>">
                <img src="/assets/images/languages/flags/en.svg" alt="language-flag">
                <div class="menu-info">
                  <h4><?= LANG['english'] ?></h4>
                  <p><?= LANG['change_to_english'] ?></p>
                </div>
              </a>
            </li>
            <li>
              <a href="<?= VController::languageUrl('es') ?>">
                <img src="/assets/images/languages/flags/es.svg" alt="language-flag">
                <div class="menu-info">
                  <h4><?= LANG['spanish'] ?></h4>
                  <p><?= LANG['change_to_spanish'] ?></p>
                </div>
              </a>
            </li>
          </ul>
        </li>
      </ul>

      <li class="dropdown mobile-hidde"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="material-icons">apps</i>
        <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
      </a>
      <ul class="dropdown-menu">
        <li class="header"><?= LANG['categories_upp'] ?></li>
        <li class="body">
          <ul class="menu list-unstyled category-list-menu">
            <?php foreach ($categories as $category) { ?>
              <li>
                <a href="/?c=<?= $category['descriptive_name'] ?>">
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
        <li class="footer"> <a href="/"><?= LANG['view_all_categories'] ?></a> </li>
      </ul>



		<li>
			<a href="#" onclick="toggleFullscreen();" class="hidden-sm-down app-fullscreen">
				<i class="material-icons">fullscreen</i>
			</a>
		</li>
		<?php if($session) { ?>
			<? if($user['rol'] == 'admin') { ?>
			<li><a href="javascript:void(0);" title="<?= LANG['administration'] ?>" class="js-right-sidebar" data-close="true"><i class="material-icons <?= $options['maintenance'] != 'on' ? 'rotate"' : '' ?>">settings</i></a></li>
			<? } ?>

      <li>
        <div class="dropdown avatar-top-right-menu">
          <img src="<?= file_exists($_SERVER['DOCUMENT_ROOT'].$user['image']) ? $user['image'] : '/assets/images/avatars/default/default.svg' ?>" class="avatar-top-right-menu" alt="User" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="button"/>
          <ul class="dropdown-menu">
            <li><a href="/<?= $_SERVER['VIEWS'] ?>/profile"><i class="material-icons">person</i><?= LANG['my_account'] ?></a></li>
            <li class="divider"></li>
            <!-- <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
            <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
            <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
            <li class="divider"></li> -->
            <li><a href="/user/sign_out?url=<?= urlencode($_SERVER['REQUEST_URI']) ?>"><i class="material-icons">exit_to_app</i><?= LANG['close_session'] ?></a></li>
          </ul>
        </div>
      </li>

		<?php } else { ?>
			<li><a href="/<?= $_SERVER['VIEWS'] ?>/sign_in?url=<?= urlencode($_SERVER['REQUEST_URI']) ?>" title="<?= LANG['log_in'] ?>" class="mega-menu" data-close="true"><i class="material-icons">person</i></a></li>
		<?php } ?>
			<li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
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
				<img src="<?= file_exists($_SERVER['DOCUMENT_ROOT'].$user['image']) ? $user['image'] : '/assets/images/avatars/default/default.svg' ?>" width="48" height="48" alt="User" />
			</a>
		</div>
		<div class="info-container">
			<div class="name" data-toggle="dropdown" title="<?= $user['user'] ?>"><?= $user['user'] ?></div>
			<div class="btn-group user-helper-dropdown">
				<i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="button"> keyboard_arrow_down </i>
				<ul class="dropdown-menu">
					<li><a href="/<?= $_SERVER['VIEWS'] ?>/profile"><i class="material-icons">person</i><?= LANG['my_account'] ?></a></li>
					<li class="divider"></li>
					<!-- <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
					<li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
					<li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
					<li class="divider"></li> -->
					<li><a href="/user/sign_out?url=<?= urlencode($_SERVER['REQUEST_URI']) ?>"><i class="material-icons">exit_to_app</i><?= LANG['close_session'] ?></a></li>
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
			<li class="header"><?= LANG['principal_menu'] ?></li>

      <? if(!isset($user)) { ?>
      <li><a href="/<?= $_SERVER['VIEWS'] ?>/sign_in?url=<?= urlencode($_SERVER['REQUEST_URI']) ?>"><i class="zmdi zmdi-account"></i><span><?= LANG['log_in'] ?></span> </a></li>
      <? } ?>

      <li><a href="/" class="bb-n"><i class="zmdi zmdi-home"></i><span><?= LANG['home'] ?></span> </a></li>

      <li> <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block"><i class="zmdi zmdi-delicious"></i><span><?= LANG['change_language'] ?></span> </a>
        <ul class="ml-menu">
          <li><a href="<?= VController::languageUrl('en') ?>"><img class="category-image" src="/assets/images/languages/flags/en.svg" alt="language-flag"><span><?= LANG['english'] ?></span> </a></li>
          
          <li><a href="<?= VController::languageUrl('es') ?>"><img class="category-image" src="/assets/images/languages/flags/es.svg" alt="language-flag"><span><?= LANG['spanish'] ?></span></a></li>

        </ul>
      </li>

      <li>
        <a href="/<?= $_SERVER['VIEWS'] ?>/newCode" class="btn-fade-icon bg-1">
          <i class="material-icons">add_circle</i>
          <span><?= LANG['new_entry'] ?></span>
        </a>
      </li>

			<li> <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block"><i class="zmdi zmdi-delicious"></i><span><?= LANG['categories_min'] ?></span> </a>
				<ul class="ml-menu">
					<?php foreach ($categories as $category) { ?>
						<li class="li-categories"><a href="/?c=<?= $category['descriptive_name'] ?>"><img class="category-image" src="<?= $category['category_logo'] ?>"><span><?= $category['category_name'] ?></span> </a> </li>
					<?php } ?>
				</ul>
			</li>

			<li> <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block"><i class="zmdi zmdi-delicious"></i><span><?= LANG['tools'] ?></span> </a>
				<ul class="ml-menu">
					<li><a href="/<?= $_SERVER['VIEWS'] ?>/rem"><span>Conversor REM a píxeles</span> </a></li>
					
					<li><a href="/<?= $_SERVER['VIEWS'] ?>/gradient_generator"><span>Generador de gradientes</span></a></li>

					<li><a href="/<?= $_SERVER['VIEWS'] ?>/text_generator"><span>Generador de texto</span></a></li>

          <li><a href="/<?= $_SERVER['VIEWS'] ?>/base64"><span>Base64 encode/decode</span></a></li>
				</ul>
			</li>

			<?php if($user['rol'] == 'admin') { ?>
			<li><a href="/original" target="_blank"><i class="zmdi zmdi-delicious"></i><span>Original</span> </a></li>
			<?php } ?>

      <li><a href="/<?= $_SERVER['VIEWS'] ?>/contact" class="bb-n icon-menu"><img src="/assets/images/contact.svg" class="category-image" alt="contact-letter"><span><?= LANG['contact'] ?></span> </a></li>

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
						<p class="text-left"><?= LANG['admin_panel'] ?></p>
						<ul class="setting-list">
							<li>
								<span id="maintenance-text"><?= LANG['maintenance'] ?></span>
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
										<label class="form-label"><?= LANG['allow_ips'] ?></label>
									</div>
									<button type="button" id="addIp" class="btn btn-default waves-effect mt-2"><?= LANG['add_my_ip'] ?></button>
									<button type="button" id="clearIps" class="btn btn-default waves-effect mt-2"><?= LANG['clean'] ?></button>
									<input type="hidden" id="myIp" value="<?= $_SERVER['REMOTE_ADDR'] ?>">
								</div>
							</li>
						</ul>
						<div class="col-12">
								<button type="submit" class="btn bg-custom waves-effect" onclick="javascript: if(!confirm('<?= LANG['confirm_save_changes'] ?>')) { return false }"><i class="zmdi zmdi-save"></i>&nbsp;&nbsp;<?= LANG['save'] ?></button>
						</div>
					</form>

					<hr>

          <p class="text-left">Entradas con comentarios</p>
          <div class="col-12">
              <a href="/?comments">
                <button type="button" class="btn bg-custom waves-effect w-100">Ver comentarios</button>
              </a>
          </div>

					<p class="text-left"><?= LANG['last_connected_users'] ?></p>

					<div class="users">
						<div class="col-12">
							<ul>
								<? foreach ($users as $user) { ?>
									<li>
										<a href="/?creator=<?= $user['user'] ?>" class="col-grey user-sidebar" title="<?= strftime('%e %b %Y · %H:%M', strtotime($user['last_connection'])) ?>">
											<img src="<?= file_exists($_SERVER['DOCUMENT_ROOT'].$user['image']) ? $user['image'] : '/assets/images/avatars/default/default.svg' ?>" alt="profile-img" class="filter-gray">
											<span><?= $user['user'] ?></span>
                      <span class="font-10 ml-2"><?= VController::dateDiff($user['last_connection']) ?></span>
											<!-- <span class="font-10 ml-2"><?= strftime('%e %b %Y · %H:%M', strtotime($user['last_connection'])) ?></span> -->
										</a>
									</li>
								<? } ?>
							</ul>
						</div>
					</div>

				</div>
			</div>
		</div>
	</aside>
		<?php } ?>