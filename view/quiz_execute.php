<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>QUIZ - Execute</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link href="css/style.css" rel="stylesheet" >	
</head>
<body>	
        <div class="container">
        	<div class="row">
				<div class="col-sm-12">
					<button type="button" class="btn btn-info">Back</button>
				</div>
				<div class="col-sm-12">
					<input type="text" name="quiz_handle" id="quiz_handle" hidden="true" value="<?php echo $_GET['h']; ?>">
					<div id="surveyElement"></div>
					<div id="surveyResult"></div>
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
	<script src="js/tables.js"></script>
	<script src="js/script.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/survey-jquery/1.0.38/survey.jquery.min.js"></script>
	<script src="js/quiz_execute.js"></script>
</body>
</html>