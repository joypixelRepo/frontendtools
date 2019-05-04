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
	  swal('<?= $notify['title'] ?>', '<?= $notify['message'] ?>', '<?= $notify['type'] ?>');
	</script>
<?
// delete cookie 
setcookie('fet_notify', null, -1, '/');
}