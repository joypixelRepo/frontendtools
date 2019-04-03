<section class="content pt-3">
	<div class="container-fluid">
		<div class="row clearfix">
			<div class="col-lg-12">
				<div class="card">
					<div class="body">
						<h2>Crear nuevo extracto de código</h2>
						<?php if($session) { ?>
						<div class="row">
							<div class="col-12">
								<form action="/action/save_entry" method="POST">
									<div class="row">
										<div class="col-12">
											<h6>Ejecutable</h6>
											<div class="switch">
			                  <label>
			                  	<input type="checkbox" name="executable">
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
													<input type="text" class="form-control" name="title" maxlength="255" required autocomplete="off">
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<!-- CKEditor -->
											<h6>Descripción</h6>
											<textarea id="ckeditor" name="description" required></textarea>
											<!-- #END# CKEditor -->
										</div>
									</div>
									<div class="row row-content">
										<div class="col-12">
											<div class="form-group mb-2">
												<div class="form-line">
													<h6>Código</h6>
													<textarea name="content" rows="1" class="textarea-code form-control no-resize auto-growth" autocomplete="off"></textarea>
												</div>
											</div>
										</div>
									</div>
									<div class="row box-codes">
										<div class="col-lg-4 col-12">
											<div class="form-group mb-2">
												<div class="form-line">
													<h6>HTML</h6>
													<textarea name="html" rows="1" class="textarea-code form-control no-resize auto-growth" autocomplete="off"></textarea>
												</div>
											</div>
										</div>
										<div class="col-lg-4 col-12">
											<div class="form-group mb-2">
												<div class="form-line">
													<h6>CSS</h6>
													<textarea name="css" rows="1" class="textarea-code form-control no-resize auto-growth" autocomplete="off"></textarea>
												</div>
											</div>
										</div>
										<div class="col-lg-4 col-12">
											<div class="form-group mb-2">
												<div class="form-line">
													<h6>JavaScript</h6>
													<textarea name="javascript" rows="1" class="textarea-code form-control no-resize auto-growth" autocomplete="off"></textarea>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-12 mt-4 check-categories">
											<h6>Categoría</h6>

												<?php foreach ($categories as $category) { ?>
												<input type="checkbox" id="<?= $category['id_category'] ?>" name="categories[]" value="<?= $category['id_category'] ?>" class="filled-in category<?= $category['id_category'] ?>" />
                        <label for="<?= $category['id_category'] ?>"><?= $category['category_name'] ?></label>&nbsp;&nbsp;&nbsp;
												<?php } ?>

										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<button type="submit" class="btn btn-raised bg-custom waves-effect mt-4"><i class="zmdi zmdi-save"></i>&nbsp;&nbsp;Guardar</button>
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