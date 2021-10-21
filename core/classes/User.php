<?php 
    class User {
        protected $pdo;

        function __construct($pdo) {
            $this->pdo = $pdo;
        }

        public function checkInput($var) {
            $var = htmlspecialchars($var);
            $var = trim($var);
            $var = stripcslashes($var);
            return $var;
        }

        public function checkEmail($email, $table_name) {
            $stmt = $this->pdo->prepare("SELECT `email` FROM `$table_name` WHERE `email` = :email");
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->execute();

            $count = $stmt->rowCount();
            if($count > 0) {
                return true;
            } else {
                return false;
            }
        }

        
        public function uploadImage($file) {
            $filename = basename($file['name']);
            $fileTmp = $file['tmp_name'];
            $fileSize = $file['size'];
            $folderName = 'applyImages/';
            $newName = mt_rand(1111, 9999).mt_rand(1111, 9999).".png";
            $joinFile = $folderName.$newName;
            $myTime = date("D j F, Y; h:i a");
            $array_allow = array('jpg', 'png', 'jpeg', 'bmp');
            $file_ext = strtolower(pathinfo($filename)['extension']);

            if($fileSize > 500000000) {
                return false;
            } elseif(!in_array($file_ext, $array_allow)) {
                return false;
            } else {
                if(move_uploaded_file($fileTmp, $joinFile)) {
                    return $newName;
                }
            }
        }

        public function search($search) {
            $stmt = $this->pdo->prepare("SELECT `user_id`, `username`, `screenName`, `profileImage`, `profileCover` FROM `users` WHERE `username` LIKE ? OR `screenName` LIKE ?");
            $stmt->bindValue(1, $search.'%', PDO::PARAM_STR);
            $stmt->bindValue(2, $search.'%', PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function register($email, $screenName, $password) {
            $stmt = $this->pdo->prepare("INSERT INTO `users` (`email`, `password`, `screenName`, `profileImage`, `profileCover`) VALUES(:email, :passwords, :screenName, 'assets/images/defaultprofileimage.png', 'assets/images/defaultCoverImage.png')");
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":passwords", $password, PDO::PARAM_STR);
            $stmt->bindParam(":screenName", $screenName, PDO::PARAM_STR);

            $stmt->execute();

            $user_id = $this->pdo->lastInsertId();
            $_SESSION['user_id'] = $user_id;
        }

        public function create($table, $fields = array()) {
            // remove the , from the key values in the fields(i.e the values input into databse)
            $columns = implode(',', array_keys($fields));
            $values = ':'.implode(', :', array_keys($fields));
            $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";
            if($stmt = $this->pdo->prepare($sql)) {
                foreach($fields as $key => $data) {
                    $stmt->bindValue(`:`.$key, $data);
                }
                $stmt->execute();
                return $this->pdo->lastInsertId();
            }
        }

        public function update($table, $user_id, $fields = array()) {
            $columns = '';
            $i = 1;

            foreach($fields as $name => $value) {
                $columns .= "`{$name}` = :{$name}";
                if($i < count($fields)) {
                    $columns .= ', ';
                }
                $i++;
            }
            $sql = "UPDATE {$table} SET {$columns} WHERE `user_id` = {$user_id}";
            if($stmt = $this->pdo->prepare($sql)) {
                foreach($fields as $key => $value) {
                    $stmt->bindValue(':'.$key, $value);
                }
                //var_dump($sql);
                $stmt -> execute();
            }
        }

        //select anything selectable
        public function selectTable($select_table) {
            $stmt = $this->pdo->prepare("SELECT * FROM `$select_table`");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        //selecting with condition
        public function select_cond_table($select_cond_table, $columns, $chapt) {
            $stmt = $this->pdo->prepare("SELECT * FROM `$select_cond_table` WHERE `$columns` = :chapter");
            $stmt->bindParam(":chapter", $chapt, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function checkUsername($username) {
            $stmt = $this->pdo->prepare("SELECT `username` FROM `users` WHERE `username` = :username");
            $stmt->bindParam(":username", $username, PDO::PARAM_STR);
            $stmt->execute();

            $count = $stmt->rowCount();
            if($count > 0) {
                return true;
            } else {
                return false;
            }
        }

        public function userIdByUsername($username) {
            $stmt = $this->pdo->prepare("SELECT `user_id` FROM `users` WHERE `username` = :username");
            $stmt->bindParam(":username", $username, PDO::PARAM_STR);
            $stmt->execute();
            //to fetch current user_id
            $user = $stmt->fetch(PDO::FETCH_OBJ);
            return $user->user_id;
        }

        public function loggedIn() {
            return (isset($_SESSION['user_id'])) ? true : false;
        }
    }
?>
