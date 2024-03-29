<section class="content pt-3">
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-lg-12">
        <div class="card">
          <div class="body">
            <h2><?= LANG['contact_title'] ?></h2>
            <div class="row">
              <div class="col-12">
                <div class="mb-2">
                  <span class="font-11"><?= LANG['fields_mark_asterisk_requireds'] ?></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-7 col-12">
                <div class="contact-form">
                  <form action="#" method="POST" id="contactForm">
                    <div class="row">
                      <div class="col-lg-6 co-12">
                        <input type="text" name="name" class="custom-input" placeholder="<?= LANG['name'] ?>" required>
                      </div>
                      <div class="col-lg-6 co-12">
                        <input type="email" name="email" class="custom-input" placeholder="<?= LANG['email'] ?>" required>
                      </div>
                      <div class="col-lg-12 co-12">
                        <textarea name="message" rows="3" class="custom-input auto-growth" autocomplete="off" placeholder="<?= LANG['message'] ?>" maxlength="30000" required></textarea>
                        <span class="characters">30000</span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 mt-2 mb-2">
                        <input type="checkbox" name="conditions" id="conditions" class="filled-in chk-col-amber" required>
                        <label for="conditions"><?= LANG['at_send_form_accept'] ?> <a href="#" data-toggle="modal" data-target="#lopd"><?= LANG['privacy_policy'] ?></a> <?= LANG['of_this_website'] ?></label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 mb-2">
                        <div class="g-recaptcha mb-2" data-sitekey="6LfZEqsUAAAAAPMQx77lOsDhyD35mpgzZfu06o3U"></div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <input type="submit" class="btn btn-large btn-raised bg-custom waves-effect" value="<?= LANG['send_message'] ?>">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="form-send-animation">
                          <div class="bouncing-loader">
                            <div></div>
                            <div></div>
                            <div></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-lg-5 col-12">
                <div class="contact-info">
                  <div class="row">
                    <div class="col-6">
                      <div class="contact-detail">
                        <a href="mailto:info@frontendtools.net">
                          <div class="img-box">
                            <img src="/assets/images/email-white.svg" />
                          </div>
                          <span class="title"><?= LANG['email'] ?></span>
                          <span>info@frontendtools.net</span>
                        </a>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="contact-detail">
                        <a href="#">
                          <div class="img-box">
                            <img src="/assets/images/location-white.svg" />
                          </div>
                          <span class="title"><?= LANG['location'] ?></span>
                          <span>In the world</span>
                        </a>
                      </div>
                    </
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
