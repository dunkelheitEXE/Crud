<?php 
session_start();
if(!isset($_SESSION['user-id'])) {
    header('Location: index.php');
}
require "app/config/ConnectionDb.php";

include("app/include/header.php");
include("app/include/navbar.php");
include("app/Views/HomeView.php");
include("app/include/footer.php");
?>