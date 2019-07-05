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
              <h1>Herramientas para desarrolladores FrontEnd</h1>
              <h2>Tu repositorio online para guardar y no olvidar fragmentos de código utilizados por los desarrolladores FrontEnd</h2>
            </div>
          </div>
        </div>

				<div class="card d-none d-sm-block mb-3">
					<div class="body">
						<div class="header">
							<div class="languages-logos languages-logos-big">
							<?php foreach ($categories as $category) { ?>
								<a href="/?c=<?=$category['descriptive_name']?>">
									<img src="<?= $category['category_logo'] ?>" data-toggle="tooltip" data-placement="bottom" title="<?= $category['category_name']?> (<?= isset($category['count']) && $category['count'] > 0 ? $category['count'] : 0 ?> entradas)">
								</a>&nbsp;&nbsp;
							<?php } ?>
							</div>
						</div>
					</div>
				</div>

        <? if($viewCategory['count'] > 0) { ?>
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
                  <h2><?= $viewCategory['category_name'] ?><small>Estás viendo las <?= isset($viewCategory['count']) && $viewCategory['count'] > 0 ? $viewCategory['count'] : 0 ?> entradas que tienen asignada la categoría <?= $viewCategory['category_name'] ?>.</small></h2>
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