<?php
require_once('../../config/config.php');
if ((isset($_SESSION['login']) == 'true')) {

?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>403 Forbidden</title>
		<link rel="stylesheet" href="<?= base_url('public/assets/css/main/app.css') ?>" />
		<link rel="stylesheet" href="<?= base_url('public/assets/css/pages/error.css') ?>" />
		<link rel="shortcut icon" href="<?= base_url('public/assets/images/logo/favicon.svg') ?>" type="image/x-icon" />
		<link rel="shortcut icon" href="<?= base_url('public/assets/images/logo/favicon.png') ?>" type="image/png" />
	</head>

	<body>
		<div id="error">
			<div class="error-page container">
				<div class="col-md-8 col-12 offset-md-2">
					<div class="text-center">
						<img class="img-error" src="<?= base_url('public/assets/images/samples/error-403.svg') ?>" alt="Not Found" />
						<h1 class="error-title">Forbidden</h1>
						<p class="fs-5 text-gray-600">You are unauthorized to see this page.</p>
						<a href="<?= base_url('') ?>" class="btn btn-lg btn-outline-primary mt-3">Go Home</a>
					</div>
				</div>
			</div>
		</div>
	</body>

	</html>
<?php
} else {
	header('location: ' . base_url('dashboard'));
}
?>