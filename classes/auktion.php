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

// metode som connecter til database
	public static function getAuctions(&$arr) {
		$Dbh = new Dbh();
		$db = $Dbh->connect();

    // query som selecter
		$query="SELECT  auctionID, nameOfArt, artCategory, artDescription, nameOfArtist,
                    startBid, startDateTime, endDateTime FROM auction";
		$stmt=$db->prepare($query);
			$stmt->execute();

    // fetcher næste række i databasen og sender det tilbage som et objekt
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


    // Printer objektet
     public function __toString()
     {
        $s = sprintf("
        <br />
<div class='row'>
  <div class='col-sm-4'>
    <div class='block'>
      <div id='text' class='block-content'>
            <img src='getImg.php?id=%d'/>
            <br />
            Navn: %s
            <br />
            Kategori: %s
            <br/>
            Beskrivelse: %s
            <br/>
            Kunster: %s
            %s
            %s
            <br />
            Start Bud: %s kr,-
            <br/>
            Auktion slutter: %s
            <br />
            <button>Byd</button>
            <p style='text-align:justify  </p>
        </div>
      </div>
    </div>
  </div ",
       $this->getAuctionID(),
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
