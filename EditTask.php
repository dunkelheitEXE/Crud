<?php
session_start();
require "app/config/ConnectionDb.php";
require "app/controllers/TasksController.php";
if(!isset($_SESSION['user-id'])) {
    header('Location: index.php');
}

if($_SESSION['user-id'] != $_GET['user']) {
    header('Location: Home.php');
}
$connection = new TasksController;

include("app/include/header.php");
include("app/include/navbar.php");
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $scale = $_POST['scale'];
    $connection->editTask($_GET['object'], $name, $description, $scale);
}
include("app/Views/EditTaskView.php");
include("app/include/footer.php");
?>