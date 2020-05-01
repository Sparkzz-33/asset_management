$(document).ready(function(){

	var DOMAIN = "http://localhost/asset_management/public_html";
	$("#register_form").on("submit", function(){
		var status = false;
		var name = $("#username");
		var email = $("#email");
		var pass1 = $("#password1");
		var pass2 = $("#password2");
		var type = $("#usertype");
		//var n_patt = new RegExp(/^[A-Za-z ]+$/);
		var e_patt = new RegExp(/^[A-Za-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[A-Za-z0-9_-]+)*(\.[a-z]{2,4})$/);
		if(name.val() == "")
		{
			name.addClass("border-danger");
			$("#u_error").html("<span class='text-danger'>Please Enter Name</span>");
			status = false;
		}
		else
		{
			name.removeClass("border-danger");
			$("#u_error").html("");
			status = true;
		}

		if(!e_patt.test(email.val()))
		{
			email.addClass("border-danger");
			$("#e_error").html("<span class='text-danger'>Please Enter Valid email address</span>");
			status = false;
		}
		else
		{
			email.removeClass("border-danger");
			$("#e_error").html("");
			status = true;
		}

		if(pass1.val() == "" || pass1.val().length < 6)
		{
			pass1.addClass("border-danger");
			$("#p1_error").html("<span class='text-danger'>Please Enter Password above 6 char</span>");
			status = false;
		}
		else
		{
			pass1.removeClass("border-danger");
			$("#p1_error").html("");
			status = true;
		}

		if(pass2.val() == "" || pass2.val().length < 6)
		{
			pass2.addClass("border-danger");
			$("#p2_error").html("<span class='text-danger'>Please Enter Password above 6 char</span>");
			status = false;
		}
		else
		{
			pass2.removeClass("border-danger");
			$("#p2_error").html("");
			status = true;
		}

		if(type.val() == "")
		{
			type.addClass("border-danger");
			$("#t_error").html("<span class='text-danger'>Please Choose  Usertype</span>");
			status = false;
		}
		else
		{
			type.removeClass("border-danger");
			$("#t_error").html("");
			status = true;
		}
		if (pass1.val() == pass2.val() && status == true) 
		{
			$.ajax({
				url : DOMAIN+"/includes/process.php",
				method : "POST",
				data : $("#register_form").serialize(),
				success : function(data){
					if (data == "EMAIL_ALREADY_EXISTS") 
					{
						alert("Email already used");
					}
					else if(data == "Some_Error")
					{
						alert("Something Wrong");
					}
					else
					{
						alert(data);
						window.location.href = encodeURI(DOMAIN+"/index.php?msg= You are registered");
					}
				}
			})
		}
		else
		{
			pass2.addClass("border-danger");
			$("#p2_error").html("<span class='text-danger'>Passwords do not match</span>");
			status = true;
		}
	})
})