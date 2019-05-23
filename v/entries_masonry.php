<?

if(!empty($entries)) {
  $totalPages = $entries['pages'];
  unset($entries['pages']);

  $count = 0;
  $numColsInRow = 3;
  $cols_md = 4;

?>

  <div class="card-columns">
  <? foreach ($entries as $entry) { ?>
    <div class="card card-home">
      
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

        <div class="float-right box-btn-view">
          <a href="/<?= $_SERVER['VIEWS'].'/exec?id='.$entry['id']?>" title="Ver entrada">
            <button type="button" class="btn btn-raised btn-default btn-circle waves-effect waves-circle waves-float entry-action-button"> <i class="material-icons">remove_red_eye</i> </button>
          </a>


          <? if($user['user'] == $entry['creator'] || $user['rol'] == 'admin') { ?>
          <a href="/<?= $_SERVER['VIEWS'].'/edit?type=entry&id='.$entry['id']?>" title="Editar">
            <button type="button" class="btn btn-raised btn-default btn-circle waves-effect waves-circle waves-float entry-action-button"> <i class="material-icons">edit</i> </button>
          </a>
          <a onclick="javascript: if(!confirm('Vas a eliminar esta entrada permanentemente.\n¿Estás seguro?')) { return false }" href="/action/delete?type=entry&id=<?= $entry['id']?>" title="Eliminar">
            <button type="button" class="btn btn-raised btn-default btn-circle waves-effect waves-circle waves-float entry-action-button hover-red"> <i class="material-icons">delete</i> </button>
          </a>
          <? } ?>

        </div>
          <a class="link-box" href="/<?= $_SERVER['VIEWS'].'/exec?id='.$entry['id']?>">
            <h3 title="<?= $entry['title'] ?>"><?= strlen($entry['title']) > 65 ? substr($entry['title'],0,65)."..." : $entry['title'] ?></h3>
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
              <i><?= strftime('%e %B %Y · %H:%M', strtotime($entry['creation_date'])) ?></i>
            </div>
          </div>
        </div>
      </div>
      <div class="entry-info-box">
        <div class="row">
          <div class="col-10">
            <div class="languages-logos">
              <? foreach ($entry['categories'] as $category) { ?>
              <a href="/?c=<?=$category['descriptive_name']?>" title="<?= $category['category_name']?>">
                <img src="<?= $category['category_logo'] ?>">
              </a>&nbsp;&nbsp;
              <? } ?>
            </div>
          </div>
          <div class="col-2">
            <? if($entry['executable']) { ?>
            <div class="executable-corner" data-toggle="tooltip" data-placement="top" title="Ejecutable">
              <!-- <span>Ejecutable</span> -->
              <img src="/assets/images/executable.svg" alt="Entrada ejecutable">
            </div>
            <? } ?>
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

      <li class="page-item">
        <a class="page-link link-bold" href="<?= $url.'page=1' ?>" title="Primera página"><img src="/assets/images/arrow-first.svg"></a>
      </li>

      <li><a class="page-link link-bold" href="<?= $url.'page='.$prevPage ?>" title="Página anterior"><img src="/assets/images/arrow-previous.svg"></a></li>
      <? for ($i=1; $i<$totalPages+1; $i++) { ?>
        <li class="page-item"><a class="page-link <?= $actualPage == $i ? 'active' : '' ?>" href="<?= $url.'page='.$i ?>"><?= $i ?></a></li>
      <? } ?>

      <? if($nextPage != null) { ?>
      <li><a class="page-link link-bold" href="<?= $url.'page='.$nextPage ?>" title="Página siguiente"><img src="/assets/images/arrow-next.svg"></a></li>

      <li class="page-item">
        <a class="page-link link-bold" href="<?= $url.'page='.$totalPages ?>" title="Última página"><img src="/assets/images/arrow-last.svg"></a>
      </li>

      <? } ?>

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