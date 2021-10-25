<?php
    $dsn = 'mysql:host=localhost; dbname=beauty';
    $user = 'root';
    $password = '';

    try {
        $pdo = new PDO($dsn, $user, $password);
        // echo '<script>alert("Database Connection Successful");</script>';
    } catch(PDOException $e) {
        echo 'Connection error! ' . $e->getMessage();
        echo '<script>alert("Database Error Connection");</script>';
    }

    // dbname: bitcopto_crypto
    // password: A#x_#E6S(;SP
