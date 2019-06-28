<?

$notify = null;
if(isset($_COOKIE['fet_notify'])) { ?>
  <?
  $messages = unserialize($_COOKIE['fet_notify']);
  $notify = [
    'type' => $messages['type'],
    'title' => $messages['title'],
    'message' => $messages['message'],
    'closeTime' => $messages['closeTime'] == 0 ? 120000 : $messages['closeTime'],
  ];
}

if($notify) { ?>
	<script>
		// open notification modal
	  swal({
      title: '<?= $notify['title'] ?>',
      text: '<?= $notify['message'] ?>',
      type: '<?= $notify['type'] ?>',
      timer: '<?= $notify['closeTime'] ?>',
      confirmButtonText: 'Aceptar',
      confirmButtonColor: '#263238',
      allowOutsideClick: true,
    });
	</script>
<?
// delete cookie 
setcookie('fet_notify', null, -1, '/');
}