<section class="entries content pt-3" id="home-page">
	<div class="container-fluid">
		<div class="row clearfix">
			<div class="col-12">
				<!-- <div class="card mb-3">
					<div class="body">
						<div class="header">
							<h2>Últimas utilidades<small>Listado de las últimas utilidades añadidas<?= isset($_GET['creator']) ? ' por <strong>'.$_GET['creator'].'</strong>' : ''; ?>.</small></h2>
						</div>
					</div>
				</div> -->

        <div class="card card-info mb-3">
          <div class="body">
            <div class="header">
              <h1><?= LANG['home_h1'] ?></h1>
              <h2><?= LANG['home_h2'] ?></h2>
            </div>
          </div>
        </div>

				<div class="card d-none d-sm-block mb-3">
					<div class="body">
						<div class="header">
							<div class="languages-logos languages-logos-big">
							<?php foreach ($categories as $category) { ?>
								<a href="/?c=<?=$category['descriptive_name']?>">
									<img src="<?= $category['category_logo'] ?>" data-toggle="tooltip" data-placement="bottom" title="<?= $category['category_name']?> (<?= isset($category['count']) && $category['count'] > 0 ? $category['count'] : 0 ?> <?= LANG['entries'] ?>)" alt="<?= $category['category_name']?>">
								</a>&nbsp;&nbsp;
							<?php } ?>
							</div>
						</div>
					</div>
				</div>

        <?php if(isset($_GET['keys'])) { ?>
        <div class="card card-info mb-3">
          <div class="body">
            <div class="header">
              <a href="#" id="toogle_advanced_search"><strong><?= LANG['advanced_search'] ?></strong></a>
              <form action="/" method="GET" class="advanced-search-form mt-4">

                <div class="row">
                  <div class="col-lg-4 col-12">
                    <label for="keys"><?= LANG['search_keywords'] ?></label>
                    <input type="text" class="custom-input mb-3" name="keys" id="keys" value="<?= $_GET['keys'] ?>">
                  </div>
                  <div class="col-lg-4 col-12">
                    <label><?= LANG['filter_by_user'] ?></label>
                    <select name="creator" class="custom-select mt-0 mb-3">
                      <option value="">- <?= LANG['anyone'] ?> -</option>
                      <?php foreach ($usersOrdered as $userOrdered) { ?>
                        <option value="<?= $userOrdered['user'] ?>" <?= $userOrdered['user'] == $_GET['creator'] ? 'selected' : '' ?>><?= $userOrdered['user'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="col-lg-4 col-12">
                    <label><?= LANG['filter_by_category'] ?></label>
                    <select name="c" class="custom-select mt-0 mb-3">
                      <option value="">- <?= LANG['anyone'] ?> -</option>
                      <?php foreach ($categories as $category) { ?>
                        <option value="<?= $category['descriptive_name'] ?>" <?= $category['descriptive_name'] == $_GET['c'] ? 'selected' : '' ?>><?= $category['category_name'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <input type="submit" class="btn btn-large btn-raised bg-custom waves-effect" value="<?= LANG['search'] ?>">
              </form>
            </div>
          </div>
        </div>
        <?php } ?>

        <? if($viewCategory['count'] > 0 && !isset($_GET['keys'])) { ?>
        <div class="card <?= isset($viewCategory['id_category']) ? 'border'.$viewCategory['id_category'] : '' ?> mb-3">
          <div class="body">
            <div class="header">
              <? if(!empty($viewCategory['id_category'])) { ?>
              <div class="row">
                <div class="col-lg-1 col-sm-2 col-3 vertical-align-child">
                  <div class="category-big-logo">
                    <img src="<?= $viewCategory['category_logo'] ?>" alt="language-logo">
                  </div>
                </div>
                <div class="col-lg-11 col-sm-10 col-9 vertical-align-child">
                  <h2><?= $viewCategory['category_name'] ?><small><?= LANG['youAreViewThe'] ?> <?= isset($viewCategory['count']) && $viewCategory['count'] > 0 ? $viewCategory['count'] : 0 ?> <?= LANG['withCategoryAssign'] ?> <?= $viewCategory['category_name'] ?></small></h2>
                </div>
              </div>
              <? } ?>
            </div>
          </div>
        </div>
        <? } ?>

				<? include $_SERVER['DOCUMENT_ROOT'].'/'.$_SERVER['VIEWS'].'/entries_masonry.php'; ?>
			</div>
		</div>
	</div>
</section>