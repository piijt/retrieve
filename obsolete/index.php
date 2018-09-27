<?php
    session_start();
    require_once 'includes/Authentication.inc.php';
    require_once 'includes/AuthA.inc.php';
    require_once 'includes/DbConnect.inc.php';
    $lo = isset($_GET['lo']) ? $_GET['lo'] : 'U';
    $hi = isset($_GET['hi']) ? $_GET['hi'] : 'V';
    $auctions = array();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title;?></title>
    </head>
    <body>
<?php
    printf("        <h1>%s</h1>\n", $title);

    $sql = "select auctionID, nameOfArt, artCategory,
    artDescription, nameOfArtist, artPhoto, startBid,
    startDateTime, endDateTime"
    try {
        $q = $dbh->prepare($sql);
        $q->bindValue(':lo', $lo);
        $q->bindValue(':hi', $hi);
        $q->execute();
        while ($row = $q->fetch()) {
            $c = new Auction($row['auctionID'],
                             $row['nameOfArt'],
                             $row['artCategory'],
                             $row['artDescription'],
                             $row['nameOfArtist'],
                             $row['artPhoto'],
                             $row['startBid'],
                             $row['startDateTime'],
                             $row['endDateTime'],
                    // '','', new City($row['id'],
                    //                 $row['capname'],
                    //                 $row['code'],
                    //                 '', $row['cappop']));
            $auctions[] = $c;
        }
    } catch(PDOException $e) {
        printf("<p>%s</p>\n", $e->getMessage());
    }

    if (count($countries) > 0) {
        print("        <div>\n");
        foreach ($countries as $country) {
            printf($country);
        print("        </div>\n");
        }
    } else {
        print("        <p>no auctions</p>\n");
    }
?>
    </body>
</html>
