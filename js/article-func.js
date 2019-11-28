$(document).ready(function(){
$(".parallax").parallax();
});
 

 
    var result;
    var maximum =20;
    
     option1=Math.ceil(Math.random()* maximum);
     option2=Math.ceil(Math.random()* maximum);
    result= option1+option2;
    document.getElementById('captcha').innerHTML =  option1 + " + " + option2 + " =";
    document.formula.onsubmit = function() {
        var sum = document.getElementById('reponse').value;
        if(Number.parseInt(sum) != option1 + option2) {
        alert("Désolé, votre calcul est incorrect, cela laisse penser que vous êtes un robot.");
        return false;
        }
       };

