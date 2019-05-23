<section class="content pt-3 create-entry">
	<div class="container-fluid">
		<div class="row clearfix">
			<div class="col-lg-12">
				<div class="card">
					<div class="body">
						<h2>Crear nuevo extracto de código</h2>
						<?php if($session) { ?>
						<div class="row">
							<div class="col-12">
								<form id="new-entry-form" action="/action/save_entry" method="POST">
									<div class="row">
										<div class="col-12">
											<h6>Ejecutable</h6>
											<div class="switch">
			                  <label>
			                  	<input type="checkbox" name="executable" checked>
			                    <span class="lever switch-col-amber"></span>
			                  </label>
			                </div>
										</div>
									</div>
									<div class="row">
										<div class="col-12">
                      <div class="mt-4">
  											<h6>Título</h6>
                        <textarea name="title" rows="1" class="custom-input auto-growth" autocomplete="off" placeholder="Título de la entrada" maxlength="100"></textarea>
                        <span class="characters">100</span>
                      </div>
										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<div class="mt-4">
												<h6>Breve descripción</h6>
												<textarea name="description" rows="1" class="custom-input auto-growth" autocomplete="off" placeholder="Escribe una breve descripción" maxlength="255"></textarea>
                        <span class="characters">255</span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<div class="mt-4">
												<h6>Descripción larga</h6>
												<textarea name="explanation" rows="3" class="custom-input auto-growth" autocomplete="off" placeholder="Explica detalladamente en qué consiste la entrada" maxlength="65535"></textarea>
                        <span class="characters">65535</span>
											</div>
											<!-- CKEditor -->
											<!-- <textarea id="ckeditor" name="explanation" required></textarea> -->
											<!-- #END# CKEditor -->
										</div>
									</div>
									<div class="row row-content">
										<div class="col-12">
											<div class="form-group mb-2">
												<div class="form-line">
													<h6>Código</h6>
													<textarea id="box_otherCode" name="content" autocomplete="off"></textarea>
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
														<div class="col-6 hidden-mobile">
															<div class="float-right">
																<a href="#" id="full-html" class="full-code"><i class="material-icons">aspect_ratio</i></a>
															</div>
														</div>
													</div>
													<textarea id="box_html" name="html" autocomplete="off"></textarea>
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
														<div class="col-6 hidden-mobile">
															<div class="float-right">
																<a href="#" id="full-css" class="full-code"><i class="material-icons">aspect_ratio</i></a>
															</div>
														</div>
													</div>
													<textarea id="box_css" name="css" autocomplete="off"></textarea>
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
														<div class="col-6 hidden-mobile">
															<div class="float-right">
																<a href="#" id="full-js" class="full-code"><i class="material-icons">aspect_ratio</i></a>
															</div>
														</div>
													</div>
													<textarea id="box_js" name="javascript" autocomplete="off"></textarea>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-12 mt-4 check-categories">
											<h6>Categoría</h6>

												<?php foreach ($categories as $category) { ?>
												<input type="checkbox" id="<?= $category['id_category'] ?>" name="categories[]" value="<?= $category['id_category'] ?>" class="filled-in category<?= $category['id_category'] ?>" data_category="<?= $category['descriptive_name'] ?>"/>
                        <label for="<?= $category['id_category'] ?>"><?= $category['category_name'] ?></label>&nbsp;&nbsp;&nbsp;
												<?php } ?>

										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<button type="submit" class="btn btn-raised bg-custom waves-effect mt-4"><i class="zmdi zmdi-save"></i>&nbsp;&nbsp;Guardar</button>
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