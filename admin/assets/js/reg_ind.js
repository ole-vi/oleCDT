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
		 
		 $("#register-form").validate({
					
		  rules:
		  {
				fname: {
					required: true,
					validname: true,
					minlength: 2
				},
				email: {
					required: true,
					validemail: true
				},
				password: {
					required: true,
					minlength: 6,
					maxlength: 15
				},
				/*cpassword: {
					required: true,
					equalTo: '#password'
				},*/
				mob: {
					required: true,
					minlength: 10,
					maxlength: 10,
					number: true
				},
				phone: {
					required: true,
					minlength: 10,
					maxlength: 10,
					number: true
				}
				off_phone: {
					required: false,
					minlength: 10,
					maxlength: 10,
					number: true
				}
				o_phone: {
					required: false,
					minlength: 10,
					maxlength: 10,
					number: true
				}
				/*address: {
					required: true,
					minlength:10
				},
				city:{
					required: true
				},
				pincode: {
					required: true,
					minlength: 6,
					maxlength: 6,
					number: true
				},
				pic1: {
					required: true
				},
				payment: {
					required: true
				},
				subject:
				{
					required: true
				},
				
				course:{
					required : true
				},
				qualification:{
					required: true
					
				}*/
		   },
		   messages:
		   {
				fname: {
					required: "Please Enter Name",
					validname: "Name must contain only alphabets and space",
					minlength: "Your Name is Too Short"
					  },
			    email: {
					  required: "Please Enter Email Address",
					  validemail: "Enter Valid Email Address"
					   },
				password:{
					required: "Please Enter Password",
					minlength: "Password at least have 6 characters"
					},
				/*cpassword:{
					required: "Please Retype your Password",
					equalTo: "Password Did not Match !"
					},*/
					mob:{
						required: "Please Enter Mobile no",
						minlength: "Must Be 10 Digit",
						number: "Mobile No must contain only Number"
					},
					phone: {
						required: "Please Enter Phone no",
						minlength: "Must Be 10 Digit",
						number: "Phone No must contain only Number"
					}
					/*address:{
						required:"Please Enter Address",
						minlength: "Your Address is Too Short"
					},
					city:{
						required:"Please Select City"
					},
					pincode:{
						required:"Please Enter Pincode",
						minlength:"Pincode must be 6 digit",
						number: "Pincode must contain only Number"
					},
					/*pic1: {
						required: "Please Upload a Pic"
						
					},*/
					/*payment: 
					{
						required : "Please Select Payment Option"
					},
					subject:
					{
						required : "Please Select Subject"
					},
					course:
					{
						required : "Please Select A Course"
						
					},
					qualification:
					{
						required : "Please Select Qualification"
					}
					*/
					
					
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