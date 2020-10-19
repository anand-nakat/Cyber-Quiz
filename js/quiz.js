
$(document).ready( () => {

	//Clear Choice Button
	$(".clear-option-btn").click(function() {
		console.log('Choice Cleared');
		$(this).siblings('.options').children(".input-radio").prop("checked",false);
	});

	//Check corresponding input, if clicked on Option Text/ Radio Button
	$(".option-text,.checkmark").click(function() {
		console.log($(this).before());
		$(this).parent().children('.input-radio').prop("checked",true);
	});

	$(window).scroll(function() {
		if ($(this).scrollTop() > 500) 
			$('.take-me-up').fadeIn('slow');
		else 
			$('.take-me-up').fadeOut('slow');
	 });


	//Timer
	var timer2 = $("#time-countdown").html();
	var interval = setInterval(function() {

	  var timer = timer2.split(':');
	 
	  var minutes = parseInt(timer[0], 10);
	  var seconds = parseInt(timer[1], 10);
	  --seconds;
	  minutes = (seconds < 0) ? --minutes : minutes;

	  if (minutes < 0) 
	  {
	  	console.log('Submit');
		clearInterval(interval);
	  	$(".submit-test-btn").click();
	  }
	  if(minutes<1 && seconds<30)
	  {
		$(".quiz-container").addClass(" animate-box-shadow");
	  }

	  seconds = (seconds < 0) ? 59 : seconds;
	  seconds = (seconds < 10) ? '0' + seconds : seconds;
	 
	  $('#time-countdown').html(minutes + ':' + seconds);
	  timer2 = minutes + ':' + seconds;
	}, 1000);
});	