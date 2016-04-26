//1 is already in code. 
var counter = 2;
$("#AddQuestionBtn").click(function() {
	$tmc = $("#1").clone().attr('id', counter).show();
	$(".question", $tmc).attr('name', 'question' + counter);
	$("#answer1", $tmc).attr('name', 'answer' + counter + "-1");
	$("#answer2", $tmc).attr('name', 'answer' + counter + "-2");
	$("#answer3", $tmc).attr('name', 'answer' + counter + "-3");
	$("#answer4", $tmc).attr('name', 'answer' + counter + "-4");
	$(".optionRight", $tmc).attr('name', 'option' + counter);
	$tmc.appendTo("#questions");
	counter++;
});

//$(function() {
//    $("#addQuestion").validate({
//        
//        // Specify the validation rules
//        rules: {
//        	question: {
//                 required: true,
//             },  
//             answer1: {
//                 required: true,
//             }, 
//             answer2: {
//                 required: true,
//             }, 
//             answer3: {
//                 required: true,
//             }, 
//             answer4: {
//                 required: true,
//             }, 
//        },
//        
//        // Specify the validation error messages
//        messages: {
//        	question:"Bitte Frage ausf&uuml;llen",
//            answer1: "Bitte Antwort ausf&uuml;llen",
//            answer2: "Bitte Antwort ausf&uuml;llen",
//            answer3: "Bitte Antwort ausf&uuml;llen",
//            answer4: "Bitte Antwort ausf&uuml;llen",
//        },
//        submitHandler: function(form) {
//            form.submit();
//        }
//    });
//
//  });