$("#AddQuestion").click(function() {
	console.log("j");
	$("#questions").append($(".addQuestion").html());
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