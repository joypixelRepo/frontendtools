<section class="entries content pt-3">
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-12">
        <div class="card">
          <div class="body">
            <div class="header">

              <? if(isset($_GET['keys']) && !empty($_GET['keys'])) { ?>
              <h2><?= count($entries) ?> <?= count($entries) > 1 || count($entries) == 0 ? ' resultados encontrados' : ' resultado encontrado' ?> con las siguientes palabras clave:</h2>
              <? } else if(isset($_GET['creator']) && !empty($_GET['creator'])) { ?>
              <h2>Mostrando las entradas creadas por el usuario: <?= $_GET['creator'] ?></h2>
              <? } else { ?>
              <h2>Mostrando todas las coincidencias sin palabras clave.</h2>
              <? }

              if(isset($_GET['keys'])) {
              $keys = explode(' ', $_GET['keys']);
                foreach ($keys as $word) {
                  if(!empty($word)) { ?>
                    <a href="/action/search?keys=<?= $word ?>"><span class="label label-success d-inline-block mt-2"><?= $word ?></span></a>
                  <? }
                }
              } ?>

            </div>
          </div>
        </div>
        <? include $_SERVER['DOCUMENT_ROOT'].'/'.$_SERVER['VIEWS'].'/entries_layout.php'; ?>
      </div>
    </div>
  </div>
</section>