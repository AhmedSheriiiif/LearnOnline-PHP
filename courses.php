<?php
// Connect to Database
$hostname = "localhost";
$user = "root";
$pass = "";
$dbname = "learnonline";
// it connects the courses page to the database through localhost and the root and databasename 
$dbc = mysqli_connect($hostname, $user, $pass, $dbname) or die('could not connect to database');
mysqli_set_charset($dbc, "utf8");


// Selecting all Categories 
// select different catogries from datbase in the courses table
$query = mysqli_query($dbc, "select DISTINCT Category from courses");
// creating array to store catogries inside of it 
$crategories = array();
// putting catogries inside of the array
while ($category_row = mysqli_fetch_assoc($query)) {
    $categories[] = $category_row;
}
?>



<!DOCTYPE html>
<html lang='en'>


<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='styles.css'>
    <title>Online Learn | All Courses</title>
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


<!-- flex center to make content on the center of the page and next to each other -->
    <div class='flex-center'>
        <h2>Courses</h2>
    </div>


<!-- flex center to make content on the center of the page and next to each other -->
    <div class='flex-center'>
        <?php
// for each catogry
        foreach ($categories as $categ) {
            $category = $categ['Category'];
// make title bar to put courses below it
// page butoon class for making the blue bar
            echo "
        <div style='width: 22%'>
            <div class='flex-center'>
                <p class='page-button'>$category</p>
            </div>";
// select all courses that realtes to the catogry that we are working on
            $query = mysqli_query($dbc, "SELECT * FROM courses WHERE Category = '$category'");
            // putiing the courses in the array
            $courses = array();
            while ($course_row = mysqli_fetch_assoc($query))
                $courses[] = $course_row;
// on each course we get the name, describition , and id of the course 
            foreach ($courses as $course) {
                $name = $course['Name'];
                $desc = $course['Description'];
                $id = $course['ID'];


// desgin the card box of each course
// we created a form to go to the course page when we click on more deatalis at the card box
// when we click on the submit button (more details) , it send the id of the course to course_1.php to load the course page 
                echo "
                <form action='course_1.php' method='post'> 
             <div class='card-box'>
            
                <h2>$name</h2>
                <p>$desc </p>
                <input type='text' name='course_id'  value='$id' style='display:none'>
                <input type='submit' value='More Details' name='open_course'>
                </form>
            </div>";
            }
            echo "</div> ";
        }

        ?>

    </div>

</body>

</html>