<!DOCTYPE html>
<html>
<head>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <style>
  .swiper-container {
		margin: 0 15px;

}
.swiper-pagination-bullet-active {
		background: #12a6d0;
}
.rate-table {
    border: 1px solid #ccc;
    margin-bottom: 30px;
}

.rate-table .rate-table-header {
    background: #f9007a;
    padding: 4px 8px;
    font-size: 0.6em;
    color: #fff;
    margin: -1px;
}

.rate-table .rate-table-header .header-rate-name {
    font-weight: 700;
}

.rate-table .rate-table-header .header-company-name {
    float: right;
}

.rate-table .rate-table-body {
    padding: 0.8em;
    font-size: 0.8em;
}

.rate-table-body p {
    font-size: 0.9em;
}

.rate-table .rate-table-body .price-box {
    text-align: center;
}

.rate-table .rate-table-body span {
    display: block;
}

.rate-table .rate-table-body .price-box .price-leyend {
    font-size: 0.9em;
}

.rate-table .rate-table-body .price-number {
    color: #3BB24C;
    font-size: 1.4em;
    font-weight: 700;
}

.rate-table .rate-table-body .price-kwh {
    color: #3BB24C;
    font-size: 1em;
    font-weight: 700;
}

.rate-table .rate-table-body .buttons-price {
    margin-top: 8px;
}

.rate-table .rate-table-body .buttons-price a {
    transition: background-color .32s ease-in-out, border-color .32s ease-in-out, color .32s ease-in-out;
}

.rate-table .rate-table-body .buttons-price a,
.rate-table .rate-table-body .buttons-price a:hover,
.rate-table .rate-table-body .buttons-price a:focus {
    display: block;
    padding: 4px 8px;
    font-weight: 700;
    border-radius: 2px;
    text-decoration: none;
    outline: 0;
    margin-bottom: 8px;
    text-align: center;
}

.rate-table .rate-table-body .buttons-price .btn1 {
    background-color: #f5a422;
    color: #fff;
}

.rate-table .rate-table-body .buttons-price .btn1:hover,
.rate-table .rate-table-body .buttons-price .btn1:focus {
    background-color: #e4900a;
}

.rate-table .rate-table-body .buttons-price .btn2 {
    background: #ffffff;
    color: #12a6d0;
    border: 1px solid #12a6d0;
}

.rate-table .rate-table-body .buttons-price .btn2:hover,
.rate-table .rate-table-body .buttons-price .btn2:focus {
    background: #12a6d0;
    color: #fff;
    border: 1px solid #12a6d0;
}

.rate-table .rate-table-footer {
    background: #F0F8FA;
    padding: 8px;
    font-size: 0.7em;
}

.rate-table .rate-table-footer ul {
    margin: 0;
    padding: 0;
    border: 0;
}

.rate-table .rate-table-footer ul li {
    font-size: 0.7em;
}

.rate-table .rate-table-footer ul li:before {
    width: 0.9em;
    height: 0.9em;
}
  </style>
  
  
</head>
<body>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css">

<div class="row-rate-tables">
		<div class="rate-tables">
		    <div class="row c__swiper-wrapper">
		        <div class="col-lg-3 col-xs-6 c__swiper-slide">
		            <div class="rate-table">
		                <div class="rate-table-header"><span class="header-rate-name">Tarifa Clásica 2.0</span> <span class="header-company-name">Holaluz</span></div>

		                <div class="rate-table-body">
		                    <p>Tipo de tarifa: <strong>1 precio</strong></p>

		                    <div class="price-box"><span class="price-leyend">Precio kWh</span> <span class="price-number">0.1390</span> <span class="price-kwh">€/kWh</span></div>

		                    <div class="buttons-price"><a class="btn1" data-link="modal_form_general" data-target-ds="din-modal" data-toggle-ds="modal" href="#">91 000 00 00</a> <a class="btn2" data-link="modal_form_general" data-target-ds="din-modal" data-toggle-ds="modal" href="#">Solicitar información</a></div>
		                </div>

		                <div class="rate-table-footer">
		                    <p>Detalles de la tarifa</p>

		                    <ul class="checked">
		                        <li>Sin permanencia</li>
		                        <li>Término Fijo: 0.1056€/kW/día</li>
		                        <li>Tarifa de acceso: 2.0A</li>
		                    </ul>
		                </div>
		            </div>
		        </div>

		        <div class="col-lg-3 col-xs-6 c__swiper-slide">
		            <div class="rate-table">
		                <div class="rate-table-header"><span class="header-rate-name">Tarifa Sin Sorpresas 2.0</span> <span class="header-company-name">Holaluz</span></div>

		                <div class="rate-table-body">
		                    <p>Tipo de tarifa: <strong>1 precio</strong></p>

		                    <div class="price-box"><span class="price-leyend">Precio kWh</span> <span class="price-number">0.1330</span> <span class="price-kwh">€/kWh</span></div>

		                    <div class="buttons-price"><a class="btn1" data-link="modal_form_general" data-target-ds="din-modal" data-toggle-ds="modal" href="#">91 000 00 00</a> <a class="btn2" data-link="modal_form_general" data-target-ds="din-modal" data-toggle-ds="modal" href="#">Solicitar información</a></div>
		                </div>

		                <div class="rate-table-footer">
		                    <p>Detalles de la tarifa</p>

		                    <ul class="checked">
		                        <li>Sin permanencia</li>
		                        <li>Término Fijo: 0.1056€/kW/día</li>
		                        <li>Tarifa de acceso: 2.1A</li>
		                    </ul>
		                </div>
		            </div>
		        </div>

		        <div class="col-lg-3 col-xs-6 c__swiper-slide">
		            <div class="rate-table">
		                <div class="rate-table-header"><span class="header-rate-name">Tarifa Clásica 2.1</span> <span class="header-company-name">Holaluz</span></div>

		                <div class="rate-table-body">
		                    <p>Tipo de tarifa: <strong>1 precio</strong></p>

		                    <div class="price-box"><span class="price-leyend">Precio kWh</span> <span class="price-number">0.1500</span> <span class="price-kwh">€/kWh</span></div>

		                    <div class="buttons-price"><a class="btn1" data-link="modal_form_general" data-target-ds="din-modal" data-toggle-ds="modal" href="#">91 000 00 00</a> <a class="btn2" data-link="modal_form_general" data-target-ds="din-modal" data-toggle-ds="modal" href="#">Solicitar información</a></div>
		                </div>

		                <div class="rate-table-footer">
		                    <p>Detalles de la tarifa</p>

		                    <ul class="checked">
		                        <li>Sin permanencia</li>
		                        <li>Término Fijo: 0.1234€/kW/día</li>
		                        <li>Tarifa de acceso: 2.1A</li>
		                    </ul>
		                </div>
		            </div>
		        </div>

		        <div class="col-lg-3 col-xs-6 c__swiper-slide">
		            <div class="rate-table">
		                <div class="rate-table-header"><span class="header-rate-name">Tarifa Sin Sorpresas 2.1</span> <span class="header-company-name">Holaluz</span></div>

		                <div class="rate-table-body">
		                    <p>Tipo de tarifa: <strong>1 precio</strong></p>

		                    <div class="price-box"><span class="price-leyend">Precio kWh</span> <span class="price-number">0.1460</span> <span class="price-kwh">€/kWh</span></div>

		                    <div class="buttons-price"><a class="btn1" data-link="modal_form_general" data-target-ds="din-modal" data-toggle-ds="modal" href="#">91 000 00 00</a> <a class="btn2" data-link="modal_form_general" data-target-ds="din-modal" data-toggle-ds="modal" href="#">Solicitar información</a></div>
		                </div>

		                <div class="rate-table-footer">
		                    <p>Detalles de la tarifa</p>

		                    <ul class="checked">
		                        <li>Sin permanencia</li>
		                        <li>Término Fijo: 0.1234€/kW/día</li>
		                        <li>Tarifa de acceso: 2.1A</li>
		                    </ul>
		                </div>
		            </div>
		        </div>

		        <div class="col-lg-3 col-xs-6 c__swiper-slide">
		            <div class="rate-table">
		                <div class="rate-table-header"><span class="header-rate-name">Tarifa Clásica con DH</span> <span class="header-company-name">Holaluz</span></div>

		                <div class="rate-table-body">
		                    <p>Tipo de tarifa: <strong>2 precios DHA</strong></p>

		                    <div class="row">
		                        <div class="col-xs-6">
		                            <div class="price-box"><span class="price-leyend">Precio kWh</span> <span class="price-number">0.1660</span> <span class="price-kwh">€/kWh</span></div>
		                        </div>

		                        <div class="col-xs-6">
		                            <div class="price-box"><span class="price-leyend">Precio valle</span> <span class="price-number">0.0950</span> <span class="price-kwh">€/kWh</span></div>
		                        </div>
		                    </div>

		                    <div class="buttons-price"><a class="btn1" data-link="modal_form_general" data-target-ds="din-modal" data-toggle-ds="modal" href="#">91 000 00 00</a> <a class="btn2" data-link="modal_form_general" data-target-ds="din-modal" data-toggle-ds="modal" href="#">Solicitar información</a></div>
		                </div>

		                <div class="rate-table-footer">
		                    <p>Detalles de la tarifa</p>

		                    <ul class="checked">
		                        <li>Sin permanencia</li>
		                        <li>Término Fijo: 0.1056€/kW/día</li>
		                        <li>Tarifa de acceso: 2.0DHA</li>
		                    </ul>
		                </div>
		            </div>
		        </div>

		        <div class="col-lg-3 col-xs-6 c__swiper-slide">
		            <div class="rate-table">
		                <div class="rate-table-header"><span class="header-rate-name">Tarifa Sin Sorpresas con DH</span> <span class="header-company-name">Holaluz</span></div>

		                <div class="rate-table-body">
		                    <p>Tipo de tarifa: <strong>2 precios DHA</strong></p>

		                    <div class="row">
		                        <div class="col-xs-6">
		                            <div class="price-box"><span class="price-leyend">Precio kWh</span> <span class="price-number">0.1660</span> <span class="price-kwh">€/kWh</span></div>
		                        </div>

		                        <div class="col-xs-6">
		                            <div class="price-box"><span class="price-leyend">Precio valle</span> <span class="price-number">0.0890</span> <span class="price-kwh">€/kWh</span></div>
		                        </div>
		                    </div>

		                    <div class="buttons-price"><a class="btn1" data-link="modal_form_general" data-target-ds="din-modal" data-toggle-ds="modal" href="#">91 000 00 00</a> <a class="btn2" data-link="modal_form_general" data-target-ds="din-modal" data-toggle-ds="modal" href="#">Solicitar información</a></div>
		                </div>

		                <div class="rate-table-footer">
		                    <p>Detalles de la tarifa</p>

		                    <ul class="checked">
		                        <li>Sin permanencia</li>
		                        <li>Término Fijo: 0.1056€/kW/día</li>
		                        <li>Tarifa de acceso: 2.0DHA</li>
		                    </ul>
		                </div>
		            </div>
		        </div>

		        <div class="col-lg-3 col-xs-6 c__swiper-slide">
		            <div class="rate-table">
		                <div class="rate-table-header"><span class="header-rate-name">Tarifa Clásica con DH</span> <span class="header-company-name">Holaluz</span></div>

		                <div class="rate-table-body">
		                    <p>Tipo de tarifa: <strong>2 precios DHA</strong></p>

		                    <div class="row">
		                        <div class="col-xs-6">
		                            <div class="price-box"><span class="price-leyend">Precio kWh</span> <span class="price-number">0.1760</span> <span class="price-kwh">€/kWh</span></div>
		                        </div>

		                        <div class="col-xs-6">
		                            <div class="price-box"><span class="price-leyend">Precio valle</span> <span class="price-number">0.1030</span> <span class="price-kwh">€/kWh</span></div>
		                        </div>
		                    </div>

		                    <div class="buttons-price"><a class="btn1" data-link="modal_form_general" data-target-ds="din-modal" data-toggle-ds="modal" href="#">91 000 00 00</a> <a class="btn2" data-link="modal_form_general" data-target-ds="din-modal" data-toggle-ds="modal" href="#">Solicitar información</a></div>
		                </div>

		                <div class="rate-table-footer">
		                    <p>Detalles de la tarifa</p>

		                    <ul class="checked">
		                        <li>Sin permanencia</li>
		                        <li>Término Fijo: 0.1234€/kW/día</li>
		                        <li>Tarifa de acceso: 2.1DHA</li>
		                    </ul>
		                </div>
		            </div>
		        </div>

		        <div class="col-lg-3 col-xs-6 c__swiper-slide">
		            <div class="rate-table">
		                <div class="rate-table-header"><span class="header-rate-name">Tarifa Sin Sorpresas con DH</span> <span class="header-company-name">Holaluz</span></div>

		                <div class="rate-table-body">
		                    <p>Tipo de tarifa: <strong>2 precios DHA</strong></p>

		                    <div class="row">
		                        <div class="col-xs-6">
		                            <div class="price-box"><span class="price-leyend">Precio kWh</span> <span class="price-number">0.1700</span> <span class="price-kwh">€/kWh</span></div>
		                        </div>

		                        <div class="col-xs-6">
		                            <div class="price-box"><span class="price-leyend">Precio valle</span> <span class="price-number">0.0970</span> <span class="price-kwh">€/kWh</span></div>
		                        </div>
		                    </div>

		                    <div class="buttons-price"><a class="btn1" data-link="modal_form_general" data-target-ds="din-modal" data-toggle-ds="modal" href="#">91 000 00 00</a> <a class="btn2" data-link="modal_form_general" data-target-ds="din-modal" data-toggle-ds="modal" href="#">Solicitar información</a></div>
		                </div>

		                <div class="rate-table-footer">
		                    <p>Detalles de la tarifa</p>

		                    <ul class="checked">
		                        <li>Sin permanencia</li>
		                        <li>Término Fijo: 0.1234€/kW/día</li>
		                        <li>Tarifa de acceso: 2.1DHA</li>
		                    </ul>
		                </div>
		            </div>
		        </div>

		    </div>

		    <!-- If we need pagination -->
	    	<div class="swiper-pagination"></div>

		</div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js"></script>
  <script>
    if(window.innerWidth <= 991) {
    var rowRateTables = document.querySelector('.row-rate-tables');
    rowRateTables.classList.add('row');

    var rateTables = document.querySelector('.rate-tables');
    rateTables.classList.add('col-xs-12', 'swiper-container');

    var swiperWrapper = document.querySelector('.c__swiper-wrapper');
    swiperWrapper.className = '';
    swiperWrapper.classList.add('row', 'swiper-wrapper');

    var swiperSlides = document.querySelectorAll('.c__swiper-slide');
    for(var slide of swiperSlides) {
      slide.className = '';
      slide.classList.add('col-xs-12', 'swiper-slide');
    }

    var mySwiper = new Swiper ('.swiper-container', {
      // Optional parameters
      direction: 'horizontal',
      loop: true,
      // pagination: {
      //    el: '.swiper-pagination',
      //    dynamicBullets: true,
      //  },
      slidesPerView: 1.4,
      centeredSlides: true,
      spaceBetween: 0,
    })
  }
  </script>
</body>
</html>