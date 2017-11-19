<?php
    session_start();
    $page=$_SESSION['page'];

        $connection = mysqli_connect("localhost", "root", "root");
        // Connects to sql server localhost, databas "tasty".
        $db = mysqli_select_db($connection,"tasty");
        // SQL query to fetch information of registerd users and finds user match.
        $query = mysqli_query($connection, "select * from comment WHERE page='$page' ");

while ($row = $query->fetch_array(MYSQLI_ASSOC))
    {
    $timestamp = $row['timestamp'];
    $comment = $row['comment'];
    $user = $row['user'];
        if(!isset($_SESSION['login_user'])){ //true om ingen är inloggad
            echo '<p class="p2">' . $comment . '</p><br><p class="p3">' . $user . ' ' . $timestamp .'</P><br>';
        }
        elseif($_SESSION['login_user'] == $user){ // true för den inloggades komentarer
            echo '<p class="p2">' . $comment . '</p><br><p class="p3">' . $user . ' ' . $timestamp .'</p> 
                    <form action="" method="POST"> 
                        <input name="time" type="hidden" value="' . $timestamp . '">
                        <button name="delete">delete</button>
                    </form>
<br>';
        }
        else{ // om inloggad inte samma som $user
            echo '<p class="p2">' . $comment . '</p><br><p class="p3">' . $user . ' ' . $timestamp .'</p><br>';
        }
    }

if(isset($_POST['delete']))
{
    $timestamp = $_POST['time'];
    mysqli_query($connection, "delete FROM comment WHERE timestamp= '$timestamp'");
    mysqli_close($connection);
    header("location: ".$_SESSION['page']);
                 
}
// Closing Connection
mysqli_close($connection);
?>