<?

if(!empty($entries)) {
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
							<h3 title="<?= $entry['title'] ?>"><?= substr($entry['title'], 0, 60) ?><?= strlen($entry['title']) > 60 ? '...' : '' ?></h3>
							<div class="code-description">
								<? if(!empty($entry['description'])){ ?>
								<?= substr(html_entity_decode($entry['description'], ENT_QUOTES | ENT_HTML5), 0, 165) ?><?= strlen(html_entity_decode($entry['description'], ENT_QUOTES | ENT_HTML5)) > 165 ? '...' : '' ?>
								<? } else { ?>
									<span class="no-description">No se ha establecido una descripción para esta entrada.</span>
								<? } ?>
							</div>
						</a>
						<hr>
						<div class="row">
							<div class="col-7">
								<div class="font-11">
									<a href="#" class="col-grey"><?= $entry['creator'] ?></a>
								</div>
							</div>
							<div class="col-5">
								<? $date = new DateTime($entry['creation_date']) ?>
								<div class="font-11 col-grey text-right">
									<i><?= $date->format('d-m-Y H:i') ?></i>
								</div>
							</div>
						</div>
						<div class="categories-badges">
							<div class="languages-logos">
								<? foreach ($entry['categories'] as $category) { ?>
								<a href="/<?= $_SERVER['VIEWS'].'/util?c='.$category['descriptive_name']?>" title="<?= $category['category_name']?>">
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
	<div class="col-12">
		<ul class="pagination pagination-md entries-pagination">
	    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
	    <li class="page-item"><a class="page-link" href="#">1</a></li>
	    <li class="page-item"><a class="page-link" href="#">2</a></li>
	    <li class="page-item"><a class="page-link" href="#">3</a></li>
	    <li class="page-item"><a class="page-link" href="#">Next</a></li>
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