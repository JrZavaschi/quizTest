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
			<form action="" method="post" id="new_quiz_form" class="form-horizontal" role="form" novalidate>
				<div class="row">
					<div class="col-sm-12">
						<button type="button" class="btn btn-info" id="back_quiz"> <i class="fa fa-plus"></i> Back</button>
					</div>
					<div class="col-sm-12">
						<br>
						<h4>New QUIZ</h4>
					</div>

						<div class="col-sm-5">
							<label for="name">Name <font color="red">*</font></label>
							<input type="text" name="name" id="name" placeholder="QUIZ Name" class="form-control" required>
						</div>
						<div class="col-sm-3">
							<label for="created_at">Created At</label>
							<input type="text" name="created_at" id="created_at" class="form-control" disabled>
						</div>
						<div class="col-sm-3">
							<label for="updated_at">Updated At</label>
							<input type="text" name="updated_at" id="updated_at" class="form-control" disabled>
						</div>
						<div class="col-sm-1">
							<label for="handle">Handle</label>
							<input type="text" name="handle" id="handle" class="form-control" disabled>
						</div>
						<div class="col-sm-12">
							<label for="desctiption">Description <font color="red">*</font></label>
							<textarea name="desctiption" id="desctiption" class="form-control" placeholder="Description"></textarea>
						</div>
						<div class="col-sm-12">
							<br>
							<button type="submit" name="quiz_form_save" class="btn btn-success">Save</button>
						</div>
						<div class="col-sm-12">
							<div class="alert alert-info alert-dismissible fade show" role="alert" id="return_message" hidden="true" >
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								 </button>
							</div>
						</div>
					</div>
			</form>
					<div class="row">
						<div class="col-sm-12">
							<h4>Questions</h4>
						</div>
						<div class="col-sm-12">
							<button type="button" class="btn btn-info" id="quiz_new_question" data-toggle="modal" data-target="#questionFormModal" disabled>New Question</button>
							<?php include('question_form_modal.php'); ?>
						</div>
						<div class="col-sm-12">
							<table class="table table-dark table-hover" id="table_questions">
								<thead>
									<th>#</th>
									<th>Type</th>
									<th>Name</th>
									<th><i class="fa fa-cogs"></i></th>
								</thead>
								<tbody></tbody>
							</table>
						</div>
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
</body>
</html>