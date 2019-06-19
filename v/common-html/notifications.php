<?

$notify = null;
if(isset($_COOKIE['fet_notify'])) { ?>
  <?
  $messages = unserialize($_COOKIE['fet_notify']);
  $notify = [
    'type' => $messages['type'],
    'title' => $messages['title'],
    'message' => $messages['message'],
  ];
}

if($notify) { ?>
	<script>
		// open notification modal
	  swal({
      title: '<?= $notify['title'] ?>',
      html: '<?= $notify['message'] ?>',
      type: '<?= $notify['type'] ?>',
      timer: 2500,
      confirmButtonText: 'Aceptar',
      confirmButtonColor: '#263238',
      allowOutsideClick: true,
    });
	</script>
<?
// delete cookie 
setcookie('fet_notify', null, -1, '/');
}