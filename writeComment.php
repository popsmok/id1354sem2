<?php
    session_start(); // Starting Session
    $error=''; // Variable To Store Error Message
    if (isset($_POST['submit'])) 
        {
         if (empty($_POST['comment'])) 
            {
                $error = "write a comment first!";
            }
        else
            {
                // Define in-parametrar
                $comment=$_POST['comment'];
                $user=$_SESSION['login_user'];
                $page=$_SESSION['page'];
                // connects to the localhost server.
                $connection = mysqli_connect("localhost", "root", "root");
                // Selecting Database
                $db = mysqli_select_db($connection,"tasty");
                // SQL query to insert information to the right tabel and the right rows.
                $query = mysqli_query($connection, "insert into comment(comment, user, page) values('$comment','$user','$page')");
                // Closing Connection
                mysqli_close($connection);
                header("location: ".$_SESSION['page']);
            }
        }
?>
<form action="" method="POST" autocomplete="off">
        <br>
    <input type="text" name="comment" Placeholder="write your comment here" Required/>
        <br>    
    <button name="submit">comment</button>
    <span><?php echo $error ?></span>
</form>