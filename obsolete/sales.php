<?php
    session_start();
    require_once './includes/Dbconnect.inc.php';
    require_once './includes/Sellable.inc.php';
    require_once './includes/Television.inc.php';
    require_once './includes/Authentication.inc.php';
    $dbh = DbH::getDbH();

    $sql = "select inch, stocklevel";
    $sql .= " from tvs";
    $sql .= " order by inch";

    try {
        $rows = $dbh->query($sql);
        foreach ($rows as $row) {
            $tvs[] = new Television($row['inch'], $row['stocklevel']);
        }
    } catch(PDOException $e) {
        printf("<p>%s</p>\n", $e->getMessage());
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Shop Sales Page</title>
        <link rel='stylesheet' href='css/styles.css'/>
    </head>
    <body>
<?php
    include './includes/menu.inc.php';
?>
        <main>
            <form action="myDbMod.php" method="post">
                <table>
                    <caption>Sales</caption>
                    <tr>
                        <td><select name='tvs'>
<?php
    foreach ($tvs as $tv) {
        printf("<option value='%s'>%s inch, in stock: %s</option>\n"
                , $tv->getScreenSize()
                , $tv->getScreenSize()
                , $tv->getStockLevel());
    }
?>
                        </select></td>
                        <td><input type='text' name='tvno'/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Go"/></td>
                    </tr>
                </table>
            </form>
        </main>
<?php
    include './includes/footer.inc.php';
?>
    </body>
</html>
