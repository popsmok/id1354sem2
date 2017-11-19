<head>
<title> login@TR</title>
        <link rel="stylesheet"  type="text/css" href="reset.css">
        <link rel="stylesheet" type="text/css" href="StylesheetTR.css">
</head>
<?php
    session_start(); // Starting Session
    $error=''; // Variable To Store Error Message
    if (isset($_POST['submit'])) 
        {
            if (empty($_POST['username']) || empty($_POST['password'])) 
        {
            $error = "Username or Password is missing";
        }
    else
        {
            // Define $username and $password
            $username=$_POST['username'];
            $password=$_POST['password'];
            // Establishing Connection with Server by passing server_name, user_id and password as a parameter
            $connection = mysqli_connect("localhost", "root", "root");
            // To protect MySQL injection for Security purpose
            $username = stripslashes($username);
            $password = stripslashes($password);
            $username = mysqli_real_escape_string($connection, $username);
            $password = mysqli_real_escape_string($connection, $password);
            // Selecting Database
            $db = mysqli_select_db($connection,"tasty");
            // SQL query to fetch information of registerd users and finds user match.
            $query = mysqli_query($connection, "select * from user where Password='$password' AND Username='$username'");
        
            if ($query->num_rows == 1) 
            {
                $_SESSION['login_user']=$username; // Initializing Session
                header("location: ".$_SESSION['page']); // Redirecting To Other Page
            } 
            else 
        {
                $error = "Username or Password is invalid";
        }
        mysqli_close($connection); // Closing Connection
        }
    }
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
        <h2>login</h2>
        <form action="" method="POST" autocomplete="off">
            <input type="text" name="username" Placeholder="username" Required/>
                <br>
            <input type="password" name="password" Placeholder="password" Required/>
                <br>
            <button name="submit">login</button>
            <span><?php echo $error ?></span>
        </form>
    </div>
</body>
</html>