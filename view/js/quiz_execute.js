$( document ).ready(function() {

	var quiz_handle = $('#quiz_handle').val();

		var jsonQuiz = {}; 
		var jsonQuiz = {};
    $.ajax({
        url: "../controller/getQuizExecute.php?h="+quiz_handle,
        async: false,
        dataType: 'json',
        success: function(data) {
					jsonQuiz = data;
        }
		});
		
		var jsonQuestion = {}; 
		var jsonQuestion = {};
			$.ajax({
					url: "../controller/getQuestionExecute.php?h="+jsonQuiz.handle,
					async: false,
					dataType: 'json',
					success: function(data) {
						jsonQuestion = JSON.stringify(data);
					}
			});

	var surveyJSON = {

		"title": jsonQuiz.subject,
		"completedHtml":"Thanks!",
			"pages": JSON.parse(jsonQuestion)
		}


	function sendDataToServer(survey) {

		var yourname = $('#yourname').val();
		var youremail = $('#youremail').val();
		var initialized_at = $('#initialized_at').val();

		//send Ajax request to db.
		$.ajax({
			url: "../controller/postQuestionExecute.php?h="+jsonQuiz.handle,
			data: {"answer" : JSON.stringify(survey.data), "yourname": yourname, "youremail": youremail, "initialized_at": initialized_at},
			dataType: "json",
			type: 'POST',
			success: function(data) {
				console.log(data);
			}
		});
	}

	//define style bootstrap to survey
	Survey.Survey.cssType = "bootstrap";
	Survey.defaultBootstrapCss.navigationButton = "btn btn-success";
	
	var survey = new Survey.Model(surveyJSON);

	$("#surveyContainer").Survey({
			model: survey,
			onComplete: sendDataToServer
	});	

});