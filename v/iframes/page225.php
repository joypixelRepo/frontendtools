<!DOCTYPE html>
<html>
<head>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <style>
  @import url("https://fonts.googleapis.com/css?family=Fredoka+One&display=swap");
html {
  font-size: 6px;
  font-family: "Fredoka One", sans-serif;
}

*,
*::before,
*::after {
  box-sizing: border-box;
  padding: 0;
  margin: 0;
  pointer-events: none;
}

body {
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: black;
}
@media only screen and (max-width: 700px) {
  body {
    transform: scale(0.4);
  }
}

.hey {
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 10rem;
  width: 10rem;
  margin: 5rem;
}
.hey:nth-child(2) {
  margin-top: -50rem;
}
.hey:nth-child(3) {
  margin-top: 50rem;
}

.hi {
  height: 1rem;
  width: 10rem;
  border-radius: 20px;
  box-shadow: 0 0 10px 5px aqua;
  background: aqua;
  animation: spin 2s 3s infinite cubic-bezier(0.17, 0.67, 0.16, 0.92);
}

.bye {
  position: absolute;
  height: 1rem;
  width: 10rem;
  border-radius: 20px;
  box-shadow: 0 0 10px 5px lime;
  background: lime;
  animation: spin 2s 2s infinite cubic-bezier(0.17, 0.67, 0.76, 0.09);
}
.bye::before {
  content: "";
  position: absolute;
  top: 50px;
  height: 10px;
  width: 10px;
  border-radius: 20px;
  background-color: yellow;
  box-shadow: 0 0 5px 5px white;
}
.bye::after {
  content: "";
  position: absolute;
  top: -80px;
  height: 10px;
  width: 10px;
  border-radius: 20px;
  background-color: yellow;
  box-shadow: 0 0 5px 5px black;
}

.whoa {
  position: absolute;
  color: #fff;
  font-size: 30rem;
  text-shadow: 0 0 100px white;
}
.whoa span:nth-child(1) {
  position: relative;
  z-index: -1;
}
.whoa span:nth-child(2) {
  position: absolute;
  top: -47%;
  font-size: 30rem;
  z-index: -1;
}
.whoa span:nth-child(3) {
  text-shadow: 0 0 60px black;
}

@keyframes spin {
  from {
    transform: rotate(0);
  }
  to {
    transform: rotate(360deg);
  }
}

  </style>
  
  
</head>
<body>
  <div class="hey">
  <div class="hi"></div>
  <div class="bye"></div>
</div>
<div class="hey">
  <div class="hi"></div>
  <div class="bye"></div>
</div>
<div class="hey">
  <div class="hi"></div>
  <div class="bye"></div>
</div>
<div class="hey">
  <div class="hi"></div>
  <div class="bye"></div>
</div>
<div class="bye">
  <div class="hey">
    <div class="hi"></div>
  </div>
  <div class="bye"></div>
</div>
<h1 class="whoa"> <span>W</span><span>h</span><span>o</span><span>a</span></h1>
  <script>
    
  </script>
</body>
</html>