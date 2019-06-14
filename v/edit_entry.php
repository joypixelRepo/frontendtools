<section class="content pt-3 create-entry" id="edit-entry">
	<div class="container-fluid">
		<div class="row clearfix">
			<div class="col-lg-12">
				<div class="card">
					<div class="body">
						<div class="float-right">
              <a href="/<?= $_SERVER['VIEWS'].'/exec?id='.$entry['id']?>" title="Ver entrada">
                <button type="button" class="btn btn-raised btn-default btn-circle waves-effect waves-circle waves-float"> <i class="material-icons">remove_red_eye</i> </button>
              </a>
            </div>
            <span class="info-label">
              <i class="material-icons">info_outline</i>Editando entrada
            </span>
						<h1 class="titles"><?= $entry['title'] ?></h1>
						<?php if($session) { ?>
						<div class="row">
							<div class="col-12">
								<form id="edit-entry-form" action="/action/edit_entry" method="POST">
									<input type="hidden" name="id" value="<?= $_GET['id'] ?>">
									<input type="hidden" name="url" value="<?= urlencode($_SERVER['REQUEST_URI']) ?>">
                  <div class="row">
                    <div class="col-12 mt-4 check-categories">
                      <h6>Categoría</h6>

                        <?php foreach ($categories as $category) {
                          $checked = '';
                          $className = '';
                          foreach ($entry['categories'] as $value) {
                            if($value['category_id'] == $category['id_category']) {
                              $checked = 'checked';
                              $className = 'category-selected';
                            }
                          } ?>
                          <label for="<?= $category['id_category'] ?>" class="category-select <?= $className ?>"><img src="<?= $category['category_logo'] ?>" data-toggle="tooltip" data-placement="bottom" title="<?= $category['category_name']?>"></label>
                          <input type="checkbox" id="<?= $category['id_category'] ?>" name="categories[]" value="<?= $category['id_category'] ?>" class="logo-checkbox category<?= $category['id_category'] ?>" <?= $checked ?> data_category="<?= $category['descriptive_name'] ?>"/>
                        <?php } ?>

                    </div>
                  </div>
									<div class="row">
										<div class="col-12">
											<div class="mt-4">
												<h6>Título</h6>
                        <textarea name="title" rows="1" class="custom-input auto-growth" autocomplete="off" placeholder="Título de la entrada" maxlength="100"><?= $entry['title'] ?></textarea>
                        <span class="characters">100</span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<div class="mt-4">
												<h6>Breve descripción</h6>
												<textarea name="description" rows="1" class="custom-input auto-growth" autocomplete="off" placeholder="Escribe una breve descripción"placeholder="Escribe una breve descripción" maxlength="255"><?= $entry['description'] ?></textarea>
                        <span class="characters">255</span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<div class="mt-4 mb-4">
												<h6>Descripción detallada</h6>
												<!-- <textarea name="explanation" rows="3" class="custom-input auto-growth" autocomplete="off" placeholder="Explica detalladamente en qué consiste la entrada" maxlength="65535"><?= $entry['explanation'] ?></textarea> -->
                        <!-- CKEditor -->
                        <textarea id="ckeditor" name="explanation" maxlength="65535"><?= $entry['explanation'] ?></textarea>
                        <!-- #END# CKEditor -->
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
                          <textarea id="box_html" name="html" autocomplete="off"><?= $entry['html'] ?></textarea>
                          <span class="fullscreen-leyend">Pulsa "Ctrl + Intro" para ver en pantalla completa</span>
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
                          <textarea id="box_css" name="css" autocomplete="off"><?= $entry['css'] ?></textarea>
                          <span class="fullscreen-leyend">Pulsa "Ctrl + Intro" para ver en pantalla completa</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-12" data-full="full-js">
                      <div class="mt-2 mb-2">
                        <div class="form-box">
                          <h6 class="code-title">
                            <div class="code-logo">
                              <img src="/assets/images/logos/javascript.svg" alt="language-logo">
                            </div>JavaScript
                          </h6>
                          <textarea id="box_js" name="javascript" autocomplete="off"><?= $entry['javascript'] ?></textarea>
                          <span class="fullscreen-leyend">Pulsa "Ctrl + Intro" para ver en pantalla completa</span>
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
                          <textarea class="box_otherCode" name="git" autocomplete="off"><?= $entry['git'] ?></textarea>
                          <span class="fullscreen-leyend">Pulsa "Ctrl + Intro" para ver en pantalla completa</span>
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
                          <textarea id="mysql" name="mysql" autocomplete="off"><?= $entry['mysql'] ?></textarea>
                          <span class="fullscreen-leyend">Pulsa "Ctrl + Intro" para ver en pantalla completa</span>
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
                          <textarea id="php" name="php" autocomplete="off"><?= $entry['php'] ?></textarea>
                          <span class="fullscreen-leyend">Pulsa "Ctrl + Intro" para ver en pantalla completa</span>
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
                          <textarea id="reactjs" name="reactjs" autocomplete="off"><?= $entry['reactjs'] ?></textarea>
                          <span class="fullscreen-leyend">Pulsa "Ctrl + Intro" para ver en pantalla completa</span>
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
                          <textarea class="box_otherCode" name="xampp" autocomplete="off"><?= $entry['xampp'] ?></textarea>
                          <span class="fullscreen-leyend">Pulsa "Ctrl + Intro" para ver en pantalla completa</span>
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
                          <textarea id="terminal" name="terminal" autocomplete="off"><?= $entry['terminal'] ?></textarea>
                          <span class="fullscreen-leyend">Pulsa "Ctrl + Intro" para ver en pantalla completa</span>
                        </div>
                      </div>
                    </div>
                  </div>


									<div class="row">
										<div class="col-12">
											<button type="submit" class="btn btn-raised bg-custom waves-effect mt-4" onclick="javascript: if(!confirm('Vas a editar esta entrada.\n¿Estás seguro?')) { return false }"><i class="zmdi zmdi-save"></i>&nbsp;&nbsp;Guardar</button>
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
								No tienes suficientes privilegios para ver el contenido de esta página.
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>