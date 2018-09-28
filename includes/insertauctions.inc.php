
<!-- connecting database into insert.php file data-->
<?php
try {
  $pdo = new PDO('mysql:dbname=auctions; host=localhost' , 'root' , '');
} catch (PDOException $e) {
  die('not connected with database');
}

if(isset($_POST['nameOfArt'],$_POST['artCategory'],$_POST
['artDescription'],$_POST['nameOfArtist'],$_POST['startBid'],$_POST
['endDateTime'],$_POST['artPhoto']))
  {
    $nameOfArt=$_POST['nameOfArt'];
    $artCategory=$_POST['artCategory'];
    $artDescription=$_POST['artDescription'];
    $nameOfArtist=$_POST['nameOfArtist'];
    $startBid=$_POST['startBid'];
    $endDateTime=$_POST['endDateTime'];
    $artPhoto=$_POST['artPhoto'];


    // INSERT QUERY
    $mysql="INSERT INTO artist (nameOfArtist , ageOfArtist , artistDescription ,
    artistPhoto) VALUES (:nameOfArtist , :ageOfArtist , :artistDescription , :artistPhoto)";

    $query=$pdo->prepare($mysql);

    // bindParam method to make equals between name ( values ) and name in the database
    $query->bindParam('nameOfArtist' ,$nameOfArtist);
    $query->bindParam('ageOfArtist' ,$ageOfArtist);
    $query->bindParam('artistDescription' ,$artistDescription);
    $query->bindParam('artistPhoto' ,$artistPhoto);

    // execute the query
    $query->execute();
  }

 ?>

 <!-- Create Form -->
 <fieldset>
 <legend>Opret Auktion</legend>
   <form action="thepage.php" method="POST">
   	<input type="text" name="nameOfArt" placeholder="nameOfArt"><br><br>
   	<input type="text" name="artCategory" placeholder="artCategory"><br><br>
   	<input type="text" name="nameOfArtist" placeholder="nameOfArtist"><br><br>
   	<input type="text" name="startBid" placeholder="startBid"><br><br>
   	<input type="datetime-local" name="startDateTime" placeholder="startDateTime"><br><br>
   	<input type="datetime-local" name="endDateTime" placeholder="endDateTime"><br><br>
   	<input type="text" name="artPhoto" placeholder="artPhoto"><br><br>
   	<input type='submit' value="insert data">
   </form>
</fieldset>
