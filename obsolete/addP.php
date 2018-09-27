<?php
    session_start();
    require_once './includes/Dbconnect.inc.php';
    require_once './includes/Authentication.inc.php';
    $dbh = DbH::getDbH();

    if (!Authentication::isAuthenticated()) {  // am I logged on?
        header("Location: ./index.php"); // if not, go away!
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Shop Add Product</title>
        <link rel='stylesheet' href='css/styles.css'/>
    </head>
    <body>
<?php
    include './includes/menu.inc.php';
?>
        <h2>Add Product</h2>
        <main id="mydiv">
          <form action="./myDbMod1.php" method="post">
            <table id="login">
                <caption>New Television?</caption>
                <tr>
                  <td>Inch:</td><td><input type="text" name="inch"/></td>
                </tr>
                <tr>
                  <td>How many: </td><td><input type="text" name="tvno"/></td>
                </tr>
                <tr>
                  <td></td>
                  <td>
                    <input type="submit" value="OK"/>
                  </td>
                </tr>
            </table>
          </form>
        </main>
<?php
    include './includes/footer.inc.php';
?>
  </body>
</html>
