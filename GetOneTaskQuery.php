<?php
session_start();
require "app/config/ConnectionDb.php";
require "app/controllers/TasksController.php";
$connection = new TasksController;
$id = $_POST['object'];
$connection->getOneTask($id, $_SESSION['user-id']);
?>