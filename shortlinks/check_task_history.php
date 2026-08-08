<?php 
session_start();
$u = $_GET['u'];
$id = $_GET['id'];
include("connection.php");
    $user = base64_decode(str_replace('_PHP_ID', '==', $u));

    $check_history = "SELECT * FROM tasks_history WHERE email='$user' AND task_id = '$id'";
    $res2 = mysqli_query($con, $check_history);
    echo mysqli_num_rows($res2);


?>