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
    <title>Online Learn | Search Results</title>
</head>

<body>
<!-- Navigation Bar  -->
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
        <h2>Search Results</h2>
    </div>
<!-- making a table to add the course details on it -->
    <div class="flex-center">
        <table>
            <tr>
                <th>Course Name</th>
                <th>Description</th>
                <th>Category</th>
                <th>Details</th>

            </tr>
<!-- getting the courses from the courses table in the databaee -->
<!-- we will search on the courses by using like %search_word% to filter a specific query  -->
            <?php
            // when the user press on the serach button in the Navigation bar 
            // we get the courses and add them into array
            if (isset($_POST['Search'])) {
                $search_text = $_POST['search_text'];
                $query = mysqli_query($dbc, "SELECT * FROM courses where Name like '%$search_text%' OR Description like '%$search_text%'");
                $results = array();

                while ($result_row = mysqli_fetch_assoc($query))
                    $results[] = $result_row;
                // for each course, we extract its information 
                foreach ($results as $result) {
                    $name = $result['Name'];
                    $desc = $result['Description'];
                    $categ = $result['Category'];
                    $id = $result['ID'];
                    // adding this information to a table 
                    // the last column conatins a button to open the course details by sending the id of the course to course_!.php
                    echo "
            <tr>
            <td><b>$name</b></td>
            <td> $desc</td>
            <td> $categ</td>
            <td> 
            <form action='course_1.php' method='post'> 
                <input type='text' name='course_id'  value='$id' style='display:none'>
                <input type='submit' value='More Details' name='open_course'>
            </form>
            </td>
            </tr>";
                }
            }
            ?>





        </table>
    </div>
</body>

</html>