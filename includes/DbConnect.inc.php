<?php

require ("classes/auktion.php");

class Dbh {
	private $servername;
	private $username;
	private $password;
	private $dbname;


	public function connect() {
		$this->servername = "localhost";
		$this->username = "root";
		$this->password = "";
		$this->dbname = "auctions";

		 try	{


		 //Using localhost, if using an online server, change localhost with that server.
		 $dsn = "mysql:host=".$this->servername.";dbname=".$this->dbname;
		 $pdo = new PDO($dsn,$this->username,$this->password);
		 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		 return $pdo;

	 }
    catch (PDOException $e) {
		 // If theres an error, we catch the error and echo it so its visible on the website.
		 echo "Connection failed: ".$e->getMessage();
	 }
  }

	// public function getAuction ($sql)
	// {
	//   $statement = $this->connect->prepare(sql);
	//   $statement = $this->execute();
	//   while($row = $statement->fetch())
	//   {
	//     $dataset[] = new AuctionData($row);
	//   }
	//   if(!empty($dataSet))
	//       return $dataSet;
	//   else
	//       return null;
	// }

}




?>
