<!DOCTYPE html>
<html>
<head>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <style>
  @import url("https://fonts.googleapis.com/css?family=Merriweather:400,400i,700");
* {
  box-sizing: border-box;
}

body {
  font-family: Merriweather, serif;
}

label,
main {
  background: var(--bg, white);
  color: var(--text, black);
}

main {
  --gradDark: hsl(144, 100%, 89%);
  --gradLight: hsl(42, 94%, 76%);
  background: linear-gradient(to bottom, var(--gradDark), var(--gradLight));
  padding: 120px 40px 40px 40px;
  min-height: 100vh;
  text-align: center;
}

.wrapper {
  max-width: 700px;
  margin: 0 auto;
}

.theme-switch__input:checked ~ main,
.theme-switch__input:checked ~ label {
  --text: white;
}

.theme-switch__input:checked ~ main {
  --gradDark: hsl(198, 44%, 11%);
  --gradLight: hsl(198, 39%, 29%);
}

.theme-switch__input,
.theme-switch__label {
  position: absolute;
  z-index: 1;
}

.theme-switch__input {
  opacity: 0;
}
.theme-switch__input:hover + .theme-switch__label, .theme-switch__input:focus + .theme-switch__label {
  background-color: lightSlateGray;
}
.theme-switch__input:hover + .theme-switch__label span::after, .theme-switch__input:focus + .theme-switch__label span::after {
  background-color: #d4ebf2;
}

.theme-switch__label {
  padding: 20px;
  margin: 60px;
  transition: background-color 200ms ease-in-out;
  width: 120px;
  height: 50px;
  border-radius: 50px;
  text-align: center;
  background-color: slateGray;
  box-shadow: -4px 4px 15px inset rgba(0, 0, 0, 0.4);
}
.theme-switch__label::before, .theme-switch__label::after {
  font-size: 2rem;
  position: absolute;
  transform: translate3d(0, -50%, 0);
  top: 50%;
}
.theme-switch__label::before {
  content: '\263C';
  right: 100%;
  margin-right: 10px;
  color: orange;
}
.theme-switch__label::after {
  content: '\263E';
  left: 100%;
  margin-left: 10px;
  color: lightSlateGray;
}
.theme-switch__label span {
  position: absolute;
  bottom: calc(100% + 10px);
  left: 0;
  width: 100%;
}
.theme-switch__label span::after {
  position: absolute;
  top: calc(100% + 15px);
  left: 5px;
  width: 40px;
  height: 40px;
  content: '';
  border-radius: 50%;
  background-color: lightBlue;
  transition: transform 200ms, background-color 200ms;
  box-shadow: -3px 3px 8px rgba(0, 0, 0, 0.4);
}

.theme-switch__input:checked ~ .theme-switch__label {
  background-color: lightSlateGray;
}
.theme-switch__input:checked ~ .theme-switch__label::before {
  color: lightSlateGray;
}
.theme-switch__input:checked ~ .theme-switch__label::after {
  color: turquoise;
}
.theme-switch__input:checked ~ .theme-switch__label span::after {
  transform: translate3d(70px, 0, 0);
}
  </style>
  
  
</head>
<body>
  <div class="page">
	<!--Theme switch-->
	<input type="checkbox" id="themeSwitch" name="theme-switch" class="theme-switch__input" />
	<label for="themeSwitch" class="theme-switch__label">
		<span>Switch theme</span>
	</label>
	
	<!--Main page content-->
	<main>
		<div class="wrapper">
		<h1>CSS Theme Switcher</h1>
		<p>Switch from light to dark mode using the toggle.</p>
		</div>
	</main>
</div>
  <script>
    
  </script>
</body>
</html>