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
                    <span class="job_post">Ui UX Designer</span>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    <p class="social-icon m-t-20 m-b-0">
                        <a title="Twitter" href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a>
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
                    <div class="row">
                        <div class="col-lg-2 col-md-4 col-sm-6 col-6 text-center">
                            <div class="body">
                            <p>Page View</p>
                            <input type="text" class="knob" value="42" data-linecap="round" data-width="80" data-height="80" data-thickness="0.15" data-fgColor="#00adef" readonly>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-6 col-6 text-center">
                            <div class="body">
                            <p>Storage</p>
                            <input type="text" class="knob" value="81" data-linecap="round" data-width="80" data-height="80" data-thickness="0.15" data-fgColor="#49cdd0" readonly>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-6 col-6 text-center">
                            <div class="body">
                            <p>New User</p>
                            <input type="text" class="knob" value="62" data-linecap="round" data-width="80" data-height="80" data-thickness="0.15" data-fgColor="#8f78db" readonly>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-6 col-6 text-center">
                            <div class="body">
                            <p>Total Visit</p>
                            <input type="text" class="knob" value="38" data-linecap="round" data-width="80" data-height="80" data-thickness="0.15" data-fgColor="#f67a82" readonly>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-6 col-6 text-center">
                            <div class="body">
                            <p>Subscribers</p>
                            <input type="text" class="knob" value="87" data-linecap="round" data-width="80" data-height="80" data-thickness="0.15" data-fgColor="#40b988" readonly>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-6 col-6 text-center">
                            <div class="body">
                            <p>Bounce Rate</p>
                            <input type="text" class="knob" value="64" data-linecap="round" data-width="80" data-height="80" data-thickness="0.15" data-fgColor="#f7bb97" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>