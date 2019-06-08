<section class="content pt-3" id="exec-page">
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-lg-12">
        <div class="card">
          <div class="header pb-0">
            <h1 class="mb-3 titles"><?= html_entity_decode($entry[0]['title'], ENT_QUOTES | ENT_HTML5) ?></h1>
            <ul class="header-dropdown m-r--5 float-right">
              <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more-vert"></i> </a>
                <ul class="dropdown-menu">

                  <? if($user['user'] == $entry[0]['creator'] || $user['rol'] == 'admin') { ?>
                  
                  <li><a href="/<?= $_SERVER['VIEWS'].'/edit?type=entry&id='.$entry[0]['id']?>" title="Editar"><i class="material-icons">mode_edit</i>Editar</a></li>
                  <li><a onclick="javascript: if(!confirm('Vas a eliminar esta entrada permanentemente.\n¿Estás seguro?')) { return false }" href="/action/delete?type=entry&id=<?= $entry[0]['id']?>" title="Eliminar"><i class="material-icons">delete</i>Eliminar</a></li>

                  <? } ?>

                </ul>
              </li>
            </ul>
          </div>
          <div class="body pt-0">
            <?php 
            if(!empty($entry[0])) { ?>
              
              <?php if(!empty($entry[0]['description'])) { ?>
              <h5 class="col-grey mt-2 mb-4"><?= html_entity_decode($entry[0]['description'], ENT_QUOTES | ENT_HTML5) ?></h5>
              <?php } ?>

              <div class="code-description"><?= html_entity_decode($entry[0]['explanation'], ENT_QUOTES | ENT_HTML5) ?></div>


              <?php if(!empty($entry[0]['html']) || !empty($entry[0]['css']) || !empty($entry[0]['javascript'])) { ?>
              <div class="row code_boxes mt-4">
                <div class="col-lg-4">
                  <h6 class="code-title">
                    <div class="code-logo">
                      <img src="/assets/images/logos/html.svg" alt="language-logo">
                    </div>HTML
                  </h6>
                  <textarea id="box_html" autocomplete="off"><?= $entry[0]['html'] ?></textarea>
                  <span class="fullscreen-leyend">Pulsa "Ctrl + Intro" para ver en pantalla completa</span>
                </div>
                <div class="col-lg-4">
                  <h6 class="code-title">
                    <div class="code-logo">
                      <img src="/assets/images/logos/css.svg" alt="language-logo">
                    </div>CSS
                  </h6>
                  <textarea id="box_css" autocomplete="off"><?= $entry[0]['css'] ?></textarea>
                  <span class="fullscreen-leyend">Pulsa "Ctrl + Intro" para ver en pantalla completa</span>
                </div>
                <div class="col-lg-4">
                  <h6 class="code-title">
                    <div class="code-logo">
                      <img src="/assets/images/logos/javascript.svg" alt="language-logo">
                    </div>JavaScript
                  </h6>
                  <textarea id="box_js" autocomplete="off"><?= $entry[0]['javascript'] ?></textarea>
                  <span class="fullscreen-leyend">Pulsa "Ctrl + Intro" para ver en pantalla completa</span>
                </div>
              </div>
              <?php } ?>


              <?php if($entry[0]['executable']) { ?>
              <div class="row mt-4">
                <div class="col-12">
                  <div class="execute-box">
                    <iframe src="/<?= $_SERVER['VIEWS'] ?>/iframes/page<?= $entry[0]['id'] ?>.php"></iframe>
                  </div>
                </div>
              </div>
              <?php } ?>


              <? if(!empty($entry[0]['git'])) { ?>
              <div class="row mt-4">
                <div class="col-12">
                  <h6 class="code-title">
                    <div class="code-logo">
                      <img src="/assets/images/logos/git.svg" alt="language-logo">
                    </div>Git
                  </h6>
                  <textarea class="box_otherCode" autocomplete="off"><?= $entry[0]['git'] ?></textarea>
                  <span class="fullscreen-leyend">Pulsa "Ctrl + Intro" para ver en pantalla completa</span>
                </div>
              </div>
              <? } ?>

              <? if(!empty($entry[0]['mysql'])) { ?>
              <div class="row mt-4">
                <div class="col-12">
                  <h6 class="code-title">
                    <div class="code-logo">
                      <img src="/assets/images/logos/mysql.svg" alt="language-logo">
                    </div>MySQL
                  </h6>
                  <textarea id="mysql" autocomplete="off"><?= $entry[0]['mysql'] ?></textarea>
                  <span class="fullscreen-leyend">Pulsa "Ctrl + Intro" para ver en pantalla completa</span>
                </div>
              </div>
              <? } ?>

              <? if(!empty($entry[0]['php'])) { ?>
              <div class="row mt-4">
                <div class="col-12">
                  <h6 class="code-title">
                    <div class="code-logo">
                      <img src="/assets/images/logos/php.svg" alt="language-logo">
                    </div>PHP
                  </h6>
                  <textarea id="php" autocomplete="off"><?= $entry[0]['php'] ?></textarea>
                  <span class="fullscreen-leyend">Pulsa "Ctrl + Intro" para ver en pantalla completa</span>
                </div>
              </div>
              <? } ?>

              <? if(!empty($entry[0]['reactjs'])) { ?>
              <div class="row mt-4">
                <div class="col-12">
                  <h6 class="code-title">
                    <div class="code-logo">
                      <img src="/assets/images/logos/react.svg" alt="language-logo">
                    </div>ReactJS
                  </h6>
                  <textarea id="reactjs" autocomplete="off"><?= $entry[0]['reactjs'] ?></textarea>
                  <span class="fullscreen-leyend">Pulsa "Ctrl + Intro" para ver en pantalla completa</span>
                </div>
              </div>
              <? } ?>

              <? if(!empty($entry[0]['xampp'])) { ?>
              <div class="row mt-4">
                <div class="col-12">
                  <h6 class="code-title">
                    <div class="code-logo">
                      <img src="/assets/images/logos/xampp.svg" alt="language-logo">
                    </div>XAMPP
                  </h6>
                  <textarea class="box_otherCode" autocomplete="off"><?= $entry[0]['xampp'] ?></textarea>
                  <span class="fullscreen-leyend">Pulsa "Ctrl + Intro" para ver en pantalla completa</span>
                </div>
              </div>
              <? } ?>

              <? if(!empty($entry[0]['terminal'])) { ?>
              <div class="row mt-4">
                <div class="col-12">
                  <h6 class="code-title">
                    <div class="code-logo">
                      <img src="/assets/images/logos/terminal.svg" alt="language-logo">
                    </div>Terminal
                  </h6>
                  <textarea id="terminal" autocomplete="off"><?= $entry[0]['terminal'] ?></textarea>
                  <span class="fullscreen-leyend">Pulsa "Ctrl + Intro" para ver en pantalla completa</span>
                </div>
              </div>
              <? } ?>






              <div class="mt-4 entry-details">
              	<div class="row">
                  <div class="col-12">
                    <div class="font-11"><strong>Autor:</strong> <a href="/?creator=<?= $entry[0]['creator'] ?>" class="creator col-grey" title="Ver todas las entradas de <?= $entry[0]['creator'] ?>"><?= $entry[0]['creator'] ?></a></div>
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
                <div class="row">
                  <div class="col-12">
                    <div class="link-box mt-2">
                      <div class="languages-logos">
                        <div class="font-11 mb-1"><strong>Categorías:</strong></div>
                        <?php foreach ($entry[0]['categories'] as $category) { ?>
                        <a href="/?c=<?=$category['descriptive_name']?>" title="<?= $category['category_name']?>">
                          <img src="<?= $category['category_logo'] ?>">
                        </a>&nbsp;&nbsp;
                        <?php } ?>
                      </div>
                    </div>
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