<?php if (count($errors) > 0) : ?>
	<div class="error2">
		<?php foreach ($errors as $error) : ?>
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<p class="text-dark"><?php echo $error ?></p>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		<?php endforeach ?>
	</div>
<?php endif ?>  