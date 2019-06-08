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
                    <p class="social-icon m-t-20 m-b-0">
                        <a title="Github" href="<?= $user['github'] ?>"><i class="zmdi zmdi-github"></i></a>
                        <a title="Facebook" href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a>
                        <a title="Instagram" href="javascript:void(0);"><i class="zmdi zmdi-instagram "></i></a>
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
                  <div class="header">
                    <h2>Tus entradas</h2>
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
                </div>
            </div>
        </div>
    </div>
</section>