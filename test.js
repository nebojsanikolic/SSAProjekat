$(document).ready(function(){

// var bar = parseInt($('.progress-bar').width());
var i =2;
while(document.getElementById(i)){
    var card = document.getElementById(i);
    var element = parseInt(card.style.width);
    console.log(element);
        if (element < 100 && element > 80){
            console.log("danger");
            card.classList.add("bg-danger");
        }
        else if (element >= 50 && element <= 80){
            console.log("warning");

            card.classList.add("bg-warning");
        }
        else if (element < 50){
            console.log("success");
            card.classList.add("bg-success");
        }
        i++;
        console.log(i);
}


})