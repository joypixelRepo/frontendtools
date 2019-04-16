<section class="content pt-3">
	<div class="container-fluid">
		<div class="row clearfix">
			<div class="col-lg-12">
				<div class="card">
					<div class="body">
						<h2>Generador de degradados en CSS3</h2>
						<div class="row">
							<div class="col-lg-1 col-sm-2 col-3">
								<div class="gradient" gradient-type="linear-gradient" gradient-direction="to right" gradient-start="#942734" gradient-end="#BA53DA"></div>
							</div>
							<div class="col-lg-1 col-sm-2 col-3">
								<div class="gradient" gradient-type="linear-gradient" gradient-direction="to right" gradient-start="#05DF64" gradient-end="#545AAB"></div>
							</div>
							<div class="col-lg-1 col-sm-2 col-3">
								<div class="gradient" gradient-type="linear-gradient" gradient-direction="to right" gradient-start="#5532CB" gradient-end="#E67A1B"></div>
							</div>
							<div class="col-lg-1 col-sm-2 col-3">
								<div class="gradient" gradient-type="linear-gradient" gradient-direction="to right" gradient-start="#E98BA0" gradient-end="#DD0C78"></div>
							</div>
							<div class="col-lg-1 col-sm-2 col-3">
								<div class="gradient" gradient-type="linear-gradient" gradient-direction="to right" gradient-start="#FF6C67" gradient-end="#73E94E"></div>
							</div>
							<div class="col-lg-1 col-sm-2 col-3">
								<div class="gradient" gradient-type="linear-gradient" gradient-direction="to right" gradient-start="#68FBF8" gradient-end="#DB098B"></div>
							</div>
							<div class="col-lg-1 col-sm-2 col-3">
								<div class="gradient" gradient-type="linear-gradient" gradient-direction="to right" gradient-start="#F4B612" gradient-end="#F5D56F"></div>
							</div>
							<div class="col-lg-1 col-sm-2 col-3">
								<div class="gradient" gradient-type="linear-gradient" gradient-direction="to right" gradient-start="#80955E" gradient-end="#685179"></div>
							</div>
							<div class="col-lg-1 col-sm-2 col-3">
								<div class="gradient" gradient-type="linear-gradient" gradient-direction="to right" gradient-start="#7894A6" gradient-end="#8F8AF0"></div>
							</div>
							<div class="col-lg-1 col-sm-2 col-3">
								<div class="gradient" gradient-type="linear-gradient" gradient-direction="to right" gradient-start="#676E15" gradient-end="#95C100"></div>
							</div>
							<div class="col-lg-1 col-sm-2 col-3">
								<div class="gradient" gradient-type="linear-gradient" gradient-direction="to left" gradient-start="#ACBDC8" gradient-end="#F6E11A"></div>
							</div>
							<div class="col-lg-1 col-sm-2 col-3">
								<div class="gradient" gradient-type="radial-gradient" gradient-direction="to right" gradient-start="#2FF7AD" gradient-end="#60ADE1"></div>
							</div>
						</div>
            <div class="row">
            	<div class="col-6">
	            	<div class="input-group colorpicker" id="color1">
		              <div class="form-line">
		                <input type="text" class="form-control" value="#68c6e3" id="startColor">
		              </div>
		              <span class="input-group-addon"> <i></i> </span>
		            </div>
	            </div>
	            <div class="col-6">
	            	<div class="input-group colorpicker" id="color2">
		              <div class="form-line">
		                <input type="text" class="form-control" value="#7993ed" id="endColor">
		              </div>
		              <span class="input-group-addon"> <i></i> </span>
		            </div>
	            </div>
            </div>
            <div class="row">
            	<div class="col-lg-12">
            		<textarea id="gradientResult"></textarea>
            	</div>
            </div>
            <div class="row">
            	<div class="col-12 text-center">
            		<table class="directions">
	            		<tr>
	            			<td>
	            				<input name="direction" type="radio" data-type="linear-gradient" data-direction="to left top" id="toLeftUp" class="with-gap radio-col-indigo" />
			                <label for="toLeftUp"></label>
	            			</td>
	            			<td>
	            				<input name="direction" type="radio" data-type="linear-gradient" data-direction="to top" id="toUp" class="with-gap radio-col-indigo" />
			                <label for="toUp"></label>
	            			</td>
	            			<td>
	            				<input name="direction" type="radio" data-type="linear-gradient" data-direction="to right top" id="toRightUp" class="with-gap radio-col-indigo" />
			                <label for="toRightUp"></label>
	            			</td>
	            		</tr>
	            		<tr>
	            			<td>
	            				<input name="direction" type="radio" data-type="linear-gradient" data-direction="to left" id="toLeft" class="with-gap radio-col-indigo" />
			                <label for="toLeft"></label>
	            			</td>
	            			<td>
	            				<input name="direction" type="radio" data-type="radial-gradient" data-direction="" id="radial" class="with-gap radio-col-indigo" />
			                <label for="radial"></label>
	            			</td>
	            			<td>
	            				<input name="direction" checked type="radio" data-type="linear-gradient" data-direction="to right" id="toRight" class="with-gap radio-col-indigo" />
			                <label for="toRight"></label>
	            			</td>
	            		</tr>
	            		<tr>
	            			<td>
	            				<input name="direction" type="radio" data-type="linear-gradient" data-direction="to left bottom" id="toLeftDown" class="with-gap radio-col-indigo" />
			                <label for="toLeftDown"></label>
	            			</td>
	            			<td>
	            				<input name="direction" type="radio" data-type="linear-gradient" data-direction="to bottom" id="toDown" class="with-gap radio-col-indigo" />
			                <label for="toDown"></label>
	            			</td>
	            			<td>
	            				<input name="direction" type="radio" data-type="linear-gradient" data-direction="to right bottom" id="toRightDown" class="with-gap radio-col-indigo" />
			                <label for="toRightDown"></label>
	            			</td>
	            		</tr>
	            	</table>
            	</div>
            </div>
            <div class="row">
            	<div class="col-12">
            		<div id="code" class="alert alert-success"></div>
            	</div>
            </div>
            <div class="row">
            	<div class="col-12">
            		<button type="button" class="btn white waves-effect mb-2 switchColor" id="copy">Copiar código</button>
            		<button type="button" class="btn white waves-effect mb-2 switchColor" id="random-button">Generar degradado</button>
            	</div>
            </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
