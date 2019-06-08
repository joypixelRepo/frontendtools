const decodeInput = $('#decodeInput');
const encodeInput = $('#encodeInput');
const base64result = $('#base64result');
const base64code = $('#base64code');

decodeInput.on('click', function(e) {
  base64result.html(atob(base64code.val()));
});

encodeInput.on('click', function(e) {
  base64result.html(btoa(base64code.val()));
});