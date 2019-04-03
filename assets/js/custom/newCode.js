if($('input[name="executable"]').is(':checked')) {
	$('.box-codes').css('display', 'flex');
	$('.row-content').css('display', 'none');
} else {
	$('.box-codes').css('display', 'none');
	$('.row-content').css('display', 'flex');
}

$('input[name="executable"]').on('change', function(){
	if($(this).is(':checked')) {
		$('.box-codes').slideDown(150);
		$('.row-content').slideUp(150);
	} else {
		$('.box-codes').slideUp(150);
		$('.row-content').slideDown(150);
	}
});

$("form#edit-entry-form :input").change(function() {
	//console.log('Form change detect');
	exitPage();
});

function exitPage () {
	window.addEventListener("beforeunload", function (e) {
	  var confirmationMessage = "\o/";

	  (e || window.event).returnValue = confirmationMessage; //Gecko + IE
	  return confirmationMessage;                            //Webkit, Safari, Chrome
	});
}