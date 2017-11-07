//Accordian Action
var action = 'click';
var speed = "500";


//Document.Ready
$(document).ready(function(){
  //Question handler
$('li.q').on(action, function(){
  //gets next element
  //opens .a of selected question
$(this).next().slideToggle(speed)
    //selects all other answers and slides up any open answer
    .siblings('li.a').slideUp();
  
  //Grab img from clicked question
	var li = $(this);
	//Remove Rotate class from all images except the active
	$('li').not(li).removeClass('faqItemActive');
	//toggle rotate class
	li.toggleClass('faqItemActive');

});//End on click




});//End Ready
