// JavaScript Document
jQuery().ready(function($) {


// custom action so that default text will not be accepted
jQuery.validator.addMethod("first_name", function(value, element) {
	return value != "First";
}, "");
jQuery.validator.addMethod("last_name", function(value, element) {
	return value != "Last";
}, "");

// custom validation to only allow certain characters
jQuery.validator.addMethod("accept", function(value, element, param) {
  return value.match(new RegExp("^" + param + "$"));
});


// Clear default fields values for all input fields with a class of "clearThis"

$('input.clearThis').each(function() {
    $(this)
      .data('default', $(this).val())
      .addClass('inactive')
      .focus(function() {
        $(this).removeClass('inactive');
        if($(this).val() == $(this).data('default') || '') {
          $(this).val('');
        }
      })
      .blur(function() {
        var default_val = $(this).data('default');
        if($(this).val() == '') {
          $(this).addClass('inactive');
          $(this).val($(this).data('default'));
        }
      });
  });


	// validate signup form on keyup and submit
	$("#theForm").validate({
		
		onfocusout: function(element) {
			$(element).valid();
		},
		
		rules: {
			firstName: {
				required: true,
				first_name:true,
				accept: "[a-zA-Z '-.]+"
			},
			lastName: {
				required: true,
				last_name: true,
				accept: "[a-zA-Z '-.]+"
			},
			email: {
				required: true,
				email: true
			},
			phone: { 
				required: true,
				accept: "[0-9 ()-.]+",
				minlength: 10
      	    },
        	month: {
				required: true
			},
			day: {
				required: true
			},
			year: {
				required: true
			},
			campus: {
				required: true
			},
			session: {
				required: true
			},
			tshirt: {
				required: true
			}
		},
		messages: {
			firstName: {
				required: "Please enter your First Name.",
				first_name: "Please enter your First Name.",
				accept: "Only characters in First Name." 
			},
			lastName: {
				required: "Please enter your Last Name.",
				last_name: "Please enter your Last Name.",
				accept: "Only characters in Last Name." 
			},
			email: {
				required: "Please enter your email address.",
				email: "Please enter a valid email address."
			},
			phone: {
				required: "Please enter your Phone Number.",
				accept: "Please do not enter letters in Phone Number.",
				minlength: "Please enter at least 10 Digits for your Phone Number."
			},
			month: {
				required: "Please select a valid Month."
			},
			day: {
				required: "Please select a valid Day."
			},
			year: {
				required: "Please select a valid Year."
			},
			campus: {
				required: "Please select a Campus."
			},
			session: {
				required: "Please select a Session."
			},
			tshirt: {
				required: "Please select a Tshirt size."
			}
			
		},
        errorElement: "div",
        //wrapper: "div",  // a wrapper around the error message
		errorPlacement: function (error, element) {
		
			
	 		if (element.attr("name") == "firstName" || element.attr("name") == "lastName") {
				$("#namemessage").append(error);
				$("#namemessage").fadeIn('slow');
			 }
			 else if (element.attr("name") == "month" || element.attr("name") == "day" || element.attr("name") == "year") {
			 	$("#birthdaymessage").append(error);
			 	$("#birthdaymessage").fadeIn('slow');
			 }
			

			 else
			 
			 
			 /******* Comment the code below to show error messages. *******/
			  error.fadeIn('200').insertAfter(element);
		}
	});
	
	
});