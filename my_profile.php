<?php
// to solve some prblems happend in the php (Variables with empty values) puuting null values as default
$email = "";
$password = "";
$fname = "";
$lname = "";
$age = "";
$gender = "";
$username = "";

// started the session 
session_start();
// will check if the user logged in or not and check the username 
if (isset($_SESSION['loggedin']) && isset($_SESSION['username'])) {
    // Database Variables
    $hostname = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "learnonline";

    // Database Connection
    $dbc = mysqli_connect($hostname, $user, $pass, $dbname) or die('could not connect to database');
    mysqli_set_charset($dbc, "utf8");

    $username = $_SESSION['username'];


// getting data of the user from the database who loggein before
    $query = "SELECT * from users where Username = '$username'";
    $sql = mysqli_query($dbc, $query);
    $result = mysqli_fetch_row($sql);
// getiing user information from the result of the query 
    $email = $result[1];
    $password = $result[2];
    $fname = $result[3];
    $lname = $result[4];
    $age = $result[5];
    $gender = $result[6];
}


?>


<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <title> Online Learn | My Profile</title>
</head>

<body>
    <!-- Navigation Bar -->
<nav class="bar">
        <a href="HomePage.php" class="button bar-item">Home</a>
        <a href="about.php" class="button bar-item">About</a>
        <a href="contact.php" class="button bar-item">Contact</a>
        <a href="courses.php" class="button bar-item">Courses</a>
        <a href="instructors.php" class="button bar-item">Instructors</a>


        <?php
        if (isset($_SESSION['loggedin'])) {
            echo '<a href="my_courses.php" class="button bar-item">My Courses</a>';
            echo '<a href="logout.php" class="button bar-item-right">Logout</a>';
            echo '<a href="my_profile.php" class="button bar-item-right">My Profile</a>';

        } else {

            echo '<a href="Login.php" class="button bar-item-right">LOG IN</a>
            <a href="register.php" class="button bar-item-right">SIGN UP</a>';
        }
        ?>

        <form class="bar-item-right" method="post" action="search.php">
            <input type="text" size="50px" placeholder="Search" name="search_text">
            <input type="submit" value="Search" name="Search">
        </form>

    </nav>

    <br>
    <p>Change your profile</p>

    <!-- making a form to send the data from this page to the  server.php -->
    <form action='server.php' method="post">
<!-- to centralize the table of the page  -->
        <div class="flex-center">
            <table>
                <tr>
                    <td><b>Username</b></td>
                    <?php
                    // putting the username in input to be send to server.php (profile username)
                    // disabled so userr can't edit it 
                    echo "<td> <input type='text' name='profile_username' value=$username disabled></td>";
                    ?>
                </tr>
                <tr>
                    <td><b>Password</b></td>
                    <?php
                    // putting the Pssword in input to be send to server.php (profile password)
                    echo "<td> <input type='password' name='profile_password' value=$password></td>";
                    ?>
                </tr>
                <tr>
                    <td><b>Email</b></td>
                    <?php
                    // putting the Emali in input to be send to server.php (profile Email)
                    echo "<td> <input type='email' name='profile_email' value=$email></td>";
                    ?>
                </tr>
                <tr>
                    <td><b>First Name</b></td>
                    <?php
                    // putting the firstname in input to be send to server.php (profile fname)
                    echo "<td> <input type='text' name='profile_fname' value=$fname></td>";
                    ?>
                </tr>
                <tr>
                    <td><b>Last Name</b></td>
                    <?php
                    // putting the lastname in input to be send to server.php (profile Lname)
                    echo "<td> <input type='text' name='profile_lname' value=$lname></td>";
                    ?>
                </tr>
            </table>
        </div>

        <br><br>
        <!-- this sumbit button (save changes) send the data to the server.php -->
        <input type="submit" value="Save Changes" style="float:right;" name='change_profile'>
    </form>
</body>

</html>