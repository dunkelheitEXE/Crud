<?php 
// Setting session to get user
session_start();
// Making connection 
require "app/config/ConnectionDb.php";
require "app/controllers/TasksController.php";
$connection = new TasksController;

// getting data from AJAX
$name = $_POST['name'];
$description = $_POST['description'];
$scale = $_POST['scale'];
$user = $_SESSION['user-id'];

// Send message from php to AJAX;
$connection->submitTask($name, $description, $scale, $user);

?>