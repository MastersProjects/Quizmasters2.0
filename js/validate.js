$(function() {
    // Setup form validation on the #register-form element
    $("#user-form").validate({
    
        // Specify the validation rules
        rules: {
        	username: {
        		required: true,
        		maxlength: 45
        	},
            firstname: {
        		required: true,
        		maxlength: 45
        	},
            lastname: {
        		required: true,
        		maxlength: 45
        	},
            email: {
                required: true,
                email: true
            },
            passwordOne: {
                required: true,
                minlength: 5
            },
            passwordTwo: {
            	equalTo: "#passwordOne"
            },
            
        },
        
        // Specify the validation error messages
        messages: {
        	username: {
        		required: "Username bitte ausf&uuml;llen",
        		maxlength: "Username zu lang"
        	},
            firstname: {
        		required: "Vorname bitte ausf&uuml;llen",
        		maxlength: "Vorname zu lang"
        	},
            lastname: {
        		required: "Nachname bitte ausf&uuml;llen",
        		maxlength: "Nachname zu lang"
        	},
            passwordOne: {
                required: "Passwort ausf&uuml;llen",
                minlength: "Password muss mindesten 5 Zeichen lang sein"
            },
            email: "Bitte g&uuml;ltige Email eintragen",
            passwordTwo: "Passw&ouml;rter stimmen nicht &uuml;berein",
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });