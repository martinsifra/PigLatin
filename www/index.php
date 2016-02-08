<?php
require __DIR__ . '/../app/bootstrap.php';

$driver = new \App\Driver();
$driver->run();
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Pig Latin translator</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">

				</div>
			</div>
		</nav>

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Pig Latin translator</h1>
					<form action="#" method="post" id="form">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="english">English</label>
									<textarea class="form-control" id="english" name="english" rows="10"><?php echo $driver->getInput(); ?></textarea>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Pig Latin</label>
									<p id="piglatin" class="form-control-static"><?php echo $driver->getInput(); ?></p>
								</div>
							</div>
						</div>
						<input class="ajax btn btn-primary" name="translate" type="submit" value="Translate to Pig Latin" />
					</form>
				</div>
			</div>

			<hr>

			<footer>
				<p>&copy; Martin Šifra 2016</p>
			</footer>
		</div>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
