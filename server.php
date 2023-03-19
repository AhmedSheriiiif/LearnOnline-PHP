<?php
// Database Variables
$hostname = "localhost";
$user = "root";
$pass = "";
$dbname = "learnonline";

// Database Connection
$dbc = mysqli_connect($hostname, $user, $pass, $dbname) or die('could not connect to database');
mysqli_set_charset($dbc, "utf8");

session_start();


//REGISTERING
// when the sign up buttom is clicked, extracting the data from the signup page 
if (isset($_POST['register_user'])) {
    $username = $_POST['username'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];

// then will check if the username is already exist from by seraching on the username inside of the database 
    $SQL = "SELECT username from users where username = '$username'";
    $result = mysqli_query($dbc, $SQL);
    $userr = mysqli_fetch_row($result);
// if username exist indside of the database, the page will send alert saying that the user already exist
    if ($userr) {
        echo "<script> alert('user exists');
            window.location.href = 'register.php';
        </script>";
    }
    // if there is no username, he/she will be registered inside the database
     else
     {
         // by inserting the data insdide the users table in the database
         // this method to prvernt sql injection in sgin UP page 
         //by making sure that the written data are all string
         // so the user can't insert (Drop table) as an injection and destroy our database 
        $SQL = "INSERT INTO users (Username,FName,LName,Age,Gender,Email,Password) VALUES(?, ?, ?, ?, ?, ?, ?)";
    $stmt = $dbc->prepare($SQL);
    $stmt->bind_param("sssssss", $username, $fname, $lname, $age, $gender, $email, $password);
    $stmt->execute();

    // if user registered, the page will send a message with registered succussfully and will reture the user to the home page 
        echo "<script> alert('Registered Successfully');
    window.location.href = 'HomePage.php';
</script>";
    }
}

// when the user press login button inside of the login page 
if (isset($_POST['login_user'])) {
// the server.php will get username and password from the loginpage 
    $username = $_POST['username'];
    $password = $_POST['password'];

// seraching in users table in database for any user with same username and password that we got from the login page 
    $query1 = "SELECT username from users where username = '$username' and password = '$password' ";
    $results = mysqli_query($dbc, $query1);
    $userr = mysqli_fetch_row($results);
    // if found these data 
    if ($userr) {
        // setting the logged in session and username 
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
// send alert to welcome the user
        echo "<script> alert('Welcome $username  !!');
            window.location.href = 'HomePage.php';
        </script>";
        // if not found
        // alert the user with invalid username and password
    } else {
        echo "<script> alert('Invalid username or password');
    window.location.href = 'login.html';
</script>";
    }
}

//Updating Profile
// when the button of save changes is clicked , getting data from the form indside profile page  
if (isset($_POST['change_profile'])) {

    $username = $_SESSION['username'];
    $password = $_POST['profile_password'];
    $fname = $_POST['profile_fname'];
    $lname = $_POST['profile_lname'];
    $email = $_POST['profile_email'];


    // then update the data with some changes inside of the database 
    $query = "UPDATE users 
    SET Email = '$email', Fname = '$fname', Lname='$lname', Password='$password'
    WHERE Username = '$username'";
    $results = mysqli_query($dbc, $query);

    // making script to alert that the database updated succesfully and open the profile page agian
    echo "<script> alert('Profile Updated');
            window.location.href = 'my_profile.php';
        </script>";
}


//Enroll in Course
// when the button of enrollment is pressed in course1.php page
// the server will takes the user id and the course id and add them to the enrollment table in the database
if (isset($_POST['enroll_course'])) {

    $username = $_SESSION['username'];
    $course_id = $_POST['course_id'];
    $date = date("Y/m/d");

    $query = "INSERT INTO enrollments(Username, EnrolledCourses, DateOfEnroll)
    VALUES ('$username', '$course_id', '$date')";

    $results = mysqli_query($dbc, $query);
// alert the user that the course is added sucssufully 
    echo "<script> alert('Course Added Successfully');
            window.location.href = 'courses.php';
        </script>";
}
