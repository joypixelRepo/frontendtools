<!DOCTYPE html>
<html>
<head>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <style>
  
  </style>
  
  
</head>
<body>
  
  <script>
    // top:    distancia al borde superior del viewport
// left:   distancia al borde izquierdo del viewport
// right:  distancia al borde derecho del viewport
// bottom: distancia al borde inferior del viewport
// width:  ancho de la caja del elemento
// height: altura de la caja del elemento

let coords = el.getBoundingClientRect();

// distancia al borde superior del viewport
coords.top
// distancia al borde derecho del viewport
coords.right
// distancia al borde inferior del viewport
coords.bottom
// distancia al borde izquierdo del viewport
coords.left

// ancho del elemento                 
coords.width
// alto del elemento
coords.height

// distancia del borde derecho del elemento al borde derecho del viewport
coords.right - coords.width
// distancia del borde inferior del elemento al borde inferior del viewport 
coords.bottom - coords.height 

// distancia del borde superior del elemento al inicio del documento (cuando se ha hecho scroll)
coords.top + scrollY
  </script>
</body>
</html>