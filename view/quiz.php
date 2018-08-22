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
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
       <a class="navbar-brand" href="#">QUIZTest</a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
             <li class="nav-item ">
                <a class="nav-link" href="index.php">Home </a>
             </li>
             <li class="nav-item active">
                <a class="nav-link" href="quiz.php">QUIZ <span class="sr-only">(current)</span></a>
             </li>
			 <li class="nav-item">
                <a class="nav-link" href="executions.php">Executions</a>
             </li>
          </ul>
             <button class="btn btn-outline-danger my-2 my-sm-0" id="logout" type="button">Logout</button>
       </div>
    </nav>
	
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
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="js/tables.js"></script>
	<script src="js/script.js"></script>
</body>
</html>