$(document).ready(function(){
$(".parallax").parallax();

});
 
var total;

function getRandom(){return Math.ceil(Math.random()* 20);}
function createSum(){
		var randomNum1 = getRandom(),
			randomNum2 = getRandom();
	total =randomNum1 + randomNum2;
  $( "#captcha" ).text( randomNum1 + " + " + randomNum2 + "=" );  
  $("#reponse").val('');
  checkInput();
}

function checkInput(){
		var input = $("#reponse").val(), 
    	// slideSpeed = 200,
      hasInput = !!input, 
      valid = hasInput && input == total;
    $('#message').toggle(!hasInput);
    $('button[type=submit]').prop('disabled', !valid);  
    $('#success').toggle(valid);
    $('#fail').toggle(hasInput && !valid);
}

// $(document).ready(function(){
	//create initial sum
	createSum();
	// On "reset button" click, generate new random sum
	$('button[type=reset]').click(createSum);
	// On user input, check value
	$( "#reponse" ).keyup(checkInput);
// });