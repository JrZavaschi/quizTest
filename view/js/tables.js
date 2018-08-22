$( document ).ready(function() {
   
	
	$.getJSON( '../controller/getQuiz.php?search=',{ajax: 'true'}, function(data) {
	
		$.each(data, function (key, value) {
					
			$('#quiz_table tbody').append("<tr><td><input type='checkbox' /></td><td>"+value.subject+"</td><td>"+value.description+"</td> <td>"+value.created_at+"</td> <td>"+value.updated_at+"</td>  <td><button type='button' class='btn btn-default quiz_edit' id='"+value.handle+"'><i class='fa fa-pencil'></i></button></td></tr>");
		});
		
		$.each(data, function (key, value) {
					
			$('#quiz_select tbody').append("<tr><td><input type='checkbox' /></td><td>"+value.subject+"</td><td>"+value.description+"</td> <td>"+value.counter_question+"</td> <td>"+value.created_at+"</td>  <td><a href='quiz_execute.php?h="+value.handle+"'><button type='button' class='btn btn-default quiz_execute' id='"+value.handle+"'><i class='fa fa-play'></i></button></a></td></tr>");
		});
	});

	

});