$(document).ready(function() {
  var url = window.location.href.split('/').pop();
  if(url !== '') {
	  $('.menu a').each(function(index,element) {
  		if(~($(this).attr('href')).indexOf(url)) {
  			$(this)/*.addClass('toggled')*/.parents('li').addClass('active open');
		  }
	  });
	} else {
		$('.menu #dashboardLink')/*.addClass('toggled')*/.parent().addClass('active open');
	}
});