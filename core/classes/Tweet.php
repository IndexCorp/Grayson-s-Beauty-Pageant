<?php 
    // this below code will get information from the User Class
    class Tweet extends User{

        function __construct($pdo) {
            $this->pdo = $pdo;
        }
    }

?>
