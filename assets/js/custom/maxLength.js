var maxlength = $('*[maxlength]');

if(maxlength.length > 0) {
  maxlength.each(function(index) {
    const num = $(this).attr('maxlength');
    var span = $(this).next();

    span.text(num - $(this).val().length);

    $(this).on('keydown keyup change', function() {
      span.text(num - $(this).val().length);
      if((num - $(this).val().length) > 50) {
        span.css({'background':'', 'border':'', 'color':''});
      }
      if((num - $(this).val().length) <= 50) {
        span.css({'background':'#ffc100', 'border':'1px solid #ffc100', 'color':'#fff'});
      }
      if((num - $(this).val().length) <= 10) {
        span.css({'background':'red', 'border':'1px solid red', 'color':'#fff'});
      }
    });
  });
}