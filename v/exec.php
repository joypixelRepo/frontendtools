<section class="content pt-3" id="exec-page">
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-lg-12">
        <div class="card mb-3">
          <div class="header pb-0">

            <div class="share-social d-none d-sm-block mb-4">
              <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= urlencode('https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']) ?>&title=<?= $entry['title'] ?>&source=LinkedIn" target="_blank" title="<?= LANG['share_on_linkedin'] ?>">
                <img src="/assets/images/social/linkedin-logo.svg" alt="social-icon">
              </a>
              <a href="https://www.facebook.com/sharer.php?u=https://<?= $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ?>" target="_blank" title="<?= LANG['share_on_facebook'] ?>">
                <img src="/assets/images/social/facebook-logo.svg" alt="social-icon">
              </a>
              <a href="https://twitter.com/intent/tweet?text=<?= $entry['title'] ?>&url=https://<?= $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ?>" target="_blank" title="<?= LANG['share_on_twitter'] ?>">
                <img src="/assets/images/social/twitter-logo.svg" alt="social-icon">
              </a>
              <!-- whatsapp desktop -->
              <a href="https://api.whatsapp.com/send?text=<?= $entry['title'].' '.urlencode('https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']) ?>" target="_blank" title="<?= LANG['share_on_whatsapp'] ?>">
                <img src="/assets/images/social/whatsapp-logo.svg" alt="social-icon">
              </a>
              <a href="mailto:info@frontendtools.net?subject=<?= $entry['title'] ?>&body=<?= LANG['share_on_email_text'] ?> <?= urlencode('https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']) ?>" target="_blank" title="<?= LANG['share_on_email'] ?>">
                <img src="/assets/images/social/email-logo.svg" alt="social-icon">
              </a>
            </div>

            <h1 class="mb-3 titles"><?= html_entity_decode($entry['title'], ENT_QUOTES | ENT_HTML5) ?></h1>
            <ul class="header-dropdown m-r--5 float-right">
              <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more-vert"></i> </a>
                <ul class="dropdown-menu">

                  <?php if($entry['executable']) { ?>
                  <li><a href="/<?= $_SERVER['VIEWS'] ?>/iframes/page<?= $entry['id'] ?>.php" title="<?= LANG['fullscreen'] ?>" target="_blank"><i class="material-icons">open_in_new</i><?= LANG['extend'] ?></a></li>
                  <?php } ?>

                  <? if($user['user'] == $entry['creator'] || $user['rol'] == 'admin') { ?>

                  <li><a href="/<?= $_SERVER['VIEWS'].'/edit?type=entry&id='.$entry['id']?>" title="<?= LANG['edit'] ?>"><i class="material-icons">mode_edit</i><?= LANG['edit'] ?></a></li>
                  <li><a onclick="javascript: if(!confirm('<?= LANG['del_entry'] ?>')) { return false }" href="/action/delete?type=entry&id=<?= $entry['id']?>" title="<?= LANG['delete'] ?>"><i class="material-icons">delete</i><?= LANG['delete'] ?></a></li>

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

                <div class="actions-codemirror text-right">
                  <a href="#" data-action="copy" title="<?= LANG['copy_to_clipboard'] ?>"><i class="material-icons">content_copy</i></a>
                  <a href="#" data-action="maximize" title="<?= LANG['view_on_fullscreen'] ?>"><i class="material-icons">aspect_ratio</i></a>
                </div>
                <textarea id="box_html" autocomplete="off"><?= $entry['html'] ?></textarea>
                <span class="fullscreen-leyend"><?= LANG['press_ctrl_intro_fullscreen'] ?></span>
              </div>
              <div class="col-lg-4">
                <h6 class="code-title">
                  <div class="code-logo">
                    <img src="/assets/images/logos/css.svg" alt="language-logo">
                  </div>CSS
                </h6>

                <div class="actions-codemirror text-right">
                  <a href="#" data-action="copy" title="<?= LANG['copy_to_clipboard'] ?>"><i class="material-icons">content_copy</i></a>
                  <a href="#" data-action="maximize" title="<?= LANG['view_on_fullscreen'] ?>"><i class="material-icons">aspect_ratio</i></a>
                </div>
                <textarea id="box_css" autocomplete="off"><?= $entry['css'] ?></textarea>
                <span class="fullscreen-leyend"><?= LANG['press_ctrl_intro_fullscreen'] ?></span>
              </div>
              <div class="col-lg-4">
                <h6 class="code-title">
                  <div class="code-logo">
                    <img src="/assets/images/logos/javascript.svg" alt="language-logo">
                  </div>JavaScript / jQuery
                </h6>

                <div class="actions-codemirror text-right">
                  <a href="#" data-action="copy" title="<?= LANG['copy_to_clipboard'] ?>"><i class="material-icons">content_copy</i></a>
                  <a href="#" data-action="maximize" title="<?= LANG['view_on_fullscreen'] ?>"><i class="material-icons">aspect_ratio</i></a>
                </div>
                <textarea id="box_js" autocomplete="off"><?= $entry['javascript'] ?></textarea>
                <span class="fullscreen-leyend"><?= LANG['press_ctrl_intro_fullscreen'] ?></span>
              </div>
            </div>
            <?php } ?>


            <?php if($entry['executable']) { ?>
            <div class="row mt-4">
              <div class="col-12">
                <a class="btn-full-code" href="/<?= $_SERVER['VIEWS'] ?>/iframes/page<?= $entry['id'] ?>.php" title="<?= LANG['fullscreen'] ?>" target="_blank"><i class="material-icons">open_in_new</i><?= LANG['extend'] ?></a>
              </div>
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

                <div class="actions-codemirror text-right">
                  <a href="#" data-action="copy" title="<?= LANG['copy_to_clipboard'] ?>"><i class="material-icons">content_copy</i></a>
                  <a href="#" data-action="maximize" title="<?= LANG['view_on_fullscreen'] ?>"><i class="material-icons">aspect_ratio</i></a>
                </div>
                <textarea class="box_otherCode" autocomplete="off"><?= $entry['git'] ?></textarea>
                <span class="fullscreen-leyend"><?= LANG['press_ctrl_intro_fullscreen'] ?></span>
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

                <div class="actions-codemirror text-right">
                  <a href="#" data-action="copy" title="<?= LANG['copy_to_clipboard'] ?>"><i class="material-icons">content_copy</i></a>
                  <a href="#" data-action="maximize" title="<?= LANG['view_on_fullscreen'] ?>"><i class="material-icons">aspect_ratio</i></a>
                </div>
                <textarea id="mysql" autocomplete="off"><?= $entry['mysql'] ?></textarea>
                <span class="fullscreen-leyend"><?= LANG['press_ctrl_intro_fullscreen'] ?></span>
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

                <div class="actions-codemirror text-right">
                  <a href="#" data-action="copy" title="<?= LANG['copy_to_clipboard'] ?>"><i class="material-icons">content_copy</i></a>
                  <a href="#" data-action="maximize" title="<?= LANG['view_on_fullscreen'] ?>"><i class="material-icons">aspect_ratio</i></a>
                </div>
                <textarea id="php" autocomplete="off"><?= $entry['php'] ?></textarea>
                <span class="fullscreen-leyend"><?= LANG['press_ctrl_intro_fullscreen'] ?></span>
              </div>
            </div>
            <? } ?>

            <? if(!empty($entry['laravel'])) { ?>
            <div class="row mt-4">
              <div class="col-12">
                <h6 class="code-title">
                  <div class="code-logo">
                    <img src="/assets/images/logos/laravel.svg" alt="language-logo">
                  </div>PHP
                </h6>

                <div class="actions-codemirror text-right">
                  <a href="#" data-action="copy" title="<?= LANG['copy_to_clipboard'] ?>"><i class="material-icons">content_copy</i></a>
                  <a href="#" data-action="maximize" title="<?= LANG['view_on_fullscreen'] ?>"><i class="material-icons">aspect_ratio</i></a>
                </div>
                <textarea id="laravel" autocomplete="off"><?= $entry['laravel'] ?></textarea>
                <span class="fullscreen-leyend"><?= LANG['press_ctrl_intro_fullscreen'] ?></span>
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

                <div class="actions-codemirror text-right">
                  <a href="#" data-action="copy" title="<?= LANG['copy_to_clipboard'] ?>"><i class="material-icons">content_copy</i></a>
                  <a href="#" data-action="maximize" title="<?= LANG['view_on_fullscreen'] ?>"><i class="material-icons">aspect_ratio</i></a>
                </div>
                <textarea id="reactjs" autocomplete="off"><?= $entry['reactjs'] ?></textarea>
                <span class="fullscreen-leyend"><?= LANG['press_ctrl_intro_fullscreen'] ?></span>
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

                <div class="actions-codemirror text-right">
                  <a href="#" data-action="copy" title="<?= LANG['copy_to_clipboard'] ?>"><i class="material-icons">content_copy</i></a>
                  <a href="#" data-action="maximize" title="<?= LANG['view_on_fullscreen'] ?>"><i class="material-icons">aspect_ratio</i></a>
                </div>
                <textarea class="box_otherCode" autocomplete="off"><?= $entry['xampp'] ?></textarea>
                <span class="fullscreen-leyend"><?= LANG['press_ctrl_intro_fullscreen'] ?></span>
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

                <div class="actions-codemirror text-right">
                  <a href="#" data-action="copy" title="<?= LANG['copy_to_clipboard'] ?>"><i class="material-icons">content_copy</i></a>
                  <a href="#" data-action="maximize" title="<?= LANG['view_on_fullscreen'] ?>"><i class="material-icons">aspect_ratio</i></a>
                </div>
                <textarea id="terminal" autocomplete="off"><?= $entry['terminal'] ?></textarea>
                <span class="fullscreen-leyend"><?= LANG['press_ctrl_intro_fullscreen'] ?></span>
              </div>
            </div>
            <? } ?>

          </div>
        </div>

        <div class="card mb-3">
          <div class="body">
            <div class="entry-details">
              <div class="row">
                <div class="col-12">
                  <h4 class="mb-2"><?= LANG['details'] ?></h4>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="font-11"><strong><?= LANG['author'] ?></strong> <a href="/?creator=<?= $entry['creator'] ?>" class="creator col-grey" title="<?= LANG['view_all_entries_of'] ?> <?= $entry['creator'] ?>"><?= $entry['creator'] ?></a></div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="font-11"><strong><?= LANG['created'] ?></strong> <?= strftime('%e %B %Y', strtotime($entry['creation_date'])) ?></div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="font-11"><strong><?= LANG['last_edition'] ?></strong> <?= strftime('%e %B %Y', strtotime($entry['edition_date'])) ?></div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="link-box mt-2">
                    <div class="languages-logos">
                      <div class="font-11 mb-1"><strong><?= LANG['categories_min'] ?>:</strong></div>
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

        <div class="entry-comments" id="comments">
          <div class="card">
            <div class="card-body">
              <h4 class="mb-4"><?= LANG['comments_cap'] ?> <span class="comments-count"><?= isset($comments) & count($comments) > 0 ? '('.count($comments).')' : '(0)' ?></span></h4>
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
                              <span class="comment-user-name" title="<?= LANG['view_entries_of'] ?> <?= $comment['user'] ?>"><?= $comment['user'] ?></span>
                            </a>
                            <span class="comment-date"><?= strftime('%e %B %Y a las %H:%M', strtotime($comment['comment_date'])) ?></span>
                            <div class="comment-text"><pre><?= $comment['comment'] ?></pre></div>
                          </td>
                          <td class="comments-buttons text-right">
                            <? if($user['user'] == $comment['user'] || $user['rol'] == 'admin') { ?>
                            <a onclick="javascript: if(!confirm('<?= LANG['delete_comment_sure'] ?>')) { return false }" href="/action/delete?type=comment&id=<?= $comment['comment_id']?>&url=<?= $_SERVER['REQUEST_URI'] ?>#comments" title="<?= LANG['delete_comment'] ?>" class="coment-icon"><button type="button" class="btn btn-raised btn-default btn-circle waves-effect waves-circle waves-float"> <i class="material-icons">delete</i> </button></a>
                            <? } ?>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
                <? } ?>
              <? } ?>

              <? if($session) { ?>
              <a href="#" id="comment-btn" class="btn btn-raised bg-custom waves-effect"><i class="material-icons">chat</i>&nbsp;&nbsp;<?= LANG['write_comment'] ?></a>
              <form id="comment-form" action="/action/saveComment" method="POST" class="mt-2">
                <div class="row">
                  <div class="col-12">
                    <textarea class="custom-text-area" name="comment" maxlength="1023" placeholder="<?= LANG['write_comment_as'] ?> <?= $_SESSION['user']['user'] ?>..."></textarea>
                  </div>
                </div>
                <input type="hidden" name="url" value="<?= urlencode($_SERVER['REQUEST_URI']) ?>#comments">
                <input type="hidden" name="id" value="<?= $entry['id'] ?>">
                <button type="submit" class="btn btn-raised bg-custom waves-effect mt-2"><i class="material-icons">chat</i>&nbsp;&nbsp;<?= LANG['publish_comment'] ?></button>
              </form>
              <? } ?>

            </div>
          </div>
        </div>


      </div>
    </div>
  </div>

  <div class="share-social-mobile d-block d-sm-none text-center">

    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= urlencode('https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']) ?>&title=<?= $entry['title'] ?>&source=LinkedIn" target="_blank" title="<?= LANG['share_on_linkedin'] ?>" class="linkedin-social-icon-mobile social-icon-mobile">
      <img src="/assets/images/social/linkedin-flat-logo.svg" alt="social-icon">
    </a>

    <a href="https://www.facebook.com/sharer.php?u=https://<?= $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ?>" target="_blank" title="<?= LANG['share_on_facebook'] ?>" class="facebook-social-icon-mobile social-icon-mobile">
      <img src="/assets/images/social/facebook-flat-logo.svg" alt="social-icon">
    </a>

    <a href="https://twitter.com/intent/tweet?text=<?= $entry['title'] ?>&url=https://<?= $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ?>" target="_blank" title="<?= LANG['share_on_twitter'] ?>" class="twitter-social-icon-mobile social-icon-mobile">
      <img src="/assets/images/social/twitter-flat-logo.svg" alt="social-icon">
    </a>

    <a href="https://api.whatsapp.com/send?text=<?= $entry['title'].' '.urlencode('https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']) ?>" target="_blank" class="whatsapp-social-icon-mobile social-icon-mobile">
      <img src="/assets/images/social/whatsapp-flat-logo.svg" alt="social-icon" title="<?= LANG['share_on_whatsapp'] ?>">
    </a>

    <a href="mailto:info@frontendtools.net?subject=<?= $entry['title'] ?>" target="_blank" title="<?= LANG['share_on_email'] ?>" class="email-social-icon-mobile social-icon-mobile">
      <img src="/assets/images/social/email-logo.svg" alt="social-icon">
    </a>

  </div>

</section>