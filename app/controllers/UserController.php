<?php
require "app/Models/UsersModel.php"; 
class UserController {
    public function signupUser($name, $email, $password) {
        try {
            $connection = new UsersModel;
            $results = $connection->signupUser($name, $email, $password);
            echo $results;
        } catch(\Throwable $th) {
            echo "<div class='alert alert-danger'>" . $th->getMessage() . "</div>";
        }
    }

    public function loginUser($email, $password) {
        //
    }
}
?>