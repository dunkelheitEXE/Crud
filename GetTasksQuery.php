<?php
session_start();
require "app/config/ConnectionDb.php";
require "app/controllers/TasksController.php";
$connection = new TasksController;
$connection->getTasks();
?>