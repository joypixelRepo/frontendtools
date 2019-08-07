<section class="content pt-3 create-entry">
	<div class="container-fluid">
		<div class="row clearfix">
			<div class="col-lg-12">
				<div class="card">
					<div class="body">
						<h1 class="titles"><?= LANG['create_new_entry'] ?></h1>
						<?php if($session) { ?>
						<div class="row">
							<div class="col-12">
								<form id="new-entry-form" action="/action/save_entry" method="POST">
                  
                  <div class="row">
                    <div class="col-12 mt-4 check-categories">
                      <h6><?= LANG['category_s'] ?></h6>

                        <?php foreach ($categories as $category) { ?>
                        <label for="<?= $category['id_category'] ?>" class="category-select"><img src="<?= $category['category_logo'] ?>" data-toggle="tooltip" data-placement="bottom" title="<?= $category['category_name']?>"></label>
                        <input type="checkbox" class="logo-checkbox" id="<?= $category['id_category'] ?>" name="categories[]" value="<?= $category['id_category'] ?>" data_category="<?= $category['descriptive_name'] ?>"/>
                        <?php } ?>

                    </div>
                  </div>

									<div class="row">
										<div class="col-12">
                      <div class="mt-4">
  											<h6><?= LANG['title'] ?></h6>
                        <textarea name="title" rows="1" class="custom-input auto-growth" autocomplete="off" placeholder="<?= LANG['entry_title'] ?>" maxlength="100"></textarea>
                        <span class="characters">100</span>
                        <div id="errorTitle"></div>
                      </div>
										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<div class="mt-4">
												<h6><?= LANG['short_description'] ?></h6>
												<textarea name="description" rows="1" class="custom-input auto-growth" autocomplete="off" placeholder="<?= LANG['write_a_short_description'] ?>" maxlength="255"></textarea>
                        <span class="characters">255</span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<div class="mt-4 mb-4">
												<h6><?= LANG['detail_description'] ?></h6>
												<!-- <textarea name="explanation" rows="3" class="custom-input auto-growth" autocomplete="off" placeholder="Explica detalladamente en qué consiste la entrada" maxlength="65535"></textarea> -->
												<textarea id="ckeditor" name="explanation" maxlength="65535"></textarea>
                        <!-- <span class="characters">65535</span> -->
											</div>
										</div>
									</div>

									<div class="row box-codes">
										<div class="col-lg-4 col-12" data-full="full-html">
											<div class="mt-2 mb-2">
												<div class="form-box">
													<h6 class="code-title">
                            <div class="code-logo">
                              <img src="/assets/images/logos/html.svg" alt="language-logo">
                            </div>HTML
                          </h6>
													<textarea id="box_html" name="html" autocomplete="off"></textarea>
                          <span class="fullscreen-leyend"><?= LANG['press_ctrl_intro_fullscreen'] ?></span>
												</div>
											</div>
										</div>
										<div class="col-lg-4 col-12" data-full="full-css">
											<div class="mt-2 mb-2">
												<div class="form-box">
													<h6 class="code-title">
                            <div class="code-logo">
                              <img src="/assets/images/logos/css.svg" alt="language-logo">
                            </div>CSS
                          </h6>
													<textarea id="box_css" name="css" autocomplete="off"></textarea>
                          <span class="fullscreen-leyend"><?= LANG['press_ctrl_intro_fullscreen'] ?></span>
												</div>
											</div>
										</div>
										<div class="col-lg-4 col-12" data-full="full-js">
											<div class="mt-2 mb-2">
												<div class="form-box">
													<h6 class="code-title">
                            <div class="code-logo">
                              <img src="/assets/images/logos/javascript.svg" alt="language-logo">
                            </div>JavaScript / jQuery
                          </h6>
													<textarea id="box_js" name="javascript" autocomplete="off"></textarea>
                          <span class="fullscreen-leyend"><?= LANG['press_ctrl_intro_fullscreen'] ?></span>
												</div>
											</div>
										</div>
									</div>


                  <div class="row row-content box-git">
                    <div class="col-12">
                      <div class="mt-2 mb-2">
                        <div class="form-box">
                          <h6 class="code-title">
                            <div class="code-logo">
                              <img src="/assets/images/logos/git.svg" alt="language-logo">
                            </div>Git
                          </h6>
                          <textarea class="box_otherCode" name="git" autocomplete="off"></textarea>
                          <span class="fullscreen-leyend"><?= LANG['press_ctrl_intro_fullscreen'] ?></span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row row-content box-mysql">
                    <div class="col-12">
                      <div class="mt-2 mb-2">
                        <div class="form-box">
                          <h6 class="code-title">
                            <div class="code-logo">
                              <img src="/assets/images/logos/mysql.svg" alt="language-logo">
                            </div>MySQL
                          </h6>
                          <textarea id="mysql" name="mysql" autocomplete="off"></textarea>
                          <span class="fullscreen-leyend"><?= LANG['press_ctrl_intro_fullscreen'] ?></span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row row-content box-php">
                    <div class="col-12">
                      <div class="mt-2 mb-2">
                        <div class="form-box">
                          <h6 class="code-title">
                            <div class="code-logo">
                              <img src="/assets/images/logos/php.svg" alt="language-logo">
                            </div>PHP
                          </h6>
                          <textarea id="php" name="php" autocomplete="off"></textarea>
                          <span class="fullscreen-leyend"><?= LANG['press_ctrl_intro_fullscreen'] ?></span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row row-content box-laravel">
                    <div class="col-12">
                      <div class="mt-2 mb-2">
                        <div class="form-box">
                          <h6 class="code-title">
                            <div class="code-logo">
                              <img src="/assets/images/logos/laravel.svg" alt="language-logo">
                            </div>Laravel
                          </h6>
                          <textarea id="laravel" name="laravel" autocomplete="off"></textarea>
                          <span class="fullscreen-leyend"><?= LANG['press_ctrl_intro_fullscreen'] ?></span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row row-content box-reactjs">
                    <div class="col-12">
                      <div class="mt-2 mb-2">
                        <div class="form-box">
                          <h6 class="code-title">
                            <div class="code-logo">
                              <img src="/assets/images/logos/react.svg" alt="language-logo">
                            </div>ReactJS
                          </h6>
                          <textarea id="reactjs" name="reactjs" autocomplete="off"></textarea>
                          <span class="fullscreen-leyend"><?= LANG['press_ctrl_intro_fullscreen'] ?></span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row row-content box-xampp">
                    <div class="col-12">
                      <div class="mt-2 mb-2">
                        <div class="form-box">
                          <h6 class="code-title">
                            <div class="code-logo">
                              <img src="/assets/images/logos/xampp.svg" alt="language-logo">
                            </div>XAMPP
                          </h6>
                          <textarea class="box_otherCode" name="xampp" autocomplete="off"></textarea>
                          <span class="fullscreen-leyend"><?= LANG['press_ctrl_intro_fullscreen'] ?></span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row row-content box-terminal">
                    <div class="col-12">
                      <div class="mt-2 mb-2">
                        <div class="form-box">
                          <h6 class="code-title">
                            <div class="code-logo">
                              <img src="/assets/images/logos/terminal.svg" alt="language-logo">
                            </div>Terminal
                          </h6>
                          <textarea id="terminal" name="terminal" autocomplete="off"></textarea>
                          <span class="fullscreen-leyend"><?= LANG['press_ctrl_intro_fullscreen'] ?></span>
                        </div>
                      </div>
                    </div>
                  </div>


									<div class="row">
										<div class="col-12">
											<button type="submit" class="btn btn-raised bg-custom waves-effect mt-4"><i class="zmdi zmdi-save"></i>&nbsp;&nbsp;<?= LANG['save'] ?></button>
										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<div class="alerts"></div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<?php } else { ?>
						<div class="row">
							<div class="col-12">
								<?= LANG['no_privileges'] ?>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>