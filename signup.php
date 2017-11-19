<head>
<title> signup@TR</title>
        <link rel="stylesheet"  type="text/css" href="reset.css">
        <link rel="stylesheet" type="text/css" href="StylesheetTR.css">
</head>
<?php
    session_start(); // Starting Session
    $error=''; // Variable To Store Error Message
    if (isset($_POST['signup'])) 
        {
         if (empty($_POST['username'])||empty($_POST['password'])) 
            {
                $error = "Fill out all textfields";
            }
        else
            {
                // Define in-parametrar
                $username=$_POST['username'];
                // connects to the localhost server.
                $connection = mysqli_connect("localhost", "root", "root");
                // Selecting Database
                $db = mysqli_select_db($connection,"tasty");
                // SQL query to insert information to the right tabel and the right rows.
                $query = mysqli_query($connection, "SELECT username FROM user WHERE username='$username'");
                // Closing Connection
                
                if ($row = $query->fetch_array(MYSQLI_ASSOC)){
                    $error = "username already exist, choose another";
                }
                else{
                    $password=$_POST['password'];
                    mysqli_query($connection, "insert into user(username, password) values('$username','$password')");
                    header("location: ".$_SESSION['page']); // Redirecting To Other last page
                }
            }
        }
            // Closing Connection
            mysqli_close($connection);
?>
<html>
<body>
    <div class="menu">
            <ul>
                <li><a href="index.php"> <img class="icon" src="resources/home2.png" alt="hemikon"><p>HOME</p>
                    </a> </li>
                <li><a href="calendar.php"> 
                    <img class="icon" src="resources/cal2.png" alt="kalenderikon"><p>CALENDAR</p>
                    </a> </li>
                <li><a href="pancakes.php">
                    <img class="icon" src="resources/pancake2.png" alt="pannkaksikon"><p>PANCAKES</p>
                    </a></li>
                <li><a id="active" href="meatballs.php">
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
        <h2>Signup</h2>
        <form action="" method="POST" autocomplete="off">
            <input type="text" name="username" Placeholder="Choose a username" Required/>
                <br><br>
            <input type="password" name="password" Placeholder="Choose a password" Required/>
                <br>
            <button name="signup">signup</button>
            <span><?php echo $error ?></span>
        </form>
    </div>
</body>
</html>