<?php
    require_once 'includes/DbConnect.inc.php';
    $dbh = DbH::getDbH();

    foreach($_POST as $key => $value) {
        $$key = trim($value);  // vars with names as in form
    }

    $sql = 'insert into user (firstname, lastname, uid, email, password)';
    $sql .= ' values(:fname, :lname, :uid, :mail, :pwd);';
    try {
      $q = $dbh->prepare($sql);
      $q->bindValue(':fname', $fname);
      $q->bindValue(':lname', $lname);
      $q->bindValue(':uid', $uid);
      $q->bindValue(':mail', $email);
      $q->bindValue(':pwd', password_hash($pwd1, PASSWORD_DEFAULT));
      $q->execute();
    } catch(PDOException $e) {
      die("Posting failed. Call a friend.<br/>".$e->getMessage());
    }
    header('Location: ./index.php?userinserted');
