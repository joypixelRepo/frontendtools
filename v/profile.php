<section class="content profile-page">
    <section class="boxs-simple mb-3">
        <div class="profile-header">
            <div class="profile_info row">
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="profile-image float-md-right">
                        <a href="#" id="editImage">
                            <img src="<?= file_exists($_SERVER['DOCUMENT_ROOT'].$user['image']) ? $user['image'] : '/assets/images/avatars/default/default.svg' ?>" alt="profile-img">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8 col-12">
                    <h4 class="m-t-5 m-b-0"><?= $user['name'] ?></h4>
                    <span class="job_post"><?= $user['job'] ?></span>
                    <p class="social-icon mt-1 m-b-0">
                        
                        <? if(!empty($user['github'])) { ?>
                        <a title="Github" href="<?= $user['github'] ?>" target="_blank"><i class="zmdi zmdi-github"></i></a>
                        <? } ?>

                    </p>
                </div>                
            </div>
        </div>
    </section>
    <div class="container-fluid oculto" id="box-edit-image">
        <div class="row clearfix">
            <div class="col-sm-12">
                <div class="card">
                    <div class="row">
                        <div class="col-12">
                            <div class="body">
                                <h3 class="text-center"><?= LANG['change_avatar'] ?></h3>
                                <p class="text-center"><?= LANG['click_to_modify_avatar'] ?></p>
                                <div class="avatars avatars-edit">
                                <? foreach ($avatars['files'] as $avatar) { ?>
                                    <a href="#" data-image="<?= $avatar ?>"><img src="<?= $avatar ?>" alt="avatar"/></a>
                                <? } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-sm-12">
                <div class="card">
                  <? if(isset($userCategories)) { ?>
                    <div class="header">
                      <h3 class="text-center title-profile"><?= LANG['your_entries'] ?></h3>
                      <p class="text-center"><?= LANG['your_entries_classified_by_categories'] ?></p>
                    </div>
                    <div class="row profile_state list-unstyled">
                        <?php
                        foreach ($userCategories as $userCategory) { ?>
                          <li class="col-lg-2 col-md-4 col-6">
                            <div class="body">
                                <div class="profile-categories">
                                  <a href="/?c=<?= $userCategory['descriptive_name'] ?>&creator=<?= $user['user'] ?>">
                                    <img src="<?= $userCategory['category_logo'] ?>">
                                    <h4><?= $userCategory['entriesCount'] ?></h4>
                                    <span><?= $userCategory['category_name'] ?></span>
                                  </a>
                                </div>
                            </div>
                          </li>
                        <? } ?>
                    </div>
                    <div class="text-center">
                      <a href="/?creator=<?= $user['user'] ?>" class="btn btn-raised bg-custom waves-effect mt-4 mb-4"><?= LANG['view_all_my_entries'] ?></a>
                    </div>
                  <? } else { ?>
                    <div class="header">
                      <h3 class="text-center title-profile"><?= LANG['your_entries'] ?></h3>
                      <p class="text-center"><?= LANG['no_entries_so_far'] ?></p>
                      <p class="text-center">
                        <a href="/<?= $_SERVER['VIEWS'] ?>/newCode">
                          <button type="button" class="btn bg-custom waves-effect"><?= LANG['create_my_first_entry'] ?></button>
                        </a>
                      </p>
                    </div>
                  <? } ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-sm-12">
                <div class="card">
                  <div class="header">
                    <h3 class="title-profile"><?= LANG['account_options'] ?></h3>

                    <div class="profile-option">
                      <form action="/user/deleteAccount" method="POST">
                        <button type="submit" <?= $user['rol'] == 'admin' ? 'disabled title="'.LANG['no_delete_admin_account'].'"' : '' ?> class="btn bg-custom waves-effect" onclick="javascript: if(!confirm('<?= LANG['caution_all_entries_deleted'] ?>')) { return false }"><?= LANG['delete_my_account'] ?></button>
                      </form>
                    </div>

                  </div>
                </div>
            </div>
        </div>
    </div>
    
</section>