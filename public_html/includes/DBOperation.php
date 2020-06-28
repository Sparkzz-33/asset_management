<?php


/**
 * 
 */
class DBOperation
{

	private $con;
	
	function __construct()
	{
		include_once("../database/db.php");
		$db = new Database();
		$this->con = $db->connect();
	}

	public function addCategory($parent, $cat)
	{
		$pre_stmt = $this->con->prepare("INSERT INTO `categories`(`parent_cat`, `category_name`, `status`) VALUES (?,?,?)");
		$status = 1;
		$pre_stmt->bind_param("isi", $parent, $cat, $status);
		$result = $pre_stmt->execute() or die($this->con->error);
		if($result)
		{
			return "CATEGORY_ADDED";
		}
		else
		{
			return 0;
		}
	}

	public function getAllRecord($table)
	{
		$pre_stmt = $this->con->prepare("SELECT * FROM ".$table);
		$pre_stmt->execute() or die($this->con->error);
		$result = $pre_stmt->get_result();
		$rows = array();

		if ($result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc())
			{
				$rows[] = $row;
			}
			return $rows;
		}
		return "NO_DATA";
	}

	public function addBrand($brand_name)
	{
		$pre_stmt = $this->con->prepare("INSERT INTO `brands`(`brand_name`, `status`) VALUES (?,?)");
		$status = 1;
		$pre_stmt->bind_param("si", $brand_name, $status);
		$result = $pre_stmt->execute() or die($this->con->error);
		if($result)
		{
			return "BRAND_ADDED";
		}
		else
		{
			return 0;
		}
	}

	public function addProduct($cid, $bid, $pro_name, $price, $stock, $date)
	{
		$pre_stmt = $this->con->prepare("INSERT INTO `products`
			( `cid`, `bid`, `product_name`, `product_price`, `product_stock`, `added_date`, `p_status`) VALUES 
			(?,?,?,?,?,?,?)");
		$status = 1;
		$pre_stmt->bind_param("iisdisi", $cid, $bid, $pro_name, $price, $stock, $date, $status);
		$result = $pre_stmt->execute() or die($this->con->error);
		if($result)
		{
			return "PRODUCT_ADDED";
		}
		else
		{
			return 0;
		}
	}

	public function searchByCategory($title)
	{
		$pre_stmt = $this->con->prepare("SELECT `cid` FROM `categories` WHERE `category_name` = ?");
		$pre_stmt->bind_param("s", $title);
		$pre_stmt->execute() or die($this->con->error);
		$result = $pre_stmt->get_result();
		if ($result->num_rows > 0) 
		{
			while($row1 = $result->fetch_assoc())
			{
				$rows1[] = $row1;
			}
			if($rows1[0]['cid'])
			{
				$pre_stmt = $this->con->prepare("SELECT * FROM `products` WHERE `cid` = ".$rows1[0]['cid']."");
				$pre_stmt->execute() or die($this->con->error);
				$result1 = $pre_stmt->get_result();
				if($result1->num_rows > 0){
					while($row = $result1->fetch_assoc())
					{
						$rows[] = $row;
					}
					return $rows;
				}
				// return $result; 
				else
				{
					return "No product for this parameter";
				}
			}
		}		
		else
		{
			return "Invalid_Paramter";
		}
	}

	public function searchByBrand($title)
	{
		$pre_stmt = $this->con->prepare("SELECT `bid` FROM `brands` WHERE `brand_name` = ?");
		$pre_stmt->bind_param("s", $title);
		$pre_stmt->execute() or die($this->con->error);
		$result = $pre_stmt->get_result();
		if ($result->num_rows > 0) 
		{
			while($row1 = $result->fetch_assoc())
			{
				$rows1[] = $row1;
			}
			if($rows1[0]['bid'])
			{
				$pre_stmt = $this->con->prepare("SELECT * FROM `products` WHERE `bid` = ".$rows1[0]['bid']."");
				$pre_stmt->execute() or die($this->con->error);
				$result1 = $pre_stmt->get_result();
				if($result1->num_rows > 0){
					while($row = $result1->fetch_assoc())
					{
						$rows[] = $row;
					}
					return $rows;
				}
				// return $result; 
				else
				{
					return "No product for this parameter";
				}
			}
		}		
		else
		{
			return "Invalid_Paramter";
		}
	}

	public function searchByProduct($title)
	{
	
		$pre_stmt = $this->con->prepare("SELECT * FROM `products` WHERE `product_name` = ?");
		$pre_stmt->bind_param("s", $title);
		$pre_stmt->execute() or die($this->con->error);
		$result = $pre_stmt->get_result();
		if($result->num_rows > 0)
		{
			while($row1 = $result->fetch_assoc())
			{
				$rows1[] = $row1;
			}
			return $rows1;
		}
		else
		{
			return "No product for this parameter";
		}		
	}

}

// $opr = new DBOperation();
// echo "<pre>";
// print_r($opr->searchByCategory("Vehicles"));
// echo "<pre>";
// print_r($opr->getAllRecord("categories"));

?>