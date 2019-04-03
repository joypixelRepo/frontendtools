const avatars_a = $('.avatars a');
const user_img = $('.user-info .image img');
const profile_image = $('.profile-image img');
const box_images = $('#box-edit-image');

profile_image.on('click', function(e){
	e.preventDefault();
	box_images.slideToggle(150);
});

avatars_a.on('click', function(e){
	e.preventDefault();
	var img = $(this).attr('data-image');
	avatars_a.addClass('disabled').removeClass('enabled');
	$(this).addClass('enabled').removeClass('disabled');
	changeImage(img);
});

function changeImage(img) {
	$.ajax({
    url: '/user/changeImage?image='+img,
    cache: false,
    beforeSend: function() {

    },
    complete: function() {
    	
    },
    success: function(response) {
    	if(response == 'ok') {
	    	effectOut(img);
	    	effectIn(img);
    	}
    }
	});
}

var fxOut = 'flipOutY';
var fxIn = 'flipInY';

function effectOut(img) {
	profile_image.addClass(fxOut+' animated-fast');
	user_img.addClass(fxOut+' animated-fast');
}
function effectIn(img) {
	setTimeout(function() { 
		profile_image.removeClass(fxOut+' animated-fast').attr('src', img).addClass(fxIn+' animated-fast');
		user_img.removeClass(fxOut+' animated-fast').attr('src', img).addClass(fxIn+' animated-fast');
	}, 150);
}


