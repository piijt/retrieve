<?php
session_start();
require_once 'includes/DbConnect.inc.php';
$Dbh = new Dbh();
$db = $Dbh->connect();

    foreach($_GET as $key => $value) {
        $$key = trim($value);  // vars with names as in form
    }
    if(isset($id)) {
            $sql  = "select artPhoto";
            $sql .= " from auction";
            $sql .= " where auctionID = :id";
        try {
            $q = $dbh->prepare($sql);
            $q->bindValue(':id', $id);
            $q->execute();
            $out = $q->fetch();
        } catch(PDOException $e)  {
            printf("Error getting image.<br/>". $e->getMessage(). '<br/>' . $sql);
            die('');
        }

        $out['artPhto'] = stripslashes($out['artPhoto']);
        header("Content-type: image/jpeg");
        echo $out['artPhoto'];
    } else {
        echo 'X';
    }
