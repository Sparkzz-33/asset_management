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
	<div class="container" id="s_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="container" role="document">
    <div class="container">
      <div>
        <h5 id="exampleModalLabel">Search Product</h5>
      </div>
      <div class="container">
        <form id="search_product_form" onsubmit="return false">
            <div class="form-group">
              <label>Title</label>
              <input type="hidden" name="bid" id="bid" value=""/>
              <input type="text" class="form-control" name="search_title" id="search_title">
              <small id="search_error" class="form-text text-muted"></small>
            </div>

            <div class="form-group">
            <label for="search_parameter">Search Parameter</label>
            <select name="search_parameter" class="form-control" id="search_parameter">
              <option value="1">Category</option>
              <option value="2">Brand</option>
              <option value="3">Product</option>
            </select>
          </div>
            
            <button type="submit" class="btn btn-primary" onclick="document.getElementById('result_table').style.display = 'block' ;"><i class="fa fa-search"></i>  Search</button>
          </form>
          <br><br><br>
         <div class="container" id = "result_table" style="display: none">
    <table class="table table-hover table">
        <thead>
          <tr>
        
            <th>Product Name</th>
        <th>Price</th>
            <th>Stock</th>
            <th>Added Date</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="product_result">
         
          
        </tbody>
     </table>

  </div> 
      </div>
    </div>
  </div>
</div>
<?php 
	include_once("./templates/update_product.php");
 ?>

</body>
</html>