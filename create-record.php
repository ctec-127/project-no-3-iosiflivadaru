<?php // Filename: create-record.php
$pageTitle = "Create Record";
require 'inc/layout/header.inc.php'; 
?>

<div class="container">
	<div class="row mt-5">
		<div class="col-lg-12">
			<h1 class="text-center">Create a New Record</h1>
			<?php require __DIR__ .'/inc/create/content.inc.php'; ?>
			<?php require __DIR__ .'/inc/shared/form.inc.php' ?>
		</div>
    </div>
</div>

<?php require 'inc/layout/footer.inc.php'; ?>