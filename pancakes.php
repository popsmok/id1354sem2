<?php
    session_start();
    $_SESSION['page']="pancakes.php";
?>

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Adam Rosell">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
    
        <title> Pancakes@TR</title>
        <link rel="stylesheet"  type="text/css" href="reset.css">
        <link rel="stylesheet" type="text/css" href="StylesheetTR.css">
    </head>
    
    <body>
        <div class="menu">
            <ul>
                <li><a href="index.php"> <img class="icon" src="resources/home2.png" alt="hemikon"><p>HOME</p>
                    </a> </li>
                <li><a href="calendar.php"> 
                    <img class="icon" src="resources/cal2.png" alt="kalenderikon"><p>CALENDAR</p>
                    </a> </li>
                <li><a id="active" href="pancakes.php">
                    <img class="icon" src="resources/pancake2.png" alt="pannkaksikon"><p>PANCAKES</p>
                    </a></li>
                <li><a href="meatballs.php">
                    <img class="icon" src="resources/balls2.png" alt="köttbulleikon"><p>MEATBALLS</p>
                    </a></li>
               <?php
                    if(isset($_SESSION['login_user']))
                        echo '<li><a href="logout.php">
                    <img class="icon" src="resources/logout.png" alt="logoutikon"><p>Logout</p>
                    </a></li>';
                    else {
                        echo '<li><a href="login.php">
                    <img class="icon" src="resources/login.png" alt="loginikon"><p>login</p>
                    </a></li>';
                        echo '<li><a href="signup.php">
                    <img class="icon" src="resources/signup.png" alt="signupikon"><p>signup</p>
                    </a></li>';
                    }
                ?>
            </ul>
        </div>
<div class="body">
    <h1>
        Tasty Recipes
    </h1>
    <img class="recept" src="resources/pannkakor43.jpg" alt="bild pannkakor">
        <h2>
            Pancakes
        </h2>
<br>        
    <div class="ingred">
        <ul>
            <li> Ingrediens for 4 portions</li>
            <li> 4 eggs </li>
            <li> 4 dl flour </li>
            <li> 8 dl milk </li>
            <li> A dash of salt </li>
        </ul>
    </div>
<br>
    <div class="howto">
        <ol>
            <li> Mix all of the ingrediens in a bowl</li>
            <li> Fry 1 dl of the batter at the time </li>
            <li> Serve pancakes with homemade strawberry jam, whipped cream and ice cream</li>
        </ol>
    </div>
        <h2>Comments</h2>
            <?php
                    include ('readComment.php');
                if(isset($_SESSION['login_user']))
                    include ('writeComment.php');
            ?>
</div>
    </body>
    