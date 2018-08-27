<?php
	include('../controller/technology/Sistema.php');
	$handle_quiz = Sistema::getGet('h');
?>
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
	<?php
		include('header_nav.php');
	?>
	
        <div class="container">
			<form action="" method="post" id="newORedit_quiz_form" class="form-horizontal" role="form" novalidate>
				<div class="row">
					<div class="col-sm-12">
						<button type="button" class="btn btn-info" id="back_quiz"> <i class="fa fa-arrow-left"></i> Back</button>
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
							<input type="text" name="handle" id="handle" value="<?php echo $handle_quiz; ?>" class="form-control" disabled>
							<input type="text" name="handle_quiz" id="handle_quiz" value="<?php echo $handle_quiz; ?>" class="form-control" hidden="true">
						</div>
						<div class="col-sm-12">
							<label for="description">Description <font color="red">*</font></label>
							<textarea name="description" id="description" class="form-control" placeholder="Description"></textarea>
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
						<button type="button" class="btn btn-danger" id="quiz_delete_question" hidden="true">Delete Question</button>
							<?php include('question_form_modal.php'); ?>
						</div>
						<div class="col-sm-12">
							<table class="table table-dark table-hover" id="table_questions">
								<thead>
									<th>#</th>
									<th>Type</th>
									<th>Name</th>
									<th>Created at</th>
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
	<script src="js/tables.js"></script>
</body>
</html>