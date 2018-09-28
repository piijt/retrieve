<?php
  include 'includes/header.inc.php';
?>
        <header>
                <body>
        <div class="nav">
           <div class="nav-row">
               <div class="logo"><a href="index.php"><img src="img/logo.png" alt="" class="logo-img"></a></div>
               <div class="join"><h4><a href="#" style="color:white;">Bliv kunstner</a></h4></div>
               <div class="my-page"><div class="login">
           <form action="">
               <input type="text" placeholder="Brugernavn">
               <br><br>
               <input type="text" placeholder="Password">
           </form>
              <a href="thepage.php"><button class="loginbtn">Log-In</button></a>
           </div></div>
           </div>
           <div class="nav-row">
               <div class="front-page"><h4><a href="index.php">Forside</a></h4></div>
               <div class="artist"><h4><a href="artist.php">Kunstnere</a></h4></div>
               <div class="rights"><h4><a href="#">Handelsbetingelser</a></h4></div>
           </div>
       </div>
<?php
                // if (!Authentication::isAuthenticated()) {
                //     printf("%16s<li><a href='testLogin.php'>
                //                         Login</a></li>\n", " ");
                // } else {
                //     printf("%16s<li><a href='testLogout.php'>
                //                         Logout</a></li>\n", " ");
                // }
?>


<?php
                // if (Authentication::isAuthenticated()) {
                //     printf("<div>Welcome %s</div>",
                //             Authentication::getDispvar());
                // }
?>
        </header>
