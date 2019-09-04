$(document).ready(function() {

  // destroy bootstrap select for not show bootstrap select
  $('select').selectpicker('destroy');

  // button advanced search
  $('#toogle_advanced_search').on('click', function(e) {
	  e.preventDefault();
	  $('.advanced-search-form').slideToggle(120);
	});

});