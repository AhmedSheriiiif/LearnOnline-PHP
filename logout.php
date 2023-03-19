<?php 
session_start();
session_unset();
session_destroy();
echo "<script> alert('Thank you for using the website');
            window.location.href = 'homepage.php';
        </script>";

?>