<!DOCTYPE html>
<html>
<head>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <style>
  
  </style>
  <link rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
</head>
<body>
  <div id="res"></div>
  <script>
    let lenguajes = ['js', 'php', 'phyton'];
let frameworks = ['react', 'laravel', 'django'];

// Sprear operator ...
let combinacion = [...lenguajes,...frameworks];

document.querySelector('#res').innerHTML = combinacion;
  </script>
</body>
</html>