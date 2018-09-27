<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>JustART</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<?php
    session_start();
    require_once 'includes/Authentication.inc.php';
    require_once 'includes/AuthA.inc.php';
    require_once 'includes/DbConnect.inc.php';
?>


      <div class="wrapper">
<?php
    include './includes/menu.inc.php';
?>

<?php

$arr = array();

	Auction::getAuctions($arr);
  foreach ($arr as $art) {
    print($art);
  }



?>

<?php
    include './includes/footer.inc.php'
?>



        <main>
        </main>

    </body>
</html>
