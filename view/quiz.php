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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link href="css/style.css" rel="stylesheet" >	
</head>
<body>
	<?php
		include('header_nav.php');
	?>
	
        <div class="container">
        	<div class="row">
				<div class="col-sm-12">
					<button type="button" class="btn btn-success" id="new_quiz"> <i class="fa fa-plus"></i> New QUIZ</button>
				</div>
				<div class="col-sm-12">
					<table class="table table-dark table-hover" id="quiz_table">
						<thead>
							<th>#</th>
							<th>Subject</th>
							<th>Description</th>
							<th>Created At</th>
							<th>Updated At</th>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
    	</div>
	<div id="footer">
		&copy; <?php echo date('Y'); ?> - Junior Zavaschi
	</div>
	<!-- script JS include -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="js/script.js"></script>
	<script src="js/tables.js"></script>
</body>
</html>