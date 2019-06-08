<!DOCTYPE html>
<html>
<head>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <style>
  .same_height {
  background: #ccc;
}
  </style>
  <link rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
</head>
<body>
  <div class="row">
	<div class="col-4">
		<div class="same_height">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat.
		</div>
	</div>
	<div class="col-4">
		<div class="same_height">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua.
		</div>
	</div>
	<div class="col-4">
		<div class="same_height">
			Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original.
		</div>
	</div>
</div>
  <script>
    //Mismo height para varios contenedores
$(document).ready(function() {
  var altura_arr = [];
  $('.same_height').each(function() {
    var altura = $(this).height();
    altura_arr.push(altura);
  });
  altura_arr.sort(function(a, b) {return b-a});
  $('.same_height').each(function() {
    $(this).css(
      'height',parseInt(altura_arr[0]) +
      parseInt($(this).css('padding-top')) +
      parseInt($(this).css('padding-bottom'))
    );
  });
});
  </script>
</body>
</html>