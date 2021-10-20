<?php 
    require ('classes/class.phpmailer.php');
    require  ('classes/class.smtp.php');
    require ('database/beauty.php');
    require ('classes/User.php');
    

    global $pdo;

    session_start();

    $getFromU = new User($pdo);

    define("BASE_URL", "http://localhost/beauty/");

    //echo "<script>alert('Jo');</script>";
?>
