<?php
    session_start();
    $_SESSION['page']="index.php";
?>

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Adam Rosell">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">

        <title>Tasty Recipes</title>
        <link rel="stylesheet"  type="text/css" href="reset.css">
        <link rel="stylesheet" type="text/css" href="StylesheetTR.css">
    </head>
    
    <body>
    
    <div class="menu">
            <ul>
                <li><a id="active" href="index.php"> <img   class="icon" src="resources/home2.png" alt="Homeicon"><p>HOME</p>
                    </a> </li>
                <li><a href="calendar.php"> 
                    <img class="icon" src="resources/cal2.png" alt="Calendaricon"><p>CALENDAR</p>
                    </a> </li>
                <li><a href="pancakes.php">
                    <img class="icon" src="resources/pancake2.png" alt="Pancakesicon"><p>PANCAKES</p>
                    </a></li>
                <li><a href="meatballs.php">
                    <img class="icon" src="resources/balls2.png" alt="Meatballsicon"><p>MEATBALLS</p>
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
    <h1>Tasty recipes</h1>
    <br>
    <h2> Welcome </h2>
        <p> We have easy and fast everyday-meals</p>
        <p> For families in a rush,</p>
        <p> poor students,</p>
        <p> or even businessmen lacking inspiration!</p>
    <br>
</div>
</body>