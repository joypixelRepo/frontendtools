<?

if(!empty($entries)) {
  $totalPages = $entries['pages'];
  unset($entries['pages']);
?>

  <div class="card-columns">
  <? foreach ($entries as $entry) { ?>
    <div class="card card-home <?= $entry['executable'] ? 'entry-executable' : '' ?>">

      <div class="header">
          <a class="link-box" href="/<?= $_SERVER['VIEWS'].'/exec?u='.($entry['url'])?>">
            <h2 title="<?= $entry['title'] ?>">
              <?= $entry['title'] ?>
            </h2>
          </a>
          <ul class="header-dropdown m-r--5">
            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more-vert"></i> </a>
              <ul class="dropdown-menu">

                <li><a href="/<?= $_SERVER['VIEWS'].'/exec?u='.($entry['url'])?>" title="Ver entrada"><i class="material-icons">remove_red_eye</i>Ver entrada</a></li>

                <? if($user['user'] == $entry['creator'] || $user['rol'] == 'admin') { ?>
                
                <li><a href="/<?= $_SERVER['VIEWS'].'/edit?type=entry&id='.$entry['id']?>" title="Editar"><i class="material-icons">mode_edit</i>Editar</a></li>
                <li><a class="delete-menu" onclick="javascript: if(!confirm('Vas a eliminar esta entrada permanentemente.\n¿Estás seguro?')) { return false }" href="/action/delete?type=entry&id=<?= $entry['id']?>" title="Eliminar"><i class="material-icons">delete</i>Eliminar</a></li>

                <? } ?>

              </ul>
            </li>
          </ul>
      </div>
      
      <div class="body entry-box">

        <? if($entry['executable']) { ?>
          <? if(!empty($entry['screenshot'])) { ?>
            <!--<div class="screenshot" style="background:url(<?= $entry['screenshot'] ?>)"></div>-->
          <? } ?>
          <? if(file_exists($_SERVER['DOCUMENT_ROOT'].'/'.$_SERVER['VIEWS'].'/iframes/page'.$entry['id'].'.php')) { ?>
            <!-- <div class="d-iframe">
              <iframe scrolling="no" src="/<?= $_SERVER['VIEWS'] ?>/iframes/page<?= $entry['id'] ?>.php"></iframe>
            </div> -->
          <? } ?>
        <? } ?>

        <a class="link-box" href="/<?= $_SERVER['VIEWS'].'/exec?u='.($entry['url'])?>">
          <div class="code-description">
            <? if(!empty($entry['description'])) { ?>
            <?= strlen($entry['description']) > 120 ? substr($entry['description'],0,120)."..." : $entry['description'] ?>
            <? } else { ?>
              <span class="no-description">Sin descripción.</span>
            <? } ?>
          </div>
        </a>
      </div>
      <div class="entry-creator-info">
        <div class="row">
          <div class="col-6">
            <div class="font-11 entry-creator">
              <a href="/?creator=<?= $entry['creator'] ?>" class="col-grey link-entry-creator" title="<?= $user['rol'] == 'admin' ? 'Última conexión: '.strftime('%A %e %B %Y · %H:%M', strtotime($entry['last_connection'])) : '' ?>"><?= $entry['creator'] ?></a>
            </div>
          </div>
          <div class="col-6">
            <div class="font-11 col-grey text-right">
              <i><?= strftime('%e %B %Y', strtotime($entry['creation_date'])) ?></i>
            </div>
          </div>
        </div>
      </div>
      <div class="entry-info-box">
        <div class="row">
          <div class="col-8">
            <div class="languages-logos">
              <? foreach ($entry['categories'] as $category) { ?>
              <a href="/?c=<?=$category['descriptive_name']?>" title="<?= $category['category_name']?>">
                <img src="<?= $category['category_logo'] ?>">
              </a>&nbsp;&nbsp;
              <? } ?>
            </div>
          </div>
          <!-- <div class="col-2">
            <? if($entry['executable']) { ?>
            <div class="executable-corner" title="Ejecutable">
              <a href="/<?= $_SERVER['VIEWS'] ?>/iframes/page<?= $entry['id'] ?>.php" target="_blank"><img src="/assets/images/executable-grid.svg" alt="Entrada ejecutable"></a>
            </div>
            <? } ?>
          </div> -->
          <div class="col-4">
            <div class="text-right">
              <a href="/<?= $_SERVER['VIEWS'].'/exec?u='.($entry['url'])?>#comments" title="<?= isset($entry['comments']) ? count($entry['comments']) : 0 ?> comentarios">
                <span class="comments-number"><?= isset($entry['comments']) ? count($entry['comments']) : 0 ?><i class="material-icons">chat</i></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
<? } ?>
</div>

<?
$url = '?';
$actualPage = isset($_GET['page']) ? $_GET['page'] : 1;
if(isset($_GET) && !empty($_GET)) {
  unset($_GET['page']);
  foreach ($_GET as $key => $value) {
    $url .= $key.'='.$value.'&';
  }
}
$prevPage = $actualPage-1 >= 1 ? $actualPage-1 : 1;
$nextPage = $actualPage+1 >= 2 ? $actualPage+1 : 1;

if($nextPage > $totalPages) {
  $nextPage = null;
}

?>

  <div class="col-12">
    <ul class="pagination pagination-md entries-pagination">

      <!-- pagination -->
      <? if($actualPage != 1) { ?>
      <li class="page-item">
        <a class="page-link link-bold" href="<?= $url.'page=1' ?>" title="Primera página"><img src="/assets/images/arrow-first.svg"></a>
      </li>
      
      <li><a class="page-link link-bold" href="<?= $url.'page='.$prevPage ?>" title="Página anterior"><img src="/assets/images/arrow-previous.svg"></a></li>
      <? } ?>

      
      <? if(($actualPage - 2) > 0) { ?>
      <li class="page-item"><a class="page-link" href="<?= $url.'page='.($actualPage - 2) ?>">
        <?= $actualPage - 2 ?></a></li>
      <? } ?>

      <? if(($actualPage - 1) > 0) { ?>
      <li class="page-item"><a class="page-link" href="<?= $url.'page='.($actualPage - 1) ?>">
        <?= $actualPage - 1 ?></a></li>
      <? } ?>

      <li class="page-item"><a class="page-link active" href="<?= $url.'page='.$actualPage ?>">
        <?= $actualPage ?></a></li>
      
      <? if($nextPage != null && $nextPage <= $totalPages) { ?>
      <li class="page-item"><a class="page-link" href="<?= $url.'page='.$nextPage ?>">
        <?= $nextPage ?></a></li>
      <? } ?>

      <? if($nextPage != null && ($nextPage + 1) <= $totalPages) { ?>
      <li class="page-item"><a class="page-link" href="<?= $url.'page='.($nextPage + 1) ?>">
        <?= $nextPage + 1 ?></a></li>
      <? } ?>


      <? if($nextPage != null) { ?>
      <li><a class="page-link link-bold" href="<?= $url.'page='.$nextPage ?>" title="Página siguiente"><img src="/assets/images/arrow-next.svg"></a></li>

      <li class="page-item">
        <a class="page-link link-bold" href="<?= $url.'page='.$totalPages ?>" title="Última página"><img src="/assets/images/arrow-last.svg"></a>
      </li>
      <? } ?>
      <!-- end pagination -->

    </ul>
  </div>



<? } else { ?>
  <div class="card">
    <div class="body">
      <div class="alert alert-danger no_entries">
          <strong>¡Ups!</strong><br>No hay entradas que mostrar.
      </div>
    </div>
  </div>
<? }