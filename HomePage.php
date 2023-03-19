<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <title>Online Learn | Home</title>
</head>

<body>
<!-- Navigation bar -->
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
        <h2>Learn Online</h2>
    </div>


    <br>
    <br>


<!-- to centralize the page -->
    <div class="flex-center">
        <div>
            <!-- adding an image and button to redirect the user to the courses page  -->
            <div class="flex-center">
                <a href="courses.php"><img class="founder_img" src="Images/courses.png" alt="courses"></a>
            </div>
            <div class="flex-center">
                <a href="courses.php" class="page-button">Courses</a>
            </div>
        </div>

        <div>
            <!-- adding an image and button to redirect the user to the instructor page  -->
            <div class="flex-center">
                <a href="instructors.php"><img class="founder_img" src="Images/instructor.jpg" alt="instructor"></a>
            </div>
            <div class="flex-center">
                <a href="instructors.php" class="page-button">Instructors</a>
            </div>
        </div>

        <div>
            <!-- adding an image and button to redirect the user to the Contact page  -->
            <div class="flex-center">
                <a href="contact.php"><img class="founder_img" src="Images/my_courses.jpg" alt="my_courses"></a>
            </div>
            <div class="flex-center">
                <a href="contact.php" class="page-button">Contact</a>
            </div>
        </div>
    </div>
    <br><br><br>

    <br>

    <div class="flex-center">


    </div>
</body>

</html>