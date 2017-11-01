// JavaScript Validation For Registration Page

$('document').ready(function()
{ 		 		
		 // name validation
		  var nameregex = /^[a-zA-Z ]+$/;
		 
		 $.validator.addMethod("validname", function( value, element ) {
		     return this.optional( element ) || nameregex.test( value );
		 }); 
		 
		 // valid email pattern
		 var eregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		 
		 $.validator.addMethod("validemail", function( value, element ) {
		     return this.optional( element ) || eregex.test( value );
		 });
		 
		 $("#addbillpayment").validate({
					
		  rules:
		  {
				month: {
					required: true,					
				},
				year: {
					required: true,					
				},
				
				companyname: {
					required: true,					
				},
				paymentamount: {
					required: true,					
					number: true
				},
				servicetax:{
					required: true,
					number: true
				}			
		   },
		   messages:
		   {
				month: {
					required: "Please Select Month"					
					  },
			    year: {
					  required: "Please Select Year"
					 
					   },
				
					companyname:{
						required: "Please Enter Company Name"
						
					},
					paymentamount:{
						required:"Please Enter Payment Amount",
						number: "Payment Amount must be Number"
					},
					servicetax:{
						required:"Please Enter Service Tax",
						number: "Service Tax must be Number"
					}					
					
		   },
		   errorPlacement : function(error, element) {
			  $(element).closest('.form-group').find('.help-block').html(error.html());
		   },
		   highlight : function(element) {
			  $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
		   },
		   unhighlight: function(element, errorClass, validClass) {
			  $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
			  $(element).closest('.form-group').find('.help-block').html('');
		   },
		   
		   		submitHandler: function(form){
					
					//alert('submitted');
					form.submit();
					//var url = $('#register-form').attr('action');
					//location.href=url;
					
				}
				
				/*submitHandler: function() 
							   { 
							   		alert("Submitted!");
									$("#register-form").resetForm(); 
							   }*/
		   
		   }); 
		   
		   //addbankpayment
		   
		   $("#bankpayment").validate({
					
		  rules:
		  {
				month: {
					required: true,					
				},
				year: {
					required: true,					
				},	
				
				paymentamount: {
					required: true,					
					number: true
				},
				servicetax:{
					required: true,
					number: true
				}			
		   },
		   messages:
		   {
				month: {
					required: "Please Select Month"					
					  },
			    year: {
					  required: "Please Select Year"
					 
					   },		
					
					paymentamount:{
						required:"Please Enter Payment Amount",
						number: "Payment Amount must be Number"
					},
					servicetax:{
						required:"Please Enter Service Tax",
						number: "Service Tax must be Number"
					}					
					
		   },
		   errorPlacement : function(error, element) {
			  $(element).closest('.form-group').find('.help-block').html(error.html());
		   },
		   highlight : function(element) {
			  $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
		   },
		   unhighlight: function(element, errorClass, validClass) {
			  $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
			  $(element).closest('.form-group').find('.help-block').html('');
		   },
		   
		   		submitHandler: function(form){
					
					//alert('submitted');
					form.submit();
					//var url = $('#register-form').attr('action');
					//location.href=url;
					
				}
				
				/*submitHandler: function() 
							   { 
							   		alert("Submitted!");
									$("#register-form").resetForm(); 
							   }*/
		   
		   }); 
		   
		   //upload bill
		   
		   $("#uploadbill").validate({
					
		  rules:
		  {
				csvfile: {
					required: true					
				},
				year: {
					required: true					
				},	
				
				month: {
					required: true					
					
				}
							
		   },
		   messages:
		   {
				month: {
					required: "Please Select Month"					
					  },
			    year: {
					  required: "Please Select Year"
					 
					   },		
					
					csvfile:{
						required:"Please Upload File"						
					}
									
					
		   },
		   errorPlacement : function(error, element) {
			  $(element).closest('.form-group').find('.help-block').html(error.html());
		   },
		   highlight : function(element) {
			  $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
		   },
		   unhighlight: function(element, errorClass, validClass) {
			  $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
			  $(element).closest('.form-group').find('.help-block').html('');
		   },
		   
		   		submitHandler: function(form){
					
					//alert('submitted');
					form.submit();
					//var url = $('#register-form').attr('action');
					//location.href=url;
					
				}
				
				/*submitHandler: function() 
							   { 
							   		alert("Submitted!");
									$("#register-form").resetForm(); 
							   }*/
		   
		   }); 
		   
		   
		   
		   
		   /*function submitForm(){
			 
			   
			   /*$('#message').slideDown(200, function(){
				   
				   $('#message').delay(3000).slideUp(100);
				   $("#register-form")[0].reset();
				   $(element).closest('.form-group').find("error").removeClass("has-success");
				    
			   });
			   
			   alert('form submitted...');
			   $("#register-form").resetForm();
			      
		   }*/
});