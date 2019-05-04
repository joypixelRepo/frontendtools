<section class="entries content pt-3">
	<div class="container-fluid">
		<div class="row clearfix">
			<div class="col-12">
				<div class="card">
					<div class="body">
						<div class="header">
							<h2>Últimas utilidades<small>Listado de las últimas utilidades añadidas<?= isset($_GET['creator']) ? ' por <strong>'.$_GET['creator'].'</strong>' : ''; ?>.</small></h2>
						</div>
					</div>
				</div>
				<div class="card d-none d-sm-block">
					<div class="body">
						<div class="header">
							<div class="languages-logos languages-logos-big">
							<?php foreach ($categories as $category) { ?>
								<a href="/?c=<?=$category['descriptive_name']?>">
									<img src="<?= $category['category_logo'] ?>" data-toggle="tooltip" data-placement="bottom" title="<?= $category['category_name']?> (<?= isset($category['count']) && $category['count'] > 0 ? $category['count'] : 0 ?> entradas)">
								</a>&nbsp;&nbsp;
							<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<? include $_SERVER['DOCUMENT_ROOT'].'/'.$_SERVER['VIEWS'].'/entries_layout.php'; ?>
			</div>
		</div>
	</div>
</section>