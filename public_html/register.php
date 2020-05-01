<!DOCTYPE html>
<html>
<head>
	<title>Asset Management System</title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script type="text/javascript" src="./js/main.js"></script>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<?php include_once("./templates/header.php"); ?>
	<br/><br/>
	<div class="container">
		<div class="card mx-auto" style="width: 30rem;">
	  	<!-- <img src="./images/login.jpg" class="card-img-top mx-auto"> -->
	  	<div class="card-header"><i class ="fa fa-user-plus"></i><b> Register</b></div>
		 	 <div class="card-body">
		 	 	<form id="register_form" onsubmit="return false" autocomplete="off">
		 	 		<div class="form-group">
		 	 			<label for="username">Full Name </label>
		 	 			<input type="text" name="username" class="form-control" id="username" placeholder="Eg. Ashutosh Jalamsing Rajput">
		 	 			<small id="u_error" class="form-text text-muted"></small>
		 	 		</div>

				  <div class="form-group">
				    <label for="email">Email address</label>
				    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
				    <small id="e_error" class="form-text text-muted"></small>
				  </div>

				  <div class="form-group">
				    <label for="password1">Password</label>
				    <input type="password" name="password1" class="form-control" id="password1">
				    <small id="p1_error" class="form-text text-muted"></small>
				  </div>

				  <div class="form-group">
				    <label for="password2">Re-enter Password</label>
				    <input type="password" name="password1" class="form-control" id="password2">
				    <small id="p2_error" class="form-text text-muted"></small>
				  </div>
				  
				  <div class="form-group">
				  	<label for="usertype">Usertype</label>
				  	<select name="usertype" class="form-control" id="usertype">
				  		<option value="">Choose user</option>
				  		<option value="1"><i class="fa fa-users"></i> Admin</option>
				  		<option value="0"><i class="fa fa-user-0"></i> Others</option>
				  	</select>
				  	<small id="t_error" class="form-text text-muted"></small>
				  </div>
				  <button type="submit" class="btn btn-primary" name="user_register"> <i class="fa fa-user-plus">&nbsp</i>Register</button>

				  <span><a href="index.php">Login</a></span>
				</form>
		 	</div>
		</div>
	</div>
</body>
</html>