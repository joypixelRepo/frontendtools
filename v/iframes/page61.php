<!DOCTYPE html>
<html>
<head>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <style>
  .plane {
  display: block;
  height: 0;
  width: 0;
  overflow: visible;
  transform-origin: 50% 50%;
  transform: rotateZ(0deg) translate(-50px, 0);
  -webkit-animation: spin 2.5s ease-in-out alternate infinite;
  -moz-animation: spin 2.5s ease-in-out alternate infinite;
  -o-animation: spin 2.5s ease-in-out alternate infinite;
  animation: spin 2.5s ease-in-out alternate infinite;
}
.plane:nth-of-type(odd) .triangle {
  background-color: #fff;
}
.plane:nth-of-type(even) .triangle {
  background-color: #000;
}

.triangle {
  position: absolute;
  border-top-right-radius: 45%;
  transform-origin: -50% 50%;
  transform: rotateZ(-60deg) skewX(-30deg) scale(1, 0.866);
}
.triangle:before, .triangle:after {
  content: "";
  position: absolute;
  background-color: inherit;
  border-top-right-radius: 45%;
}
.triangle:before {
  box-shadow: -6px -5px 10px 3px rgba(0, 0, 0, 0.075);
  -webkit-transform: rotate(-135deg) skewX(-45deg) scale(1.414, 0.707) translate(0, -50%);
  -moz-transform: rotate(-135deg) skewX(-45deg) scale(1.414, 0.707) translate(0, -50%);
  -ms-transform: rotate(-135deg) skewX(-45deg) scale(1.414, 0.707) translate(0, -50%);
  -o-transform: rotate(-135deg) skewX(-45deg) scale(1.414, 0.707) translate(0, -50%);
  transform: rotate(-135deg) skewX(-45deg) scale(1.414, 0.707) translate(0, -50%);
}
.triangle:after {
  box-shadow: 14px -1px 10px -6px rgba(0, 0, 0, 0.075);
  -webkit-transform: rotate(135deg) skewY(-45deg) scale(0.707, 1.414) translate(50%);
  -moz-transform: rotate(135deg) skewY(-45deg) scale(0.707, 1.414) translate(50%);
  -ms-transform: rotate(135deg) skewY(-45deg) scale(0.707, 1.414) translate(50%);
  -o-transform: rotate(135deg) skewY(-45deg) scale(0.707, 1.414) translate(50%);
  transform: rotate(135deg) skewY(-45deg) scale(0.707, 1.414) translate(50%);
}

.plane:nth-of-type(1) {
  z-index: 14;
  animation-delay: 0.045s;
}

.plane:nth-of-type(1) .triangle,
.plane:nth-of-type(1) .triangle:before,
.plane:nth-of-type(1) .triangle:after {
  width: 0.75em;
  height: 0.75em;
}

.plane:nth-of-type(2) {
  z-index: 13;
  animation-delay: 0.09s;
}

.plane:nth-of-type(2) .triangle,
.plane:nth-of-type(2) .triangle:before,
.plane:nth-of-type(2) .triangle:after {
  width: 1.5em;
  height: 1.5em;
}

.plane:nth-of-type(3) {
  z-index: 12;
  animation-delay: 0.135s;
}

.plane:nth-of-type(3) .triangle,
.plane:nth-of-type(3) .triangle:before,
.plane:nth-of-type(3) .triangle:after {
  width: 2.25em;
  height: 2.25em;
}

.plane:nth-of-type(4) {
  z-index: 11;
  animation-delay: 0.18s;
}

.plane:nth-of-type(4) .triangle,
.plane:nth-of-type(4) .triangle:before,
.plane:nth-of-type(4) .triangle:after {
  width: 3em;
  height: 3em;
}

.plane:nth-of-type(5) {
  z-index: 10;
  animation-delay: 0.225s;
}

.plane:nth-of-type(5) .triangle,
.plane:nth-of-type(5) .triangle:before,
.plane:nth-of-type(5) .triangle:after {
  width: 3.75em;
  height: 3.75em;
}

.plane:nth-of-type(6) {
  z-index: 9;
  animation-delay: 0.27s;
}

.plane:nth-of-type(6) .triangle,
.plane:nth-of-type(6) .triangle:before,
.plane:nth-of-type(6) .triangle:after {
  width: 4.5em;
  height: 4.5em;
}

.plane:nth-of-type(7) {
  z-index: 8;
  animation-delay: 0.315s;
}

.plane:nth-of-type(7) .triangle,
.plane:nth-of-type(7) .triangle:before,
.plane:nth-of-type(7) .triangle:after {
  width: 5.25em;
  height: 5.25em;
}

.plane:nth-of-type(8) {
  z-index: 7;
  animation-delay: 0.36s;
}

.plane:nth-of-type(8) .triangle,
.plane:nth-of-type(8) .triangle:before,
.plane:nth-of-type(8) .triangle:after {
  width: 6em;
  height: 6em;
}

.plane:nth-of-type(9) {
  z-index: 6;
  animation-delay: 0.405s;
}

.plane:nth-of-type(9) .triangle,
.plane:nth-of-type(9) .triangle:before,
.plane:nth-of-type(9) .triangle:after {
  width: 6.75em;
  height: 6.75em;
}

.plane:nth-of-type(10) {
  z-index: 5;
  animation-delay: 0.45s;
}

.plane:nth-of-type(10) .triangle,
.plane:nth-of-type(10) .triangle:before,
.plane:nth-of-type(10) .triangle:after {
  width: 7.5em;
  height: 7.5em;
}

.plane:nth-of-type(11) {
  z-index: 4;
  animation-delay: 0.495s;
}

.plane:nth-of-type(11) .triangle,
.plane:nth-of-type(11) .triangle:before,
.plane:nth-of-type(11) .triangle:after {
  width: 8.25em;
  height: 8.25em;
}

.plane:nth-of-type(12) {
  z-index: 3;
  animation-delay: 0.54s;
}

.plane:nth-of-type(12) .triangle,
.plane:nth-of-type(12) .triangle:before,
.plane:nth-of-type(12) .triangle:after {
  width: 9em;
  height: 9em;
}

.plane:nth-of-type(13) {
  z-index: 2;
  animation-delay: 0.585s;
}

.plane:nth-of-type(13) .triangle,
.plane:nth-of-type(13) .triangle:before,
.plane:nth-of-type(13) .triangle:after {
  width: 9.75em;
  height: 9.75em;
}

.plane:nth-of-type(14) {
  z-index: 1;
  animation-delay: 0.63s;
}

.plane:nth-of-type(14) .triangle,
.plane:nth-of-type(14) .triangle:before,
.plane:nth-of-type(14) .triangle:after {
  width: 10.5em;
  height: 10.5em;
}

.plane:nth-of-type(15) {
  z-index: 0;
  animation-delay: 0.675s;
}

.plane:nth-of-type(15) .triangle,
.plane:nth-of-type(15) .triangle:before,
.plane:nth-of-type(15) .triangle:after {
  width: 11.25em;
  height: 11.25em;
}

@keyframes spin {
  0% {
    -webkit-transform: rotateZ(0deg) translate(-50px, 0);
    -moz-transform: rotateZ(0deg) translate(-50px, 0);
    -o-transform: rotateZ(0deg) translate(-50px, 0);
    transform: rotateZ(0deg) translate(-50px, 0);
  }
  100% {
    -webkit-transform: rotateZ(120deg) translate(-50px, -80px);
    -moz-transform: rotateZ(120deg) translate(-50px, -80px);
    -o-transform: rotateZ(120deg) translate(-50px, -80px);
    transform: rotateZ(120deg) translate(-50px, -80px);
  }
}
.inspiration {
  display: block;
  position: fixed;
  height: 30px;
  bottom: 0;
  left: 0;
  z-index: 2;
}
.inspiration__link {
  display: block;
  cursor: pointer;
  padding: 0 10px;
  line-height: 30px;
  background-color: #34363f;
  color: #fff;
  border-top-right-radius: 4px;
  font-size: 12px;
}

* {
  margin: 0;
  padding: 0;
  border: 0;
  outline: none;
  box-sizing: border-box;
}

html,
body {
  display: block;
  position: fixed;
  height: 100vh;
  width: 100vw;
  background-color: #000;
  background: linear-gradient(#1f1f21, #000);
}

.main {
  display: flex;
  height: 100vh;
  width: 100vw;
  flex-wrap: wrap;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
  </style>
  
  
</head>
<body>
  <div class="main">
  <div class="plane">
    <div class="triangle"></div>
  </div>
  <div class="plane">
    <div class="triangle"></div>
  </div>
  <div class="plane">
    <div class="triangle"></div>
  </div>
  <div class="plane">
    <div class="triangle"></div>
  </div>
  <div class="plane">
    <div class="triangle"></div>
  </div>
  <div class="plane">
    <div class="triangle"></div>
  </div>
  <div class="plane">
    <div class="triangle"></div>
  </div>
  <div class="plane">
    <div class="triangle"></div>
  </div>
  <div class="plane">
    <div class="triangle"></div>
  </div>
  <div class="plane">
    <div class="triangle"></div>
  </div>
  <div class="plane">
    <div class="triangle"></div>
  </div>
  <div class="plane">
    <div class="triangle"></div>
  </div>
  <div class="plane">
    <div class="triangle"></div>
  </div>
  <div class="plane">
    <div class="triangle"></div>
  </div>
  <div class="plane">
    <div class="triangle"></div>
  </div>
</div>
  <script>
    
  </script>
</body>
</html>