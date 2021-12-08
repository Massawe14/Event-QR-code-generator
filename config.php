<?php 
class RaviKoQr
{
  public $server = "localhost";
  public $user = "root";
  public $pass = "";
  public $dbname = "event_db";
	public $conn;
  public function __construct()
  {
  	$this->conn= new mysqli($this->server,$this->user,$this->pass,$this->dbname);
  	if($this->conn->connect_error)
  	{
  		die("connection failed");
  	}
  }
 	public function insertQr($firstname,$lastname,$fullname,$email,$pnumber,$qrimage,$qrlink)
 	{
 			$sql = "INSERT INTO qrcodes(first_name,last_name,full_name,email,phone_number,qrImage,qrlink) VALUES('$firstname','$lastname','$fullname','$email','$pnumber','$qrimage','$qrlink')";
 			$query = $this->conn->query($sql);
 			return $query;

 	
 	}
 	public function displayImg()
 	{
 		$sql = "SELECT qrImage,qrlink from qrcodes where qrImage='$qrimage'";
 	}
}
$meravi = new RaviKoQr();