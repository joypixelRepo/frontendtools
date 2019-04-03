	
	<section class="content content-footer">
		<div class="container-fluid">
			<div class="row clearfix">
		      <div class="col-lg-12">
		          <div class="card">
		              <div class="body">
		                  <p class="m-b-0">© <?= date('Y') ?> Front-End Tools by <a href="//joypixel.com/" target="_blank">Joypixel</a></p>
		              </div>
		          </div>
		      </div>
		  </div>
		</div>
	</section>

	<!-- common scripts -->
	<script src="/assets/bundles/libscripts.bundle.js"></script>
	<script src="/assets/bundles/vendorscripts.bundle.js"></script>
	<script src="/assets/plugins/tether/tether.min.js"></script>
	<script src="/assets/plugins/autosize/autosize.min.js"></script>
	<script src="/assets/plugins/momentjs/moment.js"></script>
	<script src="/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
	<script src="/assets/bundles/mainscripts.bundle.js"></script>
	<script src="/assets/js/pages/forms/basic-form-elements.js"></script>
	<script src="/assets/js/custom/menu.js"></script>
	<script src="/assets/js/custom/admin.js"></script>
	<script src="/assets/js/custom/common.js"></script>

	<?php if(isset($scripts) && !empty($scripts)) {
		echo '<!-- required scripts for this view -->'."\n\t";
		foreach ($scripts as $script) {
			echo $script."\n\t";
		}
	} ?>

</body>
</html>