<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <title>Online Learn | Register</title>
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
<!-- to centralize the register form  -->
    <div class="flex-center">
        <h2> Register Form </h2>
    </div>
<!-- Registration form -->
<!-- send data to server.php  -->
    <div >
        <form action="server.php" method="post" id="SignUpForm">
            <p>Username <input type="text" name="username" placeholder="type your username" required> * </p>
            <p>First Name <input type="text" name="fname" placeholder="type your first name" required> * </p>
            <p>Last Name <input type="text" name="lname" placeholder="type your last name" required> * </p>
            <p>Password <input type="password" name="password" placeholder="type your password" required> * </p>
            <p>Email <input type="email" name="email" placeholder="type your email" required> *</p>
            <p>Age <input type="number" name="age" placeholder="age" required> * </p>
            <p>Gender
                <select name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select> </p>
            <input type="submit" name="register_user" value="Register">
            <input type="reset" name="reset" value="Reset">
        </form>
    </div>

    <br><br>
    <div class="flex-center">
        <p>Already have an account? <a href="login.html" Login> Login</a></p>
    </div>
</body>

</html>