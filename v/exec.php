<section class="content pt-3" id="exec-page">
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-lg-12">
        <div class="card">
          <div class="body">
            <?php 
            if(!empty($entry[0])) { ?>
              <div class="float-right">
              	<?php if($session) { ?>
                  <? if($user['user'] == $entry[0]['creator'] || $user['rol'] == 'admin') { ?>
                  <a href="/<?= $_SERVER['VIEWS'].'/edit?type=entry&id='.$entry[0]['id']?>" title="Editar">
                    <button type="button" class="btn btn-raised btn-default btn-circle waves-effect waves-circle waves-float"> <i class="material-icons">edit</i> </button>
                  </a>
                  <a onclick="javascript: if(!confirm('Vas a eliminar esta entrada permanentemente.\n¿Estás seguro?')) { return false }" href="/action/delete?type=entry&id=<?= $entry[0]['id']?>" title="Eliminar">
                    <button type="button" class="btn btn-raised btn-default btn-circle waves-effect waves-circle waves-float"> <i class="material-icons">delete</i> </button>
                  </a>
                  <? } ?>
                <?php } ?>
                <?php if($entry[0]['executable']) { ?>
                <a href="/<?= $_SERVER['VIEWS'] ?>/iframes/page<?= $entry[0]['id'] ?>.php" title="Pantalla completa" target="_blank">
                  <button type="button" class="btn btn-raised btn-default btn-circle waves-effect waves-circle waves-float"> <i class="material-icons">open_in_new</i> </button>
                </a>
                <?php } ?>
              </div>

              <div class="link-box">
                <div class="languages-logos">
                <?php foreach ($entry[0]['categories'] as $category) { ?>
                  <a href="/<?= $_SERVER['VIEWS'].'/util?c='.$category['descriptive_name']?>" title="<?= $category['category_name']?>">
                    <img src="<?= $category['category_logo'] ?>">
                  </a>&nbsp;&nbsp;
                <?php } ?>
                </div>
              </div>

              <a href="/?creator=<?= $entry[0]['creator'] ?>" class="creator col-grey"><?= $entry[0]['creator'] ?></a>
              
              <h2 class="mb-0"><?= html_entity_decode($entry[0]['title'], ENT_QUOTES | ENT_HTML5) ?></h2>
              
              <h5 class="col-grey mb-4"><?= html_entity_decode($entry[0]['description'], ENT_QUOTES | ENT_HTML5) ?></h5>

              <div class="code-description"><?= html_entity_decode($entry[0]['explanation'], ENT_QUOTES | ENT_HTML5) ?></div>

              <?php if($entry[0]['executable']) { ?>
              <div class="row code_boxes">
                <div class="col-lg-4">
                  <h5>HTML</h5>
                  <textarea id="box_html" autocomplete="off"><?= htmlentities(html_entity_decode($entry[0]['html'], ENT_QUOTES | ENT_HTML5)) ?></textarea>
                </div>
                <div class="col-lg-4">
                  <h5>CSS</h5>
                  <textarea id="box_css" autocomplete="off"><?= htmlentities($entry[0]['css']) ?></textarea>
                </div>
                <div class="col-lg-4">
                  <h5>JavaScript</h5>
                  <textarea id="box_js" autocomplete="off"><?= htmlentities($entry[0]['javascript']) ?></textarea>
                </div>
              </div>
              <div class="row mt-4">
                <div class="col-12">
                  <div class="execute-box">
                    <iframe src="/<?= $_SERVER['VIEWS'] ?>/iframes/page<?= $entry[0]['id'] ?>.php"></iframe>
                  </div>
                </div>
              </div>
              <?php } else { ?>
                <? if(!empty($entry[0]['content'])) { ?>
                  <textarea id="box_otherCode" autocomplete="off"><?= htmlentities(html_entity_decode($entry[0]['content'], ENT_QUOTES | ENT_HTML5)) ?></textarea>
                <? } ?>
              <?php } ?>
              <div class="mt-4">
              	<div class="row">
                  <div class="col-12">
                    <div class="font-11"><strong>Autor:</strong> <?= $entry[0]['creator'] ?></div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="font-11"><strong>Creado:</strong> <?= strftime('%e %B %Y a las %H:%M', strtotime($entry[0]['creation_date'])) ?></div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="font-11"><strong>Última edición:</strong> <?= strftime('%e %B %Y a las %H:%M', strtotime($entry[0]['edition_date'])) ?></div>
                  </div>
                </div>
              </div>
            <?php } else { ?>
              <p>No existe o no es ejecutable.</p>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>