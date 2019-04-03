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
													<input type="text" class="form-control" name="title" maxlength="255" required autocomplete="off" value="<?= $entry[0]['title'] ?>">
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<!-- CKEditor -->
											<h6>Descripción</h6>
											<textarea id="ckeditor" name="description" required><?= $entry[0]['description'] ?></textarea>
											<!-- #END# CKEditor -->
										</div>
									</div>
									<div class="row row-content">
										<div class="col-12">
											<div class="form-group mb-2">
												<div class="form-line">
													<h6>Código</h6>
													<textarea name="content" rows="1" class="textarea-code form-control no-resize auto-growth" autocomplete="off"><?= $entry[0]['content'] ?></textarea>
												</div>
											</div>
										</div>
									</div>
									<div class="row box-codes">
										<div class="col-lg-4 col-12">
											<div class="form-group mb-2">
												<div class="form-line">
													<h6>HTML</h6>
													<textarea name="html" rows="1" class="textarea-code form-control no-resize auto-growth" autocomplete="off"><?= $entry[0]['html'] ?></textarea>
												</div>
											</div>
										</div>
										<div class="col-lg-4 col-12">
											<div class="form-group mb-2">
												<div class="form-line">
													<h6>CSS</h6>
													<textarea name="css" rows="1" class="textarea-code form-control no-resize auto-growth" autocomplete="off"><?= $entry[0]['css'] ?></textarea>
												</div>
											</div>
										</div>
										<div class="col-lg-4 col-12">
											<div class="form-group mb-2">
												<div class="form-line">
													<h6>JavaScript</h6>
													<textarea name="javascript" rows="1" class="textarea-code form-control no-resize auto-growth" autocomplete="off"><?= $entry[0]['javascript'] ?></textarea>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<h6>Categoría</h6>

												<?php foreach ($categories as $category) {
													$checked = '';
													foreach ($entry[0]['categories'] as $value) {
														if($value['category_id'] == $category['id_category']) {
															$checked = 'checked';
														}
													} ?>
													<input type="checkbox" id="<?= $category['id_category'] ?>" name="categories[]" value="<?= $category['id_category'] ?>" class="filled-in chk-col-amber" <?= $checked ?> />
                        	<label for="<?= $category['id_category'] ?>"><?= $category['category_name'] ?></label>&nbsp;&nbsp;&nbsp;
												<?php } ?>

										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<button type="submit" class="btn btn-raised bg-cyan waves-effect mt-4" onclick="javascript: if(!confirm('Vas a editar esta entrada.\n¿Estás seguro?')) { return false }"><i class="zmdi zmdi-save"></i>&nbsp;&nbsp;Guardar</button>
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