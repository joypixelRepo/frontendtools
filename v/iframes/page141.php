<!DOCTYPE html>
<html>
<head>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <style>
  .invoiceBox > input {
  display: none;
}
.invoiceBox label {
	display: block;
}
.boxFile {
	display: inline-block;
  width: 100%;
  border: 1px solid grey;
  background: #fff;
  color: grey;
  padding: 10px;
  text-align: center;
  font-weight: 500;
  font-size: 14px;
  -webkit-transition: all 0.3s;
  transition: all 0.3s;
}
.boxFile:hover {
	cursor: pointer;
	background: grey;
	color: #fff;
}
.boxFile i {
	display: block;
	font-size: 26px;
	margin-bottom: 5px;
}
.attached,
.attached:hover,
.attached:focus {
	background: green;
  color: #fff;
  border: 1px solid green;
}
  </style>
  <link rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.min.css">
  
</head>
<body>
  <div class="row">
	<div class="col-sm-4 col-12">
    <div class="invoiceBox">
      <label for="file">
        <div class="boxFile" data-text="Seleccionar archivo">
          Seleccionar archivo
        </div>
      </label>
      <input id="file" multiple="" name="invoice[]" size="6000" type="file" accept="application/pdf,image/x-png,image/gif,image/jpeg,image/jpg,image/tiff">
    </div>
  </div>
</div>
  <script>
    document.querySelector('#file').addEventListener('change', function(e) {
  var boxFile = document.querySelector('.boxFile');
  boxFile.classList.remove('attached');
  boxFile.innerHTML = boxFile.getAttribute("data-text");
  if(this.value != '') {
    var allowedExtensions = /(\.pdf|\.jpg|\.jpeg|\.png|\.gif\.tiff)$/i;
    if(allowedExtensions.exec(this.value)) {
      boxFile.innerHTML = e.target.files[0].name;
      boxFile.classList.add('attached');
    } else {
      this.value = '';
      alert('El archivo que intentas subir no está permitido.\nLos archivos permitidos son .pdf, .jpg, .jpeg, .png, .gif y .tiff');
      boxFile.classList.remove('attached');
    }
  }
});
  </script>
</body>
</html>