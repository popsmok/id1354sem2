<?php
    session_start();
    $_SESSION['page']="calendar.php";
?>

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Adam Rosell">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
    
        <title> Calendar@TR</title>
        <link rel="stylesheet"  type="text/css" href="reset.css">
        <link rel="stylesheet" type="text/css" href="StylesheetTR.css">
    </head>
    
    <body>
        <div class="menu">
            <ul>
                <li><a href="index.php"> <img class="icon" src="resources/home2.png" alt="hemikon"><p>HOME</p>
                    </a> </li>
                <li><a id="active" href="calendar.php"> 
                    <img class="icon" src="resources/cal2.png" alt="kalenderikon"><p>CALENDAR</p>
                    </a> </li>
                <li><a href="pancakes.php">
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
            <h1>Tasty recipes</h1>
            <br>
            <div class="calendar">
            <table>
                <tr>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednsday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                    <th>Saturday</th>
                    <th class="right">Sunday</th>
                </tr>
                <tr>
                        <td></td>
                        <td></td>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                    <td class="linked pancake"><a href="pancakes.php"><p>5</p></a></td>
                </tr>
                <tr>
                        <td>6 </td>
                        <td>7</td>
                        <td class="active">8</td>
                        <td>9</td>
                        <td>10</td>
                        <td>11</td>
                        <td>12</td>
                </tr>
                <tr>
                        <td>13</td>
                        <td>14</td>
                        <td>15</td>
                        <td>16</td>
                        <td>17</td>
                        <td>18</td>
                        <td>19</td>
                </tr>
                <tr>
                        <td class="linked meatballs"><a href="meatballs.php"><p>20</p></a></td>
                        <td>21</td>
                        <td>22</td>
                        <td>23</td>
                        <td>24</td>
                        <td>25</td>
                        <td>26</td>
                </tr>
                <tr>
                        <td>27</td>
                        <td>28</td>
                        <td>29</td>
                        <td>30</td>
                        <td>31</td>
                        <td></td>
                        <td></td>
                </tr>
            </table>
        </div>
        </div>
    </body>

</html>