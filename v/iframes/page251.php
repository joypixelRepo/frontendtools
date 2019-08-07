<!DOCTYPE html>
<html>
<head>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <style>
  body {
  margin: 0;
  height: 100vh;
  position: relative;
  background-color: #0f101b;
}

.main-app {
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  display: flex;
  align-items: center;
  justify-content: center;
}

.main-btn {
  position: relative;
  width: 6rem;
  height: 6rem;
  font-size: 2.5rem;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: auto;
  border-radius: 50%;
  cursor: pointer;
  background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.02) 0%, rgba(0, 0, 0, 0.02) 50%, #a139f0 50%, #dc34f5 75%, #a139f0 100%);
  background-size: 100% 200%;
  background-position: 0% 100%;
  color: #fff;
  transition: 400ms;
  box-shadow: 0px 0px 0px rgba(255, 255, 255, 0.04);
  transform: rotate(0deg);
  opacity: 1;
}
.main-btn:hover {
  box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.04);
}

.custom-menu-toggle {
  position: absolute;
  width: 2.3rem;
  height: .23rem;
  border-radius: 2px;
  background-color: white;
  display: block;
  margin: auto;
  transition: 400ms;
}
.custom-menu-toggle:before {
  position: absolute;
  width: 2.3rem;
  height: .23rem;
  border-radius: 2px;
  background-color: white;
  display: block;
  margin: auto;
  transition: 400ms;
  content: '';
  backface-visibility: hidden;
  transform: rotate(0deg) translateY(10px);
}
.custom-menu-toggle:after {
  position: absolute;
  width: 2.3rem;
  height: .23rem;
  border-radius: 2px;
  background-color: white;
  display: block;
  margin: auto;
  transition: 400ms;
  content: '';
  backface-visibility: hidden;
  transform: rotate(0deg) translateY(-10px);
}

.main-btn.active .custom-menu-toggle {
  background-color: rgba(255, 255, 255, 0);
}
.main-btn.active .custom-menu-toggle:before {
  position: absolute;
  width: 2.3rem;
  height: .23rem;
  border-radius: 2px;
  background-color: white;
  display: block;
  margin: auto;
  transition: 400ms;
  content: '';
  transform: rotate(45deg) translateY(0px);
}
.main-btn.active .custom-menu-toggle:after {
  position: absolute;
  width: 2.3rem;
  height: .23rem;
  border-radius: 2px;
  background-color: white;
  display: block;
  margin: auto;
  transition: 400ms;
  content: '';
  transform: rotate(-45deg) translateY(0px);
}

  </style>
  
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
</head>
<body>
  <div class="main-app">
  <div class="btn-cont">
    <div class="main-btn">
      <div class="custom-menu-toggle openMenu"></div>
    </div>
    <div class="side-btns">
      <div class="side-btn">
        
      </div>
    </div>
  </div>
</div>
  <script>
    $(document).on('click', '.main-btn', function(e){
  $(this).toggleClass('active');
  $('.btn-cont').toggleClass('active');
});
  </script>
</body>
</html>