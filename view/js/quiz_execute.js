$( document ).ready(function() {
    
	var quiz_handle = $('#quiz_handle').val();

		
	$.getJSON( '../controller/getQuestion.php?search=',{ajax: 'true', 'h': quiz_handle}, function(data) {
		
		console.log( data[0]['pages'][1]['questions']);

		$.each( data, function (key, value) {
			
			var json_encode = JSON.stringify(value);
			//alert(json_encode);
			//console.log(json_encode);


		});


	var json = {
		title: data[0]['title'],
		showProgressBar: "bottom",
		showTimerPanel: "top",
		maxTimeToFinishPage: 10,
		maxTimeToFinish: 25,
		firstPageIsStarted: true,
		startSurveyText: "Start Quiz",
		pages: [
			data[0]['pages'][1]
		],
		completedHtml: "<h4>You have answered correctly <b>{correctedAnswers}</b> questions from <b>{questionCount}</b>.</h4>"
	}
		console.log(JSON.stringify(json));
	Survey.Survey.cssType = "bootstrap";
		
	var survey = new Survey.Model(json);
	
	survey
	  .onComplete
	  .add(function(result) {
		document
		  .querySelector('#surveyResult')
		  .innerHTML = "result: " + JSON.stringify(result.data);
	  });

	$("#surveyElement").Survey({
	  model: survey
	});

});
	
});