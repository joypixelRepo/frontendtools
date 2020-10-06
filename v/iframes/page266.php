<!DOCTYPE html>
<html>
<head>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <style>
  /****** VERTICAL ALIGN ******/
/* ROW */
.vertical-align-parent {
  display: -ms-flex;
  display: -webkit-flex;
  display: flex;
}
/* COLS */
.vertical-align-child {
  display: -ms-flex;
  display: -webkit-flex;
  display: flex;
  justify-content: center;
  flex-direction: column;
}
@media (max-width: 991px) {
  .vertical-align-parent {
    display: block;
  }
}
/****** END VERTICAL ALIGN ******/
  </style>
  
  
</head>
<body>
  <header>
  <div class="container-fluid">
    <div class="row">
      <div class="container">
        <div class="row vertical-align-parent">
          <div class="col-4 vertical-align-child">
            --LOGO--
          </div>
          <div class="col-8 vertical-align-child">
            <div class="text-right">
              <a href="#" class="button-default">958 123 456</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
  <script>
    
  </script>
</body>
</html>