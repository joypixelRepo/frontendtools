<!DOCTYPE html>
<html>
<head>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <style>
  @import 'https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900';
.container {
  height: 100vh;
  background: #333;
  display: grid;
  place-items: center;
  font-size: 10px;
}
.container .glitch {
  color: #fff;
  font-size: 5em;
  position: relative;
  font-family: 'Roboto';
  font-weight: 700;
}
.container .glitch::before,
.container .glitch::after {
  content: 'GLITCH';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  overflow: hidden;
  background-color: #333;
  color: #fff;
}
.container .glitch::before {
  left: 8px;
  text-shadow: 2px 0 #00ffea;
  animation: glitch 3s infinite linear;
}
.container .glitch::after {
  left: 8px;
  text-shadow: -2px 0 #fe3a7f;
  animation: glitch 2s infinite linear;
}
@-moz-keyframes glitch {
  0% {
    clip: rect(56px, 9999px, 72px, 0);
  }
  5% {
    clip: rect(11px, 9999px, 50px, 0);
  }
  10% {
    clip: rect(50px, 9999px, 63px, 0);
  }
  15% {
    clip: rect(16px, 9999px, 37px, 0);
  }
  20% {
    clip: rect(12px, 9999px, 43px, 0);
  }
  25% {
    clip: rect(21px, 9999px, 69px, 0);
  }
  30% {
    clip: rect(9px, 9999px, 83px, 0);
  }
  35% {
    clip: rect(48px, 9999px, 59px, 0);
  }
  40% {
    clip: rect(33px, 9999px, 60px, 0);
  }
  45% {
    clip: rect(21px, 9999px, 79px, 0);
  }
  50% {
    clip: rect(73px, 9999px, 72px, 0);
  }
  55% {
    clip: rect(29px, 9999px, 17px, 0);
  }
  60% {
    clip: rect(71px, 9999px, 52px, 0);
  }
  65% {
    clip: rect(57px, 9999px, 53px, 0);
  }
  70% {
    clip: rect(22px, 9999px, 46px, 0);
  }
  75% {
    clip: rect(28px, 9999px, 23px, 0);
  }
  80% {
    clip: rect(33px, 9999px, 88px, 0);
  }
  85% {
    clip: rect(54px, 9999px, 17px, 0);
  }
  90% {
    clip: rect(57px, 9999px, 33px, 0);
  }
  95% {
    clip: rect(43px, 9999px, 96px, 0);
  }
  100% {
    clip: rect(76px, 9999px, 61px, 0);
  }
}
@-webkit-keyframes glitch {
  0% {
    clip: rect(56px, 9999px, 72px, 0);
  }
  5% {
    clip: rect(11px, 9999px, 50px, 0);
  }
  10% {
    clip: rect(50px, 9999px, 63px, 0);
  }
  15% {
    clip: rect(16px, 9999px, 37px, 0);
  }
  20% {
    clip: rect(12px, 9999px, 43px, 0);
  }
  25% {
    clip: rect(21px, 9999px, 69px, 0);
  }
  30% {
    clip: rect(9px, 9999px, 83px, 0);
  }
  35% {
    clip: rect(48px, 9999px, 59px, 0);
  }
  40% {
    clip: rect(33px, 9999px, 60px, 0);
  }
  45% {
    clip: rect(21px, 9999px, 79px, 0);
  }
  50% {
    clip: rect(73px, 9999px, 72px, 0);
  }
  55% {
    clip: rect(29px, 9999px, 17px, 0);
  }
  60% {
    clip: rect(71px, 9999px, 52px, 0);
  }
  65% {
    clip: rect(57px, 9999px, 53px, 0);
  }
  70% {
    clip: rect(22px, 9999px, 46px, 0);
  }
  75% {
    clip: rect(28px, 9999px, 23px, 0);
  }
  80% {
    clip: rect(33px, 9999px, 88px, 0);
  }
  85% {
    clip: rect(54px, 9999px, 17px, 0);
  }
  90% {
    clip: rect(57px, 9999px, 33px, 0);
  }
  95% {
    clip: rect(43px, 9999px, 96px, 0);
  }
  100% {
    clip: rect(76px, 9999px, 61px, 0);
  }
}
@-o-keyframes glitch {
  0% {
    clip: rect(56px, 9999px, 72px, 0);
  }
  5% {
    clip: rect(11px, 9999px, 50px, 0);
  }
  10% {
    clip: rect(50px, 9999px, 63px, 0);
  }
  15% {
    clip: rect(16px, 9999px, 37px, 0);
  }
  20% {
    clip: rect(12px, 9999px, 43px, 0);
  }
  25% {
    clip: rect(21px, 9999px, 69px, 0);
  }
  30% {
    clip: rect(9px, 9999px, 83px, 0);
  }
  35% {
    clip: rect(48px, 9999px, 59px, 0);
  }
  40% {
    clip: rect(33px, 9999px, 60px, 0);
  }
  45% {
    clip: rect(21px, 9999px, 79px, 0);
  }
  50% {
    clip: rect(73px, 9999px, 72px, 0);
  }
  55% {
    clip: rect(29px, 9999px, 17px, 0);
  }
  60% {
    clip: rect(71px, 9999px, 52px, 0);
  }
  65% {
    clip: rect(57px, 9999px, 53px, 0);
  }
  70% {
    clip: rect(22px, 9999px, 46px, 0);
  }
  75% {
    clip: rect(28px, 9999px, 23px, 0);
  }
  80% {
    clip: rect(33px, 9999px, 88px, 0);
  }
  85% {
    clip: rect(54px, 9999px, 17px, 0);
  }
  90% {
    clip: rect(57px, 9999px, 33px, 0);
  }
  95% {
    clip: rect(43px, 9999px, 96px, 0);
  }
  100% {
    clip: rect(76px, 9999px, 61px, 0);
  }
}
@keyframes glitch {
  0% {
    clip: rect(56px, 9999px, 72px, 0);
  }
  5% {
    clip: rect(11px, 9999px, 50px, 0);
  }
  10% {
    clip: rect(50px, 9999px, 63px, 0);
  }
  15% {
    clip: rect(16px, 9999px, 37px, 0);
  }
  20% {
    clip: rect(12px, 9999px, 43px, 0);
  }
  25% {
    clip: rect(21px, 9999px, 69px, 0);
  }
  30% {
    clip: rect(9px, 9999px, 83px, 0);
  }
  35% {
    clip: rect(48px, 9999px, 59px, 0);
  }
  40% {
    clip: rect(33px, 9999px, 60px, 0);
  }
  45% {
    clip: rect(21px, 9999px, 79px, 0);
  }
  50% {
    clip: rect(73px, 9999px, 72px, 0);
  }
  55% {
    clip: rect(29px, 9999px, 17px, 0);
  }
  60% {
    clip: rect(71px, 9999px, 52px, 0);
  }
  65% {
    clip: rect(57px, 9999px, 53px, 0);
  }
  70% {
    clip: rect(22px, 9999px, 46px, 0);
  }
  75% {
    clip: rect(28px, 9999px, 23px, 0);
  }
  80% {
    clip: rect(33px, 9999px, 88px, 0);
  }
  85% {
    clip: rect(54px, 9999px, 17px, 0);
  }
  90% {
    clip: rect(57px, 9999px, 33px, 0);
  }
  95% {
    clip: rect(43px, 9999px, 96px, 0);
  }
  100% {
    clip: rect(76px, 9999px, 61px, 0);
  }
}
  </style>
  <link rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
	<h1 class="glitch">GLITCH</h1>
</div>
  <script>
    
  </script>
</body>
</html>