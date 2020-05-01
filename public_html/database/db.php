<?php


class Database
{
	private $con;

	public function connect()
	{
		include_once("constants.php");
		$this->con = new Mysqli(HOST,USER,PASS,DB);
		if($this->con)
		{
			// echo "connected";
			return $this->con;
		}
		return "DATABASE_CONNECTION_FAILED";
	}
}

// $db = new Database();
// $db->connect();

?>