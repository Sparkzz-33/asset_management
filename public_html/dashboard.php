<?php
	include_once("./database/constants.php");
	if(!isset($_SESSION["userid"]))
	{
		header("location:".DOMAIN."/");
	}
?>

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
    <script type="text/javascript" src="./js/manage.js"></script>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <style>
    	body
    	{
    		background-color: #303030;
    	}
    </style> -->
</head>
<body>
	<?php  //Navigation Bar
		include_once("./templates/header.php");
	?>
	<br/>
	<div class = "container">
		<div class="row" style="height: 80%">
			<div class="col-md-4">
				<div class="card mx-auto">
				  <img src="./images/user.jpg" style="height:16rem;" class="card-img-top">
				  <div class="card-body">
				    <h5 class="card-title">Profile</h5>
				    <p class="card-text"><i class="fa fa-user">&nbsp;</i><?php echo ($_SESSION["username"]); ?></p>
				    <p class="card-text"><i class="fa fa-users">&nbsp;</i><?php echo "Admin"; ?></p>
				    <p class="card-text">Last Login : <?php echo ($_SESSION["last_login"]); ?></p>
				    <a href="#" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit Profile</a>
				  </div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="jumbotron"style=
				"width:100%; height: 100%">
					<h1>Welcome Admin</h1>
					<br/><br/>
					<div class="row">
						<div class="col-sm-6">
							<iframe style = "margin: auto;"src="http://free.timeanddate.com/clock/i793r49a/n1658/szw160/szh160/hbw0/hfc000/cf100/hgr0/facfff/mqv0/mhv0/mmv0/hhcbbb/hmcddd/hsceee" frameborder="0" width="160" height="160"></iframe>
						</div>
						<div class="col-sm-6">
							<div class="card">
						      <div class="card-body">
						        <h5 class="card-title">Search Products</h5>
						        <p class="card-text">Here you can search products using different parameters</p>
						        <a href="search_result.php" class="btn btn-primary">Search Products</a>
						      </div>
							</div>
						</div>
					</div>
				</div>			
			</div>				
		</div>
	</div>
	<br/>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="card mx-auto">
					<div class="card-body">
					  <h5 class="card-title">Categories</h5>
					  <p class="card-text">Here you can manage categories</p>
					  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#form_category">Add</a>
					  <a href="manage_categories.php" class="btn btn-primary"> Manage</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card mx-auto">
					<div class="card-body">
					  <h5 class="card-title">Brands</h5>
					  <p class="card-text">Here you can manage your brands</p>
					  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#form_brand">Add</a>
					  <a href="manage_brand.php" class="btn btn-primary"> Manage</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
					  <h5 class="card-title">Products</h5>
					  <p class="card-text">Here you can manage your products</p>
					  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#form_product">Add</a>
					  <a href="manage_product.php" class="btn btn-primary"> Manage</a>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- Modal -->

	<?php
			include_once("./templates/category.php");
	?>
	<?php
			include_once("./templates/brand.php");
	?>
	<?php
			include_once("./templates/product.php");
	?>

</body>
</html>