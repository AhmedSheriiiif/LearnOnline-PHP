<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <title>Online Learn | Contact</title>
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
        session_start();
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


        <div class="flex-center">
            <h2>Contact Us</h2>
        </div>

<!-- for email to open the email program , and inside of it the email written-->
        <div class="centered">
            <a href="mailto:za00056@tkh.edu.eg"><img class="scaleup" src="Images/email_icon.png" alt="mail">
                <p>Email</p>
            </a>
            <br>
<!-- the fax image -->
            <a href="#"> <img class="scaleup" src="Images/fax_icon.png" alt="fax">
                <p>Fax</p>
            </a>
            <br>
<!-- address  image-->
            <a href="#"> <img class="scaleup" src="Images/address_icon.png" alt="address">
                <p>Address</p>
            </a>
            <br>
<!-- hotline -->
            <a href="#"><img class="scaleup" src="Images/hotline_icon.png" alt="hotline">
                <p>Hotline</p>
            </a>
        </div>
    
</body>

</html>