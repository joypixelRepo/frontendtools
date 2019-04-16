var ips = $('#ips');

$('#addIp').on('click', function(){
	var myIp = $('#myIp');
	var allIps = ips.val().replace(/\s/g, '').split(',');

	if($.inArray(myIp.val(), allIps) === -1) {
		var concat = '';
		if(ips.val() != '') {
			concat = ',';
		}
		ips.val(ips.val() + concat + myIp.val());
		ips.parent().addClass('focused');
	} else {
		alert('Tu IP ya está añadida en la lista.');
	}
});

$('#clearIps').on('click', function(){
	ips.val('');
	ips.parent().removeClass('focused');
});