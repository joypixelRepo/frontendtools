<?

if(!empty($entries)) {
	$totalPages = $entries['pages'];
	unset($entries['pages']);

	$count = 0;
	$numColsInRow = 3;
	$cols_md = 4;
	foreach ($entries as $entry) {

	if($count == 0) { ?>
	<div class="row">
		<? } ?>
		<div class="col-md-<?= $cols_md ?> col-sm-12 col-xs-12">
			<div class="card card-home">
				<div class="body entry-box">
					<div class="float-right box-btn-view">
            <a href="/<?= $_SERVER['VIEWS'].'/exec?id='.$entry['id']?>" title="Ver entrada">
              <button type="button" class="btn btn-raised btn-default btn-circle waves-effect waves-circle waves-float"> <i class="material-icons">remove_red_eye</i> </button>
            </a>
          </div>
					<? if($entry['executable']) { ?>
						<? if(!empty($entry['screenshot'])) { ?>
							<!--<div class="screenshot" style="background:url(<?= $entry['screenshot'] ?>)"></div>-->
						<? } ?>
						<? if(file_exists($_SERVER['DOCUMENT_ROOT'].'/'.$_SERVER['VIEWS'].'/iframes/page'.$entry['id'].'.php')) { ?>
							<!--<div class="d-iframe">
								<iframe scrolling="no" src="/<?= $_SERVER['VIEWS'] ?>/iframes/page<?= $entry['id'] ?>.php"></iframe>
							</div>-->
						<? } ?>
					<? } ?>
					<? if($entry['executable']) { ?>
					<div class="executable-corner" data-toggle="tooltip" data-placement="top" title="Ejecutable"></div>
					<? } ?>
						<a class="link-box" href="/<?= $_SERVER['VIEWS'].'/exec?id='.$entry['id']?>">
							<h3 title="<?= $entry['title'] ?>"><?= strlen($entry['title']) > 45 ? substr($entry['title'],0,45)."..." : $entry['title'] ?></h3>
							<div class="code-description">
								<? if(!empty($entry['description'])) { ?>
								<?= strlen($entry['description']) > 60 ? substr($entry['description'],0,60)."..." : $entry['description'] ?>
								<? } else { ?>
									<span class="no-description">Sin descripción.</span>
								<? } ?>
							</div>
						</a>
						<hr>
						<div class="row">
							<div class="col-6">
								<div class="font-11 entry-creator">
									<a href="/?creator=<?= $entry['creator'] ?>" class="col-grey" title="<?= $user['rol'] == 'admin' ? strftime('%A %e %B %Y · %H:%M', strtotime($entry['last_connection'])) : '' ?>"><?= $entry['creator'] ?></a>
								</div>
							</div>
							<div class="col-6">
								<div class="font-11 col-grey text-right">
									<i><?= strftime('%e %B %Y · %H:%M', strtotime($entry['creation_date'])) ?></i>
								</div>
							</div>
						</div>
						<div class="categories-badges">
							<div class="languages-logos">
								<? foreach ($entry['categories'] as $category) { ?>
								<a href="/?c=<?=$category['descriptive_name']?>" title="<?= $category['category_name']?>">
									<img src="<?= $category['category_logo'] ?>">
								</a>&nbsp;&nbsp;
								<? } ?>
							</div>
						</div>
				</div>
			</div>
		</div>
		<? 
		$count++;
		if($count == $numColsInRow) { ?>
	</div>
		<? $count = 0;
		}
	} ?>

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
	$nextPage = $actualPage+1 >= 2 ? $actualPage+1 : 2;
	?>

	<div class="col-12">
		<ul class="pagination pagination-md entries-pagination">
			<li class="page-item">
				<a class="page-link" href="<?= $url.'page=1' ?>"><< Primera</a>
			</li>
			<li><a class="page-link" href="<?= $url.'page='.$prevPage ?>"><</a></li>
			<? for ($i=1; $i<$totalPages+1; $i++) { ?>
				<li class="page-item"><a class="page-link <?= $actualPage == $i ? 'active' : '' ?>" href="<?= $url.'page='.$i ?>"><?= $i ?></a></li>
			<? } ?>
			<li><a class="page-link" href="<?= $url.'page='.$nextPage ?>">></a></li>
	    <li class="page-item">
	    	<a class="page-link" href="<?= $url.'page='.$totalPages ?>">Última >></a>
	    </li>
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