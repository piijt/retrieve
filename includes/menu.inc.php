<?php
?>
        <header>
            <h1>Shop Front Page</h1>
            <ul id='menu'>
                <li><a href="index.php">Home</a></li>
                <li><a href="sales.php">Sales</a></li>
                <li><a href="addP.php">Add Product, adm</a></li>
                <li><a href="restock.php">Restock, adm</a></li>
                <li><a href="deleteP.php">Delete Product, adm</a></li>
<?php
                if (!Authentication::isAuthenticated()) {
                    printf("%16s<li><a href='registerNewUser.php'>
                                        Become a User</a></li>\n", " ");
                    printf("%16s<li><a href='testLogin.php'>
                                        Login</a></li>\n", " ");
                } else {
                    printf("%16s<li><a href='testLogout.php'>
                                        Logout</a></li>\n", " ");
                }
?>
            </ul>
<?php
                if (Authentication::isAuthenticated()) {
                    printf("<div>Welcome %s</div>",
                            Authentication::getDispvar());
                }
?>
        </header>
