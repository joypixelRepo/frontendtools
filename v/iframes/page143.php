<!DOCTYPE html>
<html>
<head>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <style>
  
  </style>
  
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
</head>
<body>
  <ul>
  <li>foo</li>
  <li>bar</li>
</ul>
  <script>
    // jquery
$('li').each(function(index) {
  console.log(index + ': ' + $(this).text());
});
  </script>
</body>
</html>