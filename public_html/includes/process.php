<?php


include_once("../database/constants.php");
include_once("user.php");
include_once("DBOperation.php");
include_once("manage.php");
if (isset($_POST["username"]) AND isset($_POST["email"])) 
{
	$user = new User();
	$result = $user->createUserAccount($_POST["username"], $_POST["email"], $_POST["password1"], $_POST["usertype"]);
	echo $result;
	exit();
}

//Login part
if (isset($_POST["log_email"]) AND isset($_POST["log_password"]))
{
	$user = new User();
	$result = $user->userLogin($_POST["log_email"], $_POST["log_password"]);
	echo $result;
	exit();
}

//Get Category
if (isset($_POST["getCategory"])) 
{
		$obj = new DBOperation();
		$rows = $obj->getAllRecord("categories");
		foreach ($rows as $row) {
			echo "<option value = '".$row["cid"]."'>".$row["category_name"]."</option>";
		}
		exit();
}

//Fetch Brand
if (isset($_POST["getBrand"])) 
{
		$obj = new DBOperation();
		$rows = $obj->getAllRecord("brands");
		foreach ($rows as $row) {
			echo "<option value = '".$row["bid"]."'>".$row["brand_name"]."</option>";
		}
		exit();
}

//Add Category

if (isset($_POST["category_name"]) AND isset($_POST["parent_cat"])) {
	$obj = new DBOperation();
	$result = $obj->addCategory($_POST["parent_cat"], $_POST["category_name"]);
	echo $result;
	exit();
}


//ADD BRAND
if (isset($_POST["brand_name"])) {
	$obj = new DBOperation();
	$result = $obj->addBrand($_POST["brand_name"]);
	echo $result;
	exit();
}

//Add Product

if (isset($_POST["added_date"]) AND isset($_POST["product_name"])) {
	$obj = new DBOperation();
	$result = $obj->addProduct($_POST["select_cat"], $_POST["select_brand"], $_POST["product_name"], $_POST["product_price"], $_POST["product_qty"], $_POST["added_date"]);
	echo $result;
	exit();
}

//Manage Category

if (isset($_POST["manageCategory"])) {
	$m = new Manage();
	$result = $m->manageRecordWithPagination("categories", $_POST["pageno"]);
	$rows = $result["rows"];
	$pagination = $result["pagination"];
	if (count($rows) > 0) {
		$n = ($_POST["pageno"] - 1) * 5 + 1;
		foreach ($rows as $row) {
			?>

				<tr>
			        <td><?php echo $n ?></td>
			        <td><?php echo $row["category"] ?></td>
			        <td><?php echo $row["parent"] ?></td>
			        <td>
			        	<a href="#" class="btn btn-success btn-sm">Active</a>
			        </td>
			        <td>
			        	<a href="#" did="<?php echo $row['cid']; ?>" class="btn btn-danger btn-sm del_cat">Delete</a>
			        	<a href="#"  eid="<?php echo $row['cid']; ?>" class="btn btn-primary btn-sm edit_cat" data-toggle="modal" data-target="#u_category">Edit</a>
			        </td>
			     </tr>

			<?php
			$n++;
		}
		?>
			<tr><td colspan = "5"><?php echo $pagination; ?></td></tr>
		<?php
		exit();
	}
}

//Delete Category
if (isset($_POST["deleteCategory"])) {
	$m = new Manage();
	$result = $m->deleteRecord("categories","cid", $_POST["id"]);
	echo $result;
	exit();
}

//Update Category
if (isset($_POST["updateCategory"])) {
	$m = new Manage();
	$result = $m->getSingleRecord("categories", "cid", $_POST["id"]);
	echo json_encode($result);
	exit();
}

if (isset($_POST["update_category"])) {
	$m = new Manage();
	$id = $_POST["cid"];
	$name = $_POST["update_category"];
	$parent_cat = $_POST["parent_cat"];
	$result = $m->updateCategory($id, $parent_cat, $name);
	echo $result;
	exit();
}

//*********Brand*********

if (isset($_POST["manageBrand"])) {
	$m = new Manage();
	$result = $m->manageRecordWithPagination("brands", $_POST["pageno"]);
	$rows = $result["rows"];
	$pagination = $result["pagination"];
	if (count($rows) > 0) {
		$n = ($_POST["pageno"] - 1) * 5 + 1;
		foreach ($rows as $row) {
			?>

				<tr>
			        <td><?php echo $n ?></td>
			        <td><?php echo $row["brand_name"] ?></td>
			        <td>
			        	<a href="#" class="btn btn-success btn-sm">Active</a>
			        </td>
			        <td>
			        	<a href="#" did="<?php echo $row['bid']; ?>" class="btn btn-danger btn-sm del_brand">Delete</a>
			        	<a href="#"  eid="<?php echo $row['bid']; ?>" class="btn btn-primary btn-sm edit_brand" data-toggle="modal" data-target="#up_brand">Edit</a>
			        </td>
			     </tr>

			<?php
			$n++;
		}
		?>
			<tr><td colspan = "5"><?php echo $pagination; ?></td></tr>
		<?php
		exit();
	}
}

if (isset($_POST["deleteBrand"])) {
	$m = new Manage();
	$result = $m->deleteRecord("brands","bid", $_POST["id"]);
	echo $result;
	exit();
}

if (isset($_POST["updateBrand"])) {
	$m = new Manage();
	$result = $m->getSingleRecord("brands", "bid", $_POST["id"]);
	echo json_encode($result);
	exit();
}

if (isset($_POST["update_brand"])) {
	$m = new Manage();
	$id = $_POST["bid"];
	$name = $_POST["update_brand"];
	$result = $m->updateBrand($id, $name);
	echo $result;
	exit();
}
//*******Product*********

if (isset($_POST["manageProduct"])) {
	$m = new Manage();
	$result = $m->manageRecordWithPagination("products", $_POST["pageno"]);
	$rows = $result["rows"];
	$pagination = $result["pagination"];
	if (count($rows) > 0) {
		$n = ($_POST["pageno"] - 1) * 5 + 1;
		foreach ($rows as $row) {
			?>

				<tr>
			        <td><?php echo $n ?></td>
			        <td><?php echo $row["product_name"] ?></td>
			        <td><?php echo $row["category_name"] ?></td>
			        <td><?php echo $row["brand_name"] ?></td>
			        <td><?php echo $row["product_price"] ?></td>
			        <td><?php echo $row["product_stock"] ?></td>
			        <td><?php echo $row["added_date"] ?></td>

			        <td>
			        	<a href="#" class="btn btn-success btn-sm">Active</a>
			        </td>
			        <td>
			        	<a href="#" did="<?php echo $row['pid']; ?>" class="btn btn-danger btn-sm del_product">Delete</a>
			        	<a href="#"  eid="<?php echo $row['pid']; ?>" class="btn btn-primary btn-sm edit_product" data-toggle="modal" data-target="#up_product">Edit</a>
			        </td>
			     </tr>

			<?php
			$n++;
		}
		?>
			<tr><td colspan = "5"><?php echo $pagination; ?></td></tr>
		<?php
		exit();
	}
}

if (isset($_POST["deleteProduct"])) {
	$m = new Manage();
	$result = $m->deleteRecord("products","pid", $_POST["id"]);
	echo $result;
	exit();
}
if (isset($_POST["updateProduct"])) {
	$m = new Manage();
	$result = $m->getSingleRecord("products", "pid", $_POST["id"]);
	echo json_encode($result);
	exit();
}

// if (isset($_POST["update_product"])) {
// 	$m = new Manage();
// 	$id = $_POST["bid"];
// 	$name = $_POST["update_brand"];
// 	$result = $m->updateBrand($id, $name);
// 	echo $result;
// 	exit();
// }


?>