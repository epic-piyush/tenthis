<?php 
session_start();
$u = $_GET['u'];
$id = $_GET['id'];

include("connection.php");

    $update_tasks = "UPDATE tasks SET users = '$u' WHERE id = '$id'";
            $res24 = mysqli_query($con, $update_tasks);

?>