<section class="content pt-3">
	<div class="container-fluid">
		<div class="row clearfix">
			<div class="col-lg-12">
				<div class="card">
					<div class="body">
						<? if(isset($_COOKIE['message_frontendtools_net'])) { ?>
							<h2>¡Hecho!</h2>
							<p><?= $_COOKIE['message_frontendtools_net'] ?></p>
							<?
							setcookie('message_frontendtools_net', null, -1, '/'.$_SERVER['VIEWS'].'/success');
							?>
						<? } else {
							header('Location: /');
            } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>