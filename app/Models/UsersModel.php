<?php
class UsersModel extends ConnectionDb{
    public function signupUser($name, $email, $password) {
        try {
            $password_hashed = password_hash($password, PASSWORD_BCRYPT);
            $query = "INSERT INTO users(user_name, user_email, user_password) VALUES(?, ?, ?)";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param('sss', $name, $email, $password_hashed);
            if($stmt->execute()) {
                return "<div class='alert alert-success'>USER SIGN UP SUCCESSFULLY</div>";
            } else {
                return "<div class='alert alert-danger'>SOMETHING HAS GONE WRONG</div>";
            }
        } catch(\Throwable $th) {
            return "<div class='alert alert-danger'>ERROR: " . $th->getMessage() . "</div>";
        }
    }

    public function loginUser($email, $password) {
        try {
            $query = "SELECT * FROM users WHERE user_email = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param('s', $email);
            if($stmt->execute()) {
                $results = $stmt->get_result();
                if($results -> num_rows >0 && password_verify($password, $results['user_password'])){
                    return $results;
                }
            } else {
                return array();
            }
        } catch(\Throwable $th) {
            return array();
        }
    }
}
?>