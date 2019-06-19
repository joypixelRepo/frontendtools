<section class="content pt-3" id="exec-page">
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-lg-12">
        <div class="card mb-3">
          <div class="header pb-0">
            <h1 class="mb-3 titles"><?= html_entity_decode($entry['title'], ENT_QUOTES | ENT_HTML5) ?></h1>
            <ul class="header-dropdown m-r--5 float-right">
              <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more-vert"></i> </a>
                <ul class="dropdown-menu">

                  <? if($user['user'] == $entry['creator'] || $user['rol'] == 'admin') { ?>
                  
                  <?php if($entry['executable']) { ?>
                  <li><a href="/<?= $_SERVER['VIEWS'] ?>/iframes/page<?= $entry['id'] ?>.php" title="Pantalla completa" target="_blank"><i class="material-icons">open_in_new</i>Ampliar</a></li>
                  <?php } ?>

                  <li><a href="/<?= $_SERVER['VIEWS'].'/edit?type=entry&id='.$entry['id']?>" title="Editar"><i class="material-icons">mode_edit</i>Editar</a></li>
                  <li><a onclick="javascript: if(!confirm('Vas a eliminar esta entrada permanentemente.\n¿Estás seguro?')) { return false }" href="/action/delete?type=entry&id=<?= $entry['id']?>" title="Eliminar"><i class="material-icons">delete</i>Eliminar</a></li>

                  <? } ?>

                </ul>
              </li>
            </ul>
          </div>
          <div class="body pt-0">
            <?php if(!empty($entry['description'])) { ?>
            <h5 class="col-grey mt-2 mb-4"><?= html_entity_decode($entry['description'], ENT_QUOTES | ENT_HTML5) ?></h5>
            <?php } ?>

            <div class="code-description"><?= html_entity_decode($entry['explanation'], ENT_QUOTES | ENT_HTML5) ?></div>


            <?php if(!empty($entry['html']) || !empty($entry['css']) || !empty($entry['javascript'])) { ?>
            <div class="row code_boxes mt-4">
              <div class="col-lg-4">
                <h6 class="code-title">
                  <div class="code-logo">
                    <img src="/assets/images/logos/html.svg" alt="language-logo">
                  </div>HTML
                </h6>
                <textarea id="box_html" autocomplete="off"><?= $entry['html'] ?></textarea>
                <span class="fullscreen-leyend">Pulsa "Ctrl + Intro" para ver en pantalla completa</span>
              </div>
              <div class="col-lg-4">
                <h6 class="code-title">
                  <div class="code-logo">
                    <img src="/assets/images/logos/css.svg" alt="language-logo">
                  </div>CSS
                </h6>
                <textarea id="box_css" autocomplete="off"><?= $entry['css'] ?></textarea>
                <span class="fullscreen-leyend">Pulsa "Ctrl + Intro" para ver en pantalla completa</span>
              </div>
              <div class="col-lg-4">
                <h6 class="code-title">
                  <div class="code-logo">
                    <img src="/assets/images/logos/javascript.svg" alt="language-logo">
                  </div>JavaScript / jQuery
                </h6>
                <textarea id="box_js" autocomplete="off"><?= $entry['javascript'] ?></textarea>
                <span class="fullscreen-leyend">Pulsa "Ctrl + Intro" para ver en pantalla completa</span>
              </div>
            </div>
            <?php } ?>


            <?php if($entry['executable']) { ?>
            <div class="row mt-4">
              <div class="col-12">
                <div class="execute-box">
                  <iframe src="/<?= $_SERVER['VIEWS'] ?>/iframes/page<?= $entry['id'] ?>.php"></iframe>
                </div>
              </div>
            </div>
            <?php } ?>


            <? if(!empty($entry['git'])) { ?>
            <div class="row mt-4">
              <div class="col-12">
                <h6 class="code-title">
                  <div class="code-logo">
                    <img src="/assets/images/logos/git.svg" alt="language-logo">
                  </div>Git
                </h6>
                <textarea class="box_otherCode" autocomplete="off"><?= $entry['git'] ?></textarea>
                <span class="fullscreen-leyend">Pulsa "Ctrl + Intro" para ver en pantalla completa</span>
              </div>
            </div>
            <? } ?>

            <? if(!empty($entry['mysql'])) { ?>
            <div class="row mt-4">
              <div class="col-12">
                <h6 class="code-title">
                  <div class="code-logo">
                    <img src="/assets/images/logos/mysql.svg" alt="language-logo">
                  </div>MySQL
                </h6>
                <textarea id="mysql" autocomplete="off"><?= $entry['mysql'] ?></textarea>
                <span class="fullscreen-leyend">Pulsa "Ctrl + Intro" para ver en pantalla completa</span>
              </div>
            </div>
            <? } ?>

            <? if(!empty($entry['php'])) { ?>
            <div class="row mt-4">
              <div class="col-12">
                <h6 class="code-title">
                  <div class="code-logo">
                    <img src="/assets/images/logos/php.svg" alt="language-logo">
                  </div>PHP
                </h6>
                <textarea id="php" autocomplete="off"><?= $entry['php'] ?></textarea>
                <span class="fullscreen-leyend">Pulsa "Ctrl + Intro" para ver en pantalla completa</span>
              </div>
            </div>
            <? } ?>

            <? if(!empty($entry['reactjs'])) { ?>
            <div class="row mt-4">
              <div class="col-12">
                <h6 class="code-title">
                  <div class="code-logo">
                    <img src="/assets/images/logos/react.svg" alt="language-logo">
                  </div>ReactJS
                </h6>
                <textarea id="reactjs" autocomplete="off"><?= $entry['reactjs'] ?></textarea>
                <span class="fullscreen-leyend">Pulsa "Ctrl + Intro" para ver en pantalla completa</span>
              </div>
            </div>
            <? } ?>

            <? if(!empty($entry['xampp'])) { ?>
            <div class="row mt-4">
              <div class="col-12">
                <h6 class="code-title">
                  <div class="code-logo">
                    <img src="/assets/images/logos/xampp.svg" alt="language-logo">
                  </div>XAMPP
                </h6>
                <textarea class="box_otherCode" autocomplete="off"><?= $entry['xampp'] ?></textarea>
                <span class="fullscreen-leyend">Pulsa "Ctrl + Intro" para ver en pantalla completa</span>
              </div>
            </div>
            <? } ?>

            <? if(!empty($entry['terminal'])) { ?>
            <div class="row mt-4">
              <div class="col-12">
                <h6 class="code-title">
                  <div class="code-logo">
                    <img src="/assets/images/logos/terminal.svg" alt="language-logo">
                  </div>Terminal
                </h6>
                <textarea id="terminal" autocomplete="off"><?= $entry['terminal'] ?></textarea>
                <span class="fullscreen-leyend">Pulsa "Ctrl + Intro" para ver en pantalla completa</span>
              </div>
            </div>
            <? } ?>






            <div class="mt-4 entry-details">
            	<div class="row">
                <div class="col-12">
                  <div class="font-11"><strong>Autor:</strong> <a href="/?creator=<?= $entry['creator'] ?>" class="creator col-grey" title="Ver todas las entradas de <?= $entry['creator'] ?>"><?= $entry['creator'] ?></a></div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="font-11"><strong>Creado:</strong> <?= strftime('%e %B %Y a las %H:%M', strtotime($entry['creation_date'])) ?></div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="font-11"><strong>Última edición:</strong> <?= strftime('%e %B %Y a las %H:%M', strtotime($entry['edition_date'])) ?></div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="link-box mt-2">
                    <div class="languages-logos">
                      <div class="font-11 mb-1"><strong>Categorías:</strong></div>
                      <?php foreach ($entry['categories'] as $category) { ?>
                      <a href="/?c=<?=$category['descriptive_name']?>" title="<?= $category['category_name']?>">
                        <img src="<?= $category['category_logo'] ?>">
                      </a>&nbsp;&nbsp;
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="entry-comments">
          <div class="card">
            <div class="card-body">
              <h4 class="mb-4">Comentarios <?= isset($comments) & count($comments) > 0 ? '<span class="comments-count">('.count($comments).')</span>' : '' ?></h4>
              <? if(!empty($comments)) { ?>
              <? foreach ($comments as $comment) { ?>
              <div class="entry-comment">
                <div class="row">
                  <div class="col-12">
                    <table>
                      <tr>
                        <td class="comment-user-avatar">
                          <img class="comment-avatar" src="<?= file_exists($_SERVER['DOCUMENT_ROOT'].$comment['image']) ? $comment['image'] : '/assets/images/avatars/default/default.svg' ?>" alt="avatar">
                        </td>
                        <td class="comment-comment">
                          <a href="/?creator=<?= $comment['user'] ?>">
                            <span class="comment-user-name" title="Ver entradas de <?= $comment['user'] ?>"><?= $comment['user'] ?></span>
                          </a>
                          <span class="comment-date"><?= strftime('%e %B %Y a las %H:%M', strtotime($comment['comment_date'])) ?></span>
                          <div class="comment-text"><?= $comment['comment'] ?></div>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              <? } ?>
              <? } ?>

              <? if($session) { ?>
              <a href="#" id="comment-btn" class="btn btn-raised bg-custom waves-effect"><i class="material-icons">chat</i>&nbsp;&nbsp;Escribir comentario</a>
              <form id="comment-form" action="/action/saveComment" method="POST">
                <textarea id="ckeditor" name="comment" maxlength="1023"></textarea>
                <input type="hidden" name="url" value="<?= urlencode($_SERVER['REQUEST_URI']) ?>">
                <input type="hidden" name="id" value="<?= $entry['id'] ?>">
                <button type="submit" class="btn btn-raised bg-custom waves-effect mt-4"><i class="material-icons">chat</i>&nbsp;&nbsp;Publicar comentario</button>
              </form>
              <? } ?>

            </div>
          </div>
        </div>


      </div>
    </div>
  </div>
</section>