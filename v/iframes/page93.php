<!DOCTYPE html>
<html>
<head>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <style>
  
  </style>
  
  
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