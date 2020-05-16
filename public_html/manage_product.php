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
	<div class="container">
		<table class="table table-hover table">
		    <thead>
		      <tr>
		        <th>No.</th>
		        <th>Product Name</th>
		        <th>Category</th>
		        <th>Brand</th>
		        <th>Price</th>
		        <th>Stock</th>
		        <th>Added Date</th>
		        <th>Status</th>
		        <th>Action</th>
		      </tr>
		    </thead>
		    <tbody id="get_product">
		      <!-- <tr>
		        <td>1</td>
		        <td>Electronics</td>
		        <td>Root</td>
		        <td>
		        	<a href="#" class="btn btn-success btn-sm">Active</a>
		        </td>
		        <td>
		        	<a href="#" class="btn btn-danger btn-sm">Delete</a>
		        	<a href="#" class="btn btn-primary btn-sm">Edit</a>
		        </td>
		      </tr> -->
		      
		    </tbody>
		 </table>
	</div>
<?php
	include_once("./templates/update_product.php");
?>


</body>
</html>