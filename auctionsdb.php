<?php
    if (!(
          (isset($_POST['color']) && $_POST['color'] != '')
            && (isset($_POST['dimples']) && $_POST['dimples'] != '')
            && (isset($_FILES['img']) && $_FILES['img']['size'] > 0)
        )) {
        header("Location: ./myform.php?x=1");
    }

    require_once './includes/Dbconnect.inc.php';
    $dbh = DbH::getDbH();

    foreach($_POST as $key => $value) {
        $$key = trim($value);  // vars with names as in form
    }
    $gb = new GolfBall();
    $gb->setColor($color);
    $gb->setDimples($dimples);
    $gb->addStock(100);

    // Temporary file name stored on the server
    // Read in one gulp and addslashes
    $image = addslashes(file_get_contents($_FILES['img']['tmp_name']));
    $imagetype = $_FILES['img']['type'];

    $sql = 'start transaction;';
    $dbh->query($sql);

    $sql = 'insert into golfballs values(:color, :number, :dimples);';
    try {
      $q = $dbh->prepare($sql);
      $q->bindValue(':number', $gb->getStockLevel());
      $q->bindValue(':color', $gb->getColor());
      $q->bindValue(':dimples', $gb->getDimples());
      $q->execute();
    } catch(PDOException $e) {
      die("Posting failed. Call a friend GB.<br/>".$e->getMessage());
    }

    $sql = 'insert into image values(::mimetype, :imageitself);';
    try {
      $q = $dbh->prepare($sql);
      $q->bindValue(':color', $gb->getColor());
      $q->bindValue(':dimples', $gb->getDimples());
      $q->bindValue(':mimetype', $imagetype);
      $q->bindValue(':imageitself', $image);
      $q->execute();
    } catch (Exception $e) {
      die("Posting failed. Call a friend IMG.<br/>".$e->getMessage());
    }
    $sql = 'commit;';
    $dbh->query($sql);
    header('Location: ./myformim.php?inserted');
