<?php
// Database Variables
$hostname = "localhost";
$user = "root";
$pass = "";
$dbname = "learnonline";

// Database Connection
$dbc = mysqli_connect($hostname, $user, $pass, $dbname) or die('could not connect to database');
mysqli_set_charset($dbc, "utf8");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <title>Online Learn | Course</title>
</head>

<body>
<!-- Navigaation Bar -->
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
    
    <?php
// in my courses and the main courses page and also the search page , when i click on more details
    if (isset($_POST['open_course'])) {
// grab the specific id and get the course from the database
        $id = $_POST['course_id'];
        $query = mysqli_query($dbc, "SELECT * FROM courses where ID = $id");
        $course = mysqli_fetch_row($query);
        // get the data of the course
        $name = $course[1];
        $desc = $course[2];
        $categ = $course[3];
        $duration = $course[4];
        $price = $course[5];
        $video = $course[6];
        $inst_id = $course[7];
        // get the deatails of the instructor of the course
        $query2 = mysqli_query($dbc, "SELECT * FROM instructors where ID = $inst_id");
        $instructor = mysqli_fetch_row($query2);
        $ins_name = $instructor[1];
        $ins_title = $instructor[2];
        $ins_nation = $instructor[3];
        $ins_img = $instructor[4];

// centeralize the page
// structure of the page
// adding the name and the describition below of it
        echo
        "<div class='flex-center'>
        <h2>$name</h2>
        </div>";

        echo
        "<div style='text-align:center;'>
        <p>$desc</p>
        </div>";

// then putting the introducton video of the course  
        echo
        "<div class='flex-center'>
                <iframe width='1046' height='448' src='$video' frameborder='0' allow='accelerometer'; encrypted-media; gyroscope;></iframe>
        </div>";
// makeing  a card box to the courses information (Catgory, duration, and price)
        echo
        "<div class='flex-center'>

        <div class='card-box thirty_width' >
            <p class='page-button'>Course Information</p>
            <h3> Category: $categ </h3>
            <h3> Duration: $duration Hrs </h3>
            <h3> Price: $price EGP </h3>
            <br><br><br><br>";
// if the user loggedin
        if (isset($_SESSION['loggedin'])) {
            $username = $_SESSION['username'];
            // check if the user is enrolled or not
            $sql = mysqli_query($dbc, "SELECT * FROM enrollments where Username='$username' and EnrolledCourses='$id'");
            $result = mysqli_fetch_row($sql);
            // if enrolled, type already enrolled on the carbox
            if ($result) {
                echo"<input type='submit' value='Alread Enrolled' class='enrol-button' name='enroll_course'>";
            } else {
                // if not enrolled adding the button to enroll the course 
                // the butoon is added in a form to send the details of the course and the user to the server.php
                // the server.php will add the course and the user to enrollment table
                echo "
                    <form action='server.php' method='post'>
                <input type='text' value='$id' name='course_id' style='display:none;'>
                <input type='submit' value='Enroll in this Course' class='enrol-button' name='enroll_course'>
                </form>";
            }
        }
// card box for the instructor information
        echo "
        </div>

        <div class='card-box thirty_width'>
            <p class='page-button'>Instructor</p>
            <img class='founder_img' src='$ins_img'>
            <p>$ins_name | $ins_nation</p>
            <p>$ins_title</p>
        </div>
        </div>";
    } ?>




</body>

</html>