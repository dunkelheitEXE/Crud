<?php
require "app/Models/TasksModel.php";
class TasksController {

    public function getTasks() {
        try {
            $connection = new TasksModel;
            $results = $connection->getTasks();
            $resultsJsonEncoded = json_encode($results);
            echo $resultsJsonEncoded;
        } catch (\Throwable $th) {
            echo json_encode($th);
        }
    }

    public function submitTask($name, $descritpion, $scale, $user){
        try {
            $connection = new TasksModel;
            $results = $connection->submitTask($name, $descritpion, $scale, $user);
            echo $results;
        } catch (\Throwable $th) {
            echo "<div class='alert alert-danger' data-bs-theme='dark'>" . $th . "</div>";
        }
    }

    public function deleteTask($id) {
        try{
            $connection = new TasksModel;
            $results = $connection->deleteTask($id);
            echo $results;
        } catch(\Throwable $th) {
            echo "<div class='alert alert-danger' data-bs-theme='dark'>" . $th . "</div>";
        }
    }

    public function editTask($id, $name, $description, $scale) {
        try {
            $connection = new TasksModel;
            $results = $connection->editTask($id, $name, $description, $scale);
            echo $results;
        } catch(\Throwable $th) {
            echo "<div class='alert alert-danger' data-bs-theme='dark'>" . $th . "</div>";
        }
    }

    public function getOneTask($id, $user) {
        try {
            $connection = new TasksModel;
            $results = $connection->getOneTask($id, $user);
            $resultsJsonEncoded = json_encode($results);
            echo $resultsJsonEncoded;
        } catch(\Throwable $th) {
            echo "<div class='alert alert-danger' data-bs-theme='dark'>" . $th . "</div>";
        }
    }
}
?>