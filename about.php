<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="styles.css">
    <title>Online Learn | About</title>
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

 <!-- centerlize the image and about information  -->
        <div class="flex-center">
            <h2>About</h2>
        </div>



        <div class="centered">
            <div class="page_text">
<!-- about information -->
                <p>Online learning or distance education environments have been broadened to support learning processes</p>
                <p> in various domains and various levels of knowledge or proficiency.</p>
                <p> One of the themes that has attracted the most attention is how to maximize academic achievement or learning outcomes.</p>
                <p>Empower every student with digital literacy, problem-solving and programming skills </p>
                <p> a comprehensive, customizable, easy to implement Courses.</p>

                <br><br>
            </div>

        </div>
        <div class="centered">
            <h1> Founder of this Site </h1>
            <div>
<!-- image  -->
                <img class="founder_img" src="Images/ziad.jpeg" alt="founder1">
                <br><br>
                <p>Copyright© Ziad Amin - May 2022</p>
                <br>
            </div>
        </div>



</body>

</html>