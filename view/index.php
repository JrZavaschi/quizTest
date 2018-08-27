<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>QUIZ - Administrator Panel</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link href="css/style.css" rel="stylesheet" id="bootstrap-css">	
</head>
<body>
	<?php
		include('header_nav.php');
	?>
	
        <div class="container">
			<div class="row">
				<div class="col-sm-12"></div>
			</div>
        	<div class="row">
				<div class="col-sm-4">
					<div class="card text-white bg-info mb-3" style="max-width: 18rem;">
					  <div class="card-header">QUIZ</div>
					  <div class="card-body">
						<h5 class="card-title">10</h5>
						<p class="card-text">QUIZ Counter</p>
					  </div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="card text-white bg-info mb-3" style="max-width: 18rem;">
					  <div class="card-header">Executed</div>
					  <div class="card-body">
						<h5 class="card-title">10</h5>
						<p class="card-text">Executed Counter</p>
					  </div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="card text-white bg-info mb-3" style="max-width: 18rem;">
					  <div class="card-header">Questions</div>
					  <div class="card-body">
						<h5 class="card-title">10</h5>
						<p class="card-text">Questions Counter</p>
					  </div>
					</div>
				</div>
				
			</div>
    	</div>
	<div id="footer">
		&copy; <?php echo date('Y'); ?> - Junior Zavaschi
	</div>
	<!-- script JS include -->
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>