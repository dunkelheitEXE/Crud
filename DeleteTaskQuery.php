<?php
require "app/config/ConnectionDb.php";
require "app/controllers/TasksController.php";

$connection = new TasksController;
$id = $_POST['id'];
$connection->deleteTask($id);
?>