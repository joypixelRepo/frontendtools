<section class="content pt-3">
	<div class="container-fluid">
		<div class="row clearfix">
			<div class="col-lg-12">
				<div class="card">
					<div class="body">
						<h2>Generador de texto aleatorio</h2>
						<div class="row">
							<div class="col-lg-3 col-md-3 col-3">
								<div class="form-group mt-0 mb-2">
									<div class="form-line">
										<input type="text" class="form-control" id="number" placeholder="Número" value="7">
									</div>
								</div>
							</div>
							<div class="col-lg-9 col-md-9 col-9">
								<div class="options-group mt-2">
									<input type="radio" name="sentencesOrParagraph" id="paragraphs" checked value="paras" class="with-gap radio-col-indigo" />
									<label for="paragraphs">Párrafos</label>
									<input type="radio" name="sentencesOrParagraph" id="sentences" value="sentences" class="with-gap radio-col-indigo" />
									<label for="sentences">Frases</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-12 mt-2 mb-2">
								<input type="checkbox" id="start_with" class="chk-col-amber">
								<label for="start_with">Empezar con ´Bacon ipsum dolor amet´...</label>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<input type="button" class="btn btn-raised btn-primary waves-effect mb-3" id="baconButton" value="Generar texto">
								<input type="button" class="btn btn-raised btn-primary waves-effect mb-3" id="copy" value="Copiar texto">
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<span class="badge badge-primary mb-2" id="charactersCount"></span>
								<span class="badge badge-success mb-2" id="paragraphsCount"></span>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div id="baconIpsumOutput"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
