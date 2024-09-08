<?php
require "app/Models/UsersModel.php"; 
class UserController {
    public function signupUser($name, $email, $password) {
        try {
            $connection = new UsersModel;
            $results = $connection->signupUser($name, $email, $password);
            echo $results;
        } catch(\Throwable $th) {
            echo "<div class='alert alert-danger' data-bs-theme='dark'>" . $th->getMessage() . "</div>";
        }
    }

    public function loginUser($email, $password) {
        try {
            $connection = new UsersModel;
            $results = $connection->loginUser($email, $password);
            if(empty($results)) {
                echo "<div class='alert alert-danger' data-bs-theme='dark'> SOMETHING HAS GONE WRONG </div>";
            } else {
                $user = '';
                foreach($results as $key) {
                    $user = $key['user_id'];
                }
                $_SESSION['user-id'] = $user;
                header('Location: Home.php?user='.$user);
            }
        } catch (\Throwable $th) {
            echo "<div class='alert alert-danger' data-bs-theme='dark'>" . $th->getMessage() . "</div>";
        }
    }
}
?>