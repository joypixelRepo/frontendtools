<section class="content pt-3">
	<div class="container-fluid">
		<div class="row clearfix">
			<div class="col-lg-12">
				<div class="card">
					<div class="body">
						<div class="float-right">
              <a href="/<?= $_SERVER['VIEWS'].'/exec?id='.$entry[0]['id']?>" title="Ver entrada">
                <button type="button" class="btn btn-raised btn-default btn-circle waves-effect waves-circle waves-float"> <i class="material-icons">remove_red_eye</i> </button>
              </a>
            </div>
						<h2>Editar extracto de código</h2>
						<?php if($session) { ?>
						<div class="row">
							<div class="col-12">
								<form id="edit-entry-form" action="/action/edit_entry" method="POST">
									<input type="hidden" name="id" value="<?= $_GET['id'] ?>">
									<input type="hidden" name="url" value="<?= urlencode($_SERVER['REQUEST_URI']) ?>">
									<div class="row">
										<div class="col-12">
											<h6>Ejecutable</h6>
											<div class="switch">
			                  <label>
			                  	<input type="checkbox" name="executable" <?= $entry[0]['executable'] ? 'checked' : '' ?>>
			                    <span class="lever switch-col-amber"></span>
			                  </label>
			                </div>
										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<div class="form-group">
												<div class="form-line">
													<h6>Título</h6>
													<input type="text" class="form-control" name="title" maxlength="255" autocomplete="off" value="<?= $entry[0]['title'] ?>" placeholder="Título de la entrada">
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<div class="form-group mb-2">
												<div class="form-line">
													<h6>Breve descripción</h6>
													<textarea name="description" rows="1" class="textarea-code form-control no-resize auto-growth" autocomplete="off" placeholder="Escribe una breve descripción"placeholder="Escribe una breve descripción"><?= $entry[0]['description'] ?></textarea>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-12 mt-5">
											<div class="form-group mb-2">
												<div class="form-line">
													<h6>Descripción larga</h6>
													<textarea name="explanation" rows="3" class="textarea-code form-control no-resize auto-growth" autocomplete="off" placeholder="Explica detalladamente en qué consiste la entrada"><?= $entry[0]['explanation'] ?></textarea>
												</div>
											</div>
											<!-- CKEditor -->
											<!-- #END# CKEditor -->
										</div>
									</div>
									<div class="row row-content">
										<div class="col-12">
											<div class="form-group mb-2">
												<div class="form-line">
													<h6>Código</h6>
													<textarea id="box_otherCode" name="content" autocomplete="off"><?= $entry[0]['content'] ?></textarea>
												</div>
											</div>
										</div>
									</div>
									<div class="row box-codes">
										<div class="col-lg-4 col-12" data-full="full-html">
											<div class="form-group mb-2">
												<div class="form-line">
													<div class="row">
														<div class="col-6">
															<h6>HTML</h6>
														</div>
														<div class="col-6">
															<div class="float-right">
																<a href="#" id="full-html"><i class="material-icons">aspect_ratio</i></a>
															</div>
														</div>
													</div>
													<textarea id="box_html" name="html" autocomplete="off"><?= $entry[0]['html'] ?></textarea>
												</div>
											</div>
										</div>
										<div class="col-lg-4 col-12" data-full="full-css">
											<div class="form-group mb-2">
												<div class="form-line">
													<div class="row">
														<div class="col-6">
															<h6>CSS</h6>
														</div>
														<div class="col-6">
															<div class="float-right">
																<a href="#" id="full-css"><i class="material-icons">aspect_ratio</i></a>
															</div>
														</div>
													</div>
													<textarea id="box_css" name="css" autocomplete="off"><?= $entry[0]['css'] ?></textarea>
												</div>
											</div>
										</div>
										<div class="col-lg-4 col-12" data-full="full-js">
											<div class="form-group mb-2">
												<div class="form-line">
													<div class="row">
														<div class="col-6">
															<h6>JavaScript</h6>
														</div>
														<div class="col-6">
															<div class="float-right">
																<a href="#" id="full-js"><i class="material-icons">aspect_ratio</i></a>
															</div>
														</div>
													</div>
													<textarea id="box_js" name="javascript" autocomplete="off"><?= $entry[0]['javascript'] ?></textarea>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-12 check-categories">
											<h6>Categoría</h6>

												<?php foreach ($categories as $category) {
													$checked = '';
													foreach ($entry[0]['categories'] as $value) {
														if($value['category_id'] == $category['id_category']) {
															$checked = 'checked';
														}
													} ?>
													<input type="checkbox" id="<?= $category['id_category'] ?>" name="categories[]" value="<?= $category['id_category'] ?>" class="filled-in category<?= $category['id_category'] ?>" <?= $checked ?> data_category="<?= $category['descriptive_name'] ?>"/>
                        	<label for="<?= $category['id_category'] ?>"><?= $category['category_name'] ?></label>&nbsp;&nbsp;&nbsp;
												<?php } ?>

										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<button type="submit" class="btn btn-raised bg-cyan waves-effect mt-4" onclick="javascript: if(!confirm('Vas a editar esta entrada.\n¿Estás seguro?')) { return false }"><i class="zmdi zmdi-save"></i>&nbsp;&nbsp;Guardar</button>
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