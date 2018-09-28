
<!-- connecting database into insert.php file data-->
<?php
try {
  $pdo = new PDO('mysql:dbname=auctions; host=localhost' , 'root' , '');
} catch (PDOException $e) {
  die('not connected with database');
}

if(isset($_POST['nameOfArtist'],$_POST['ageOfArtist'],$_POST['artistDescription'],$_POST['artistPhoto']))
  {
    $nameOfArtist=$_POST['nameOfArtist'];
    $ageOfArtist=$_POST['ageOfArtist'];
    $artistDescription=$_POST['artistDescription'];
    $artistPhoto=$_POST['artistPhoto'];

    // INSERT QUERY
    $mysql="INSERT INTO auctions (nameOfArtist , ageOfArtist , artistDescription ,
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

<!-- html form -->
<fieldset>
<legend>Opret Kunstner</legend>
<form action="thepage.php" method="POST">
  <input type="text" name="nameOfArtist" placeholder="Navn"><br><br>
  <input type="text" name="ageOfArtist" placeholder="Alder"><br><br>
  <input type="text" name="artistDescription" placeholder="Beskrivelse"><br><br>
  <input type="text" name="artistPhoto" placeholder="Billede"><br><br>
  <input type="submit" name="" value="Opret Kunstner">
</form>
</fieldset>
