<?php
// Connecting to db
$hostname = "localhost";
$user = "root";
$pass = "";
$dbname = "learnonline";

$dbc = mysqli_connect($hostname, $user, $pass, $dbname) or die('could not connect to database');
mysqli_set_charset($dbc, "utf8");
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <title>Online Learn | My Courses</title>
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
        <h2>My Courses</h2>
    </div>
<!-- making a table to add the details of each course that the user enrolled in -->
    <div class="flex-center">
        <table>
            <tr>
                <th>Course Name</th>
                <th>Description</th>
                <th>Category</th>
                <th>Date of Enrollement</th>
                <th>Open Course </th>
        
            </tr>

            <?php
            // extracting the courses from the enrollments table in the database for a specific user
                $username = $_SESSION['username'];
                $query = mysqli_query($dbc, "SELECT * FROM enrollments where Username = '$username'");
                $results = array();

                while ($result_row = mysqli_fetch_assoc($query))
                    $results[] = $result_row;
                // FOR EACH COURSE, we extract the details of each course from the courses table from the database
                foreach ($results as $result) {
                    $id = $result['EnrolledCourses'];
                    $date = $result['DateOfEnroll'];
                    
                    $query2 = mysqli_query($dbc,"SELECT * from courses where ID = '$id'");
                    $result = mysqli_fetch_row($query2);
                    $course_name = $result[1];
                    $course_desc = $result[2];
                    $categ = $result[3];

                //adding the course details that we extracted to the table
                // we make button in the last column in the table to open the course details 
                    echo "
            <tr>
            <td><b>$course_name</b></td>
            <td> $course_desc</td>
            <td> $categ</td>
            <td>$date</td>
            <td> 
            <form action='course_1.php' method='post'> 
                <input type='text' name='course_id'  value='$id' style='display:none'>
                <input type='submit' value='Open Course' name='open_course'>
            </form>
            </td>
            
            </tr>";
                }
            
            ?>





        </table>
    </div>
</body>

</html>