<!DOCTYPE html>
<html>
<head>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <style>
  
  </style>
  
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
</head>
<body>
  
  <script>
    // select form
var form = $('form');
// serialize form elements
var datos = form.serialize();

$.ajax({
    url: '/file.php',
    type:"POST",
    cache: false,
    data: datos,
    beforeSend: function(){
      // actions before send
    },
    complete: function(){
      // actions when complete
    },
    success: function(response){
      if(response == 'ok') {
        // actions before sucess
      }
    }
  });
  </script>
</body>
</html>