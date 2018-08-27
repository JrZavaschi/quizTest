$( document ).ready(function() {
   
	// get quiz data to table
	$.getJSON( '../controller/getQuizTable.php?search=',{ajax: 'true'}, function(data) {
	
		if($('#quiz_table tbody')){
		
			$.each(data, function (key, value) {
							
				$('#quiz_table tbody').append("<tr><td><input type='radio' /></td><td>"+value.subject+"</td><td>"+value.description+"</td> <td>"+value.created_at+"</td> <td>"+value.updated_at+"</td>  <td><a href='quiz_form.php?h="+value.handle+"'><button type='button' class='btn btn-default quiz_edit' id='"+value.handle+"' value='"+value.handle+"'><i class='fa fa-pencil'></i></button></td></tr>");
			
			});
			
			$.each(data, function (key, value) {
						
				$('#quiz_select tbody').append("<tr><td><input type='radio' /></td><td>"+value.subject+"</td><td>"+value.description+"</td> <td>"+value.counter_question+"</td> <td>"+value.created_at+"</td>  <td><a href='quiz_execute.php?h="+value.handle+"'><button type='button' class='btn btn-default quiz_execute' id='"+value.handle+"'><i class='fa fa-play'></i></button></a></td></tr>");
			
			});
		}
	});


	// get question data to table
	var quiz_question = $('#handle').val();

	$.getJSON( '../controller/getQuestion.php?search=',{ajax: 'true', 'q': quiz_question}, function(data) {
		if($('#handle').val() > 0 && data.handle > 0){
		
			$('#table_questions tbody').append("<tr id='"+data.handle+"'><td><input type='radio' name='question_handle' value='"+data.handle+"' id'="+data.handle+"' /></td><td>"+data.type+"</td><td>"+data.name+"</td> <td>"+data.created_at+"</td></tr>");

		}
	});

});