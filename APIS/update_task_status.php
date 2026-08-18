<?php 
session_start();
$u = $_GET['u'];
$id = $_GET['id'];

include("connection.php");
    $user = base64_decode(str_replace('_PHP_ID', '==', $u));

    $update_tasks = "UPDATE tasks SET status = 'closed' WHERE id = '$id'";
            $res24 = mysqli_query($con, $update_tasks);

?>