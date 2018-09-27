<!-- http://x15.dk/webdev/site/apcs03.xhtml#idm45976671588544  -->

<?php

class Auction {

     private $auctionID;
     private $nameOfArt;
     private $artCategory;
     private $artDescription;
     private $nameOfArtist;
     private $startBid;
     private $startDateTime;
     private $endDateTime;
     private $artPhoto;

     public function __construct($auctionID,
                                 $nameOfArt,
                                 $artCategory,
                                 $artDescription,
                                 $nameOfArtist,
                                 $startBid,
                                 $startDateTime,
                                 $endDateTime,
                                 $artPhoto)
     {
       $this->auctionID = $auctionID;
       $this->nameOfArt = $nameOfArt;
       $this->artCategory = $artCategory;
       $this->artDescription = $artDescription;
       $this->nameOfArtist = $nameOfArtist;
       $this->artPhoto = $artPhoto;
       $this->startBid = $startBid;
       $this->startDateTime = $startDateTime;
       $this->endDateTime = $endDateTime;
     }


	public static function getAuctions(&$arr) {
		$Dbh = new Dbh();

		$db = $Dbh->connect();


		$query="SELECT  auctionID, nameOfArt, artCategory, artDescription, nameOfArtist,
                    startBid, startDateTime, endDateTime FROM auction";
		$stmt=$db->prepare($query);
			$stmt->execute();

		while ($row = $stmt->fetch(PDO::FETCH_OBJ)){
			$obj = new Auction($row->auctionID
      , $row->nameOfArt
      , $row->artCategory
      , $row->artDescription
      , $row->nameOfArtist
      , null
      , $row->startBid
      , $row->startDateTime
      , $row->endDateTime);
			array_push($arr, $obj);
		}
	}

     public function __toString() {
        $s = sprintf("<p>%s<br />  %s <br /> %s <br /> %s <br /> <img src='getImg.php?id=%d'/> %s <br /> %s <br /> %s </p>",
                                     // $this->getAuctionID(),
                                     $this->getNameOfArt(),
                                     $this->getArtCategory(),
                                     $this->getArtDescription(),
                                     $this->getNameOfArtist(),
                                     $this->getAuctionID(),
                                     $this->getStartBid(),
                                     $this->getStartDateTime(),
                                     $this->getEndDateTime());
            return $s;
          }


     public function getAuctionID()
     {
       return $this->auctionID;
     }

     public function getNameOfArt()
     {
       return $this->nameOfArt;
     }

     public function getArtCategory()
     {
       return $this->artCategory;
     }

     public function getArtDescription()
     {
       return $this->artDescription;
     }

     public function getNameOfArtist()
     {
       return $this->nameOfArtist;
     }

     public function getArtPhoto()
     {
       return $this->artPhoto;
     }

     public function getStartBid()
     {
       return $this->startBid;
     }

     public function getStartDateTime()
     {
       return $this->startDateTime;
     }

     public function getEndDateTime()
     {
       return $this->endDateTime;
     }

}



 ?>
