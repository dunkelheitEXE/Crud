<?php
class UsersModel extends ConnectionDb{
    // Saving user in database
    public function signupUser($name, $email, $password) {
        try {
            $password_hashed = password_hash($password, PASSWORD_BCRYPT); // Encrypting password
            $query = "INSERT INTO users(user_name, user_email, user_password) VALUES(?, ?, ?)";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param('sss', $name, $email, $password_hashed);
            if($stmt->execute()) {
                return "<div class='alert alert-success' data-bs-theme='dark'>USER SIGN UP SUCCESSFULLY</div>";
            } else {
                return "<div class='alert alert-danger' data-bs-theme='dark'>SOMETHING HAS GONE WRONG</div>";
            }
        } catch(\Throwable $th) {
            return "<div class='alert alert-danger' data-bs-theme='dark'>ERROR: " . $th->getMessage() . "</div>";
        }
    }

    public function loginUser($email, $password) {
        try {
            $query = "SELECT * FROM users WHERE user_email = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param('s', $email);
            if($stmt->execute()) {
                // Saving returned data to get password
                $results = $stmt->get_result();
                $array = array();
                while ($row = $results->fetch_array()){
                    $array[] = $row;
                }

                // Verifying that password would be correct
                if(password_verify($password, $array[0]['user_password'])) {
                    return $array;
                } else {
                    return array();
                }
            } else {
                return array();
            }
        } catch(\Throwable $th) {
            //echo $th;
            return array();
        }
    }
}

/*
$output = array();
while ($row = $result->fetch_array()) {
    $output[] = $row;
}
$objSmarty->assign("result", $output);


*/
?>