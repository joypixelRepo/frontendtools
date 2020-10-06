<section class="content profile-page">
    <section class="boxs-simple mb-3">
        <div class="profile-header">
            <div class="profile_info row">

                <div class="col-lg-3 col-md-4 col-12">
                    <div class="profile-image float-md-right">
                        <a href="#" id="editImage">
                            <img src="<?=file_exists($_SERVER['DOCUMENT_ROOT'] . $user['image']) ? $user['image'] : '/assets/images/avatars/default/default.svg'?>" alt="profile-img">
                        </a>
                    </div>
                </div>

                <div class="col-lg-6 col-md-8 col-12">
                    <h4 class="m-t-5 m-b-0"><?=$user['name']?></h4>

                    <?if ($user['job'] != '-1') {?>
                      <span class="job_post"><?=$user['job']?></span>
                    <?}?>

                    <?if (!empty($user['github'])) {?>
                    <p class="social-icon mt-1 m-b-0">

                        <a title="Github" href="<?=$user['github']?>" target="_blank"><i class="zmdi zmdi-github"></i></a>

                    </p>
                    <?}?>

                    <a href="#" id="profile_edit" class="btn btn-raised bg-custom waves-effect mt-3" data-toggle="modal" data-target="#editProfileModal"><?=LANG['edit_profile']?></a>

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
                                <h3 class="text-center"><?=LANG['change_avatar']?></h3>
                                <p class="text-center"><?=LANG['click_to_modify_avatar']?></p>
                                <div class="avatars avatars-edit">
                                <?foreach ($avatars['files'] as $avatar) {?>
                                    <a href="#" data-image="<?=$avatar?>"><img src="<?=$avatar?>" alt="avatar"/></a>
                                <?}?>
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
                  <?if (isset($userCategories)) {?>
                    <div class="header">
                      <h3 class="text-center title-profile"><?=LANG['your_entries']?></h3>
                      <p class="text-center"><?=LANG['your_entries_classified_by_categories']?></p>
                    </div>
                    <div class="row profile_state list-unstyled">
                        <?php
foreach ($userCategories as $userCategory) {?>
                          <li class="col-lg-2 col-md-4 col-6">
                            <div class="body">
                                <div class="profile-categories">
                                  <a href="/?c=<?=$userCategory['descriptive_name']?>&creator=<?=$user['user']?>">
                                    <img src="<?=$userCategory['category_logo']?>">
                                    <h4><?=$userCategory['entriesCount']?></h4>
                                    <span><?=$userCategory['category_name']?></span>
                                  </a>
                                </div>
                            </div>
                          </li>
                        <?}?>
                    </div>
                    <div class="text-center">
                      <a href="/?creator=<?=$user['user']?>" class="btn btn-raised bg-custom waves-effect mt-4 mb-4"><?=LANG['view_all_my_entries']?></a>
                    </div>
                  <?} else {?>
                    <div class="header">
                      <h3 class="text-center title-profile"><?=LANG['your_entries']?></h3>
                      <p class="text-center"><?=LANG['no_entries_so_far']?></p>
                      <p class="text-center">
                        <a href="/<?=$_SERVER['VIEWS']?>/newCode">
                          <button type="button" class="btn bg-custom waves-effect"><?=LANG['create_my_first_entry']?></button>
                        </a>
                      </p>
                    </div>
                  <?}?>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-sm-12">
                <div class="card">
                  <div class="header">
                    <h3 class="title-profile"><?=LANG['account_options']?></h3>

                    <div class="profile-option">
                      <form action="/user/deleteAccount" method="POST">
                        <button type="submit" <?=$user['rol'] == 'admin' ? 'disabled title="' . LANG['no_delete_admin_account'] . '"' : ''?> class="btn bg-custom waves-effect" onclick="javascript: if(!confirm('<?=LANG['caution_all_entries_deleted']?>')) { return false }"><?=LANG['delete_my_account']?></button>
                      </form>
                    </div>

                  </div>
                </div>
            </div>
        </div>
    </div>

</section>

<div class="modal fade custom-modal" id="editProfileModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel"><?=LANG['edit_profile']?></h4>
            </div>
            <div class="modal-body">
              <form action="/user/editProfile" method="POST">


                <div class="row">
                  <div class="col-12 mb-3">
                    <label><?=LANG['name_and_last_name']?></label>
                    <input type="text" name="full-name" class="custom-input" placeholder="<?=LANG['name_and_last_name']?>" required value="<?=$user['name']?>">
                  </div>


                </div>

                <div class="row">
                  <div class="col-12 mb-3">
                    <label><?=LANG['select_what_you_do']?></label>
                    <select class="custom-select" name="job">
                      <option value="-1" selected class="disabled">- <?=LANG['select_what_you_do']?> -</option>
                      <option value="Web Designer" <?=$user['job'] == 'Web Designer' ? 'selected' : ''?>>Web Designer</option>
                      <option value="Front End Developer" <?=$user['job'] == 'Front End Developer' ? 'selected' : ''?>>Front End Developer</option>

                      <option value="UI Designer" <?=$user['job'] == 'UI Designer' ? 'selected' : ''?>>UI Designer</option>
                      <option value="UX Designer" <?=$user['job'] == 'UX Designer' ? 'selected' : ''?>>UX Designer</option>
                      <option value="Interaction Designer" <?=$user['job'] == 'Interaction Designer' ? 'selected' : ''?>>Interaction Designer</option>
                      <option value="Art Director" <?=$user['job'] == 'Art Director' ? 'selected' : ''?>>Art Director</option>
                      <option value="Web Developer" <?=$user['job'] == 'Web Developer' ? 'selected' : ''?>>Web Developer</option>
                      <option value="Full Stack Developer" <?=$user['job'] == 'Full Stack Developer' ? 'selected' : ''?>>Full Stack Developer</option>
                      <option value="Content Strategist" <?=$user['job'] == 'Content Strategist' ? 'selected' : ''?>>Content Strategist</option>
                      <option value="IT Technician" <?=$user['job'] == 'IT Technician' ? 'selected' : ''?>>IT Technician</option>
                      <option value="Dev Ops" <?=$user['job'] == 'Dev Ops' ? 'selected' : ''?>>Dev Ops</option>
                      <option value="Product Manager" <?=$user['job'] == 'Product Manager' ? 'selected' : ''?>>Product Manager</option>
                      <option value="Customer Service Representative" <?=$user['job'] == '_______' ? 'selected' : ''?>>Customer Service Representative</option>
                      <option value="SEO Specialist" <?=$user['job'] == 'SEO Specialist' ? 'selected' : ''?>>SEO Specialist</option>
                      <option value="Graphic Designer" <?=$user['job'] == 'Graphic Designer' ? 'selected' : ''?>>Graphic Designer</option>
                      <option value="Software Engineer / Programmer" <?=$user['job'] == 'Software Engineer / Programmer' ? 'selected' : ''?>>Software Engineer / Programmer</option>
                      <option value="Other" <?=$user['job'] == 'Other' ? 'selected' : ''?>>Other</option>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col-12 mb-3">
                    <label><?=LANG['email']?></label>
                    <input type="email" name="email" class="custom-input" placeholder="<?=LANG['email']?>" required value="<?=$user['email']?>">
                  </div>
                </div>

                <div class="row">
                  <div class="col-12 mb-4">
                    <label><?=LANG['github_account']?></label>
                    <input type="text" name="github" class="custom-input sign_up_icon github-bg" placeholder="https://github.com/..." pattern="https:\/\/github.com\/(.+)" value="<?=$user['github']?>">
                  </div>
                </div>

                <button type="button" class="btn btn-link waves-effect btn-cancel" data-dismiss="modal"><?=LANG['cancel']?></button>

                <button type="submit" class="btn btn-link waves-effect btn-submit"><?=LANG['save_changes']?></button>

              </form>
            </div>

        </div>
    </div>
</div>