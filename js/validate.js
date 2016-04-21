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
$(function() {
    $("#profile-form").validate({
        
        // Specify the validation rules
        rules: {
        	usernameUpdate: {
        		required: true,
        		maxlength: 45
        	},
            firstnameUpdate: {
        		required: true,
        		maxlength: 45
        	},
            lastnameUpdate: {
        		required: true,
        		maxlength: 45
        	},
            emailUpdate: {
                required: true,
                email: true
            }
            
        },
        
        // Specify the validation error messages
        messages: {
        	usernameUpdate: {
        		required: "Username bitte ausf&uuml;llen",
        		maxlength: "Username zu lang"
        	},
            firstnameUpdate: {
        		required: "Vorname bitte ausf&uuml;llen",
        		maxlength: "Vorname zu lang"
        	},
            lastnameUpdate: {
        		required: "Nachname bitte ausf&uuml;llen",
        		maxlength: "Nachname zu lang"
        	},
            emailUpdate: "Bitte g&uuml;ltige Email eintragen",
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });

$(function() {
    $("#passwordChange-form").validate({
        
        // Specify the validation rules
        rules: {
        	 passwordOneUpdate: {
                 required: true,
                 minlength: 5
             },
             passwordTwoUpdate: {
             	equalTo: "#passwordOneUpdate"
             },      
        },
        
        // Specify the validation error messages
        messages: {
        	passwordOneUpdate: {
                required: "Passwort ausf&uuml;llen",
                minlength: "Password muss mindesten 5 Zeichen lang sein"
            },
            passwordTwoUpdate: "Passw&ouml;rter stimmen nicht &uuml;berein",
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

  });


