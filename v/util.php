<section class="entries content pt-3">
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-12">
        <div class="card <?= isset($category['id_category']) ? 'border'.$category['id_category'] : '' ?>">
          <div class="body">
            <div class="header">
              <? if(!empty($category['id_category'])) { ?>
              <div class="row vertical-align-parent">
                <div class="col-lg-1 col-sm-2 col-3 vertical-align-child">
                  <div class="category-big-logo">
                    <img src="<?= $category['category_logo'] ?>" alt="language-logo">
                  </div>
                </div>
                <div class="col-lg-11 col-sm-10 col-9 vertical-align-child">
                  <h2><?= $category['category_name'] ?><small>Estás viendo las <?= isset($category['count']) && $category['count'] > 0 ? $category['count'] : 0 ?> entradas que tienen asignada la categoría <?= $category['category_name'] ?>.</small></h2>
                </div>
              </div>
              <? } else { ?>
              <h2>Todas las categorías<small>Estás viendo las entradas de todas las categorías.</small></h2>
              <? } ?>
            </div>
          </div>
        </div>
        <? include $_SERVER['DOCUMENT_ROOT'].'/'.$_SERVER['VIEWS'].'/entries_layout.php'; ?>
      </div>
    </div>
  </div>
</section>