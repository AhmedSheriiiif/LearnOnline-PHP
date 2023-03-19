<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <title>Online Learn | Instructors</title>
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
        <h2>Instructors</h2>
    </div>


    <br>
    <br>
    <br>

<!-- FlexCenter : To make the content centralized and next to each other -->
    <div class="flex-center">
        <!-- Start of instructors -->
        <?php
        // Connecting to db
        $hostname = "localhost";
        $user = "root";
        $pass = "";
        $dbname = "learnonline";

        $dbc = mysqli_connect($hostname, $user, $pass, $dbname) or die('could not connect to database');
        mysqli_set_charset($dbc, "utf8");


        // Selecting all instructors from the database and put them insdie of array
        $query = mysqli_query($dbc, "SELECT * FROM instructors");
        $instructors = array();
        while ($instructor_row = mysqli_fetch_assoc($query))
            $instructors[] = $instructor_row;

        // for each instructror get the name, title, image and nationality of the instructor 
        foreach ($instructors as $instructor) {
            $name = $instructor['Name'];
            $title = $instructor['Title'];
            $profile_img = $instructor['Profile_Img'];
            $nationality = $instructor['Nationality'];
            // makeing each insturcor inside of card box and shaping them in structured format by putting their name and nationlaity
            // and adding thier image below 
            // then adding their title
            echo "
            <div class='card-box'>
            <p>$name | $nationality</p>
            <img src='$profile_img' class='founder_img'>
            <p>$title</p>
        </div>
            ";
        }

        ?>


    </div>
    <br><br>
</body>

</html>