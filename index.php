<?php 
session_start();
if(isset($_SESSION['user-id'])) {
    header('Location: Home.php?user='.$_SESSION['user-id']);
}
require "app/config/ConnectionDb.php";
require "app/controllers/UserController.php";
$connection = new UserController;
include("app/include/header.php");
include("app/include/navbar.php");
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $connection->signupUser($name, $email, $password);
}
include("app/Views/IndexView.php");
include("app/include/footer.php");
?>