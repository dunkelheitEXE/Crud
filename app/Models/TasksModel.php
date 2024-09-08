<?php
class TasksModel extends ConnectionDb{

    public function getTasks() {
        try {
            $query = "SELECT * FROM tasks";
            $stmt = $this->connection->prepare($query);
            $array = array();
            if($stmt->execute()) {
                $results = $stmt->get_result();
                while($row = $results->fetch_array(MYSQLI_ASSOC)) {
                    $array[] = $row;
                }
                return $array;
            } else {
                return array();
            }
        } catch(\Throwable $th) {
            echo "<div class='alert alert-warning'>ERROR: " . $th . "</div>";
            return array();
        }
    }


    public function submitTask($name, $descritpion, $scale, $user){
        try {
            $query = "INSERT INTO tasks (task_name, task_description, task_scale, task_user, task_date) VALUES(?, ?, ?, ?, CURRENT_DATE())";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param('ssss', $name, $descritpion, $scale, $user);
            if($stmt->execute()) {
                return "<div class='alert alert-secondary' data-bs-theme='dark'>TASK SAVED SUCCESSFULLY</div>";
            }else {
                return "<div class='alert alert-danger' data-bs-theme='dark'>SOMETHING HAS GONE WRONG</div>";
            }
        } catch(\Throwable $th) {
            return "<div class='alert alert-secondary' data-bs-theme='dark'>TYPE ERROR: " . $th->getMessage() . "</div>";
        }
    }

    public function deleteTask($id) {
        try {
            $query = "DELETE FROM tasks WHERE task_id = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param('s', $id);
            if($stmt->execute()) {
                return "<div class='alert alert-success' data-bs-theme='dark'>TASK DESTROYED SUCCESSFULLY!</div>";
            }else {
                return "<div class='alert alert-danger' data-bs-theme='dark'>SOEMTHING HAS GONE WRONG</div>";
            }
        } catch(\Throwable $th) {
            return "<div class='alert alert-danger' data-bs-theme='dark'>" . $th . "</div>";
        }
    }

    public function editTask($id, $name, $description, $scale) {
        try {
            $query = "UPDATE tasks SET task_name = ?, task_description = ?, task_scale = ?, task_date = CURRENT_DATE() WHERE task_id = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param('ssss', $name, $description, $scale, $id);
            if($stmt->execute()) {
                return "<div class='alert alert-success' data-bs-theme='dark'>TASK UPDATED SUCCESSFULLY</div>";
            } else {
                return "<div class='alert alert-danger' data-bs-theme='dark'>SOMETHING HAS GONE WRONG</div>";
            }
        } catch(\Throwable $th) {
            return "<div class='alert alert-danger' data-bs-theme='dark'>" . $th . "</div>";
        }
    }

    public function getOneTask($id, $user) {
        try {
            $query = "SELECT * FROM tasks WHERE task_id = ? AND task_user = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param('ss', $id, $user);
            $array = array();
            if($stmt->execute()) {
                $results = $stmt->get_result();
                while($row = $results->fetch_array(MYSQLI_ASSOC)) {
                    $array[] = $row;
                }
                return $array;
            } else {
                return array();
            }
        } catch(\Throwable $th) {
            echo $th;
            return array();
        }
    }
}
?>