$(document).ready(function () {


	/*Login form submit function to authentication */
	$('#login-form').submit(function (e) {
		var data;

		data = new FormData(this);

		$.ajax({
			url: 'controller/login.php',
			data: data,
			processData: false,
			type: 'POST',
			success: function (data) {
				alert(data);
			}
		});

		e.preventDefault();
	});

	$('#new_quiz').click(function () {
		window.location.href = 'quiz_form.php';
	});

	$('#back_quiz').click(function () {
		window.location.href = 'quiz.php';
	});


	/*Quiz new form submit function to insert data */
	$('#newORedit_quiz_form').submit(function (e) {

		var data;
		data = new FormData(this);

		var handle_quiz = $('#handle').val();
		
		if(handle_quiz > 0){

			$.ajax({
				url: '../controller/quiz_form.php?method=update',
				data: data,
				processData: false,
				type: 'POST',
				contentType: false,
				success: function (data) {
					
					var json = $.parseJSON(data);

					if (json.sucess === 'S') {

						$('#return_message').removeAttr('hidden');
						$('#return_message').html('Quiz updated success!');

					} else {
						
						$('#return_message').removeAttr('hidden');
						$('#return_message').html('Insert QUIZ - Error!');

					}
				}
			});

		}
		else{
			$.ajax({
				url: '../controller/quiz_form.php?method=insert',
				data: data,
				processData: false,
				type: 'POST',
				contentType: false,
				success: function (data) {

					var json = $.parseJSON(data);

					if (json.sucess === 'S') {
						$('#created_at').val(json.datetime);
						$('#handle').val(json.handle);
						$('#quiz_new_question').removeAttr('disabled');
						$('#return_message').removeAttr('hidden');
						$('#return_message').html('Insert QUIZ - Success, continue to include questions!');
						$('#quiz_question').val(json.handle);
						$('#quiz_question_visible').val(json.handle);

						$('#questionFormModal').modal('show');
					} else {
						$('#return_message').html('Insert QUIZ - Error!');
					}
				}
			});

		}

		
		
		e.preventDefault();
	});


	/*Quiz new question form submit function to insert data */
	$('#quiz_question_form').submit(function (e) {


		var data;
		data = new FormData(this);

		$.ajax({
			url: '../controller/quiz_question_form.php?method=insert',
			data: data,
			processData: false,
			type: 'POST',
			contentType: false,
			success: function (data) {
				var json = $.parseJSON(data);

				if (json.sucess === 'S') {

					$('#questionFormModal').modal('hide');

					$('#return_message').html('Question include - Ok');

					$('#quiz_question_form input').val('');

					$('#quiz_delete_question').removeAttr('hidden');
					
					$('#table_questions tbody').append("<tr id='" + json.handle + "'><td><input type='radio' /></td><td>" + json.type + "</td><td>" + json.name + "</td> <td>"+json.datetime+"</td></tr>");

				} else {
					$('#return_message').html('Insert Question - Error!');
				}
			}
		});


		e.preventDefault();
	});

	

	//type button define
	$('#type_question').change(function () {

		$('.quiz_add_answer').removeAttr('disabled');
		$('.is_correct_answer').removeAttr('disabled');

		if (this.value === 'Unique') {
			$('.is_correct_answer').prop('type', 'radio');
		}
		if (this.value === 'Multiple') {
			$('.is_correct_answer').prop('type', 'checkbox');
		}
	});


	//add new question in row
	$('.quiz_add_answer').click(function () {

		if ($("#type_question option:selected").text() === 'Unique') {
			var new_answer_content_unique = '<div class="col-sm-10"> <label for="name_answer">Name <font color="red">*</font></label> <input type="text" name="name_answer[]" class="form-control" required> </div> <div class="col-sm-1"> <label for="is_correct_answer">Is Correct</label> <input type="radio" value="S" name="is_correct_answer[]"  class="form-control is_correct_answer"> </div><div class="col-sm-1"></div>';
			$('#question_include_answer').html($('#question_include_answer').html() + new_answer_content_unique);
		}

		if ($("#type_question option:selected").text() === 'Multiple') {
			var new_answer_content_multiple = '<div class="col-sm-10"> <label for="name_answer">Name <font color="red">*</font></label> <input type="text" name="name_answer[]" class="form-control" required> </div> <div class="col-sm-1"> <label for="is_correct_answer">Is Correct</label> <input type="radio" value="S" name="is_correct_answer[]"  class="form-control is_correct_answer"> </div><div class="col-sm-1"></div>';
			$('#question_include_answer').html($('#question_include_answer').html() + new_answer_content_multiple);
		}



	});

	//getQuiz to form edit
	var handle_edit_quiz = $('#handle').val();

	if(handle_edit_quiz > 0){
		
		//functions to button new question
		$('#quiz_new_question').removeAttr('disabled');
		$('#quiz_delete_question').removeAttr('hidden');
		
		$('#quiz_new_question').click(function(){
			$('#quiz_question_visible').val(handle_edit_quiz);
			$('#quiz_question').val(handle_edit_quiz);
		});

		$.getJSON( '../controller/getQuiz.php?search=',{ajax: 'true', 'h': handle_edit_quiz}, function(data) {
			
			$('#name').val(data.name);
			$('#description').val(data.description);
			$('#created_at').val(data.created_at);
			$('#updated_at').val(data.updated_at);
			
		});

	}

	
	//question edit button click to modal
	$('#quiz_delete_question').click(function () {

		var handle_question_select = $('input[type=radio]:checked').val();
		
		$.getJSON( '../controller/delQuestion.php?search=',{ajax: 'true', 'h': handle_question_select}, function(data) {
		
			$('#return_message').removeAttr('hidden');
			$('#return_message').html(data.message);

			if(data.sucess === 'S'){
				$("tr#"+handle_question_select).css({ display: "none" })
			}
		});
	
	});

});
