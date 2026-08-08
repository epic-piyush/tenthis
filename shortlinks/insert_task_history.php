<?php 
session_start();
$u = $_GET['u'];
$id = $_GET['id'];
$amount = $_GET['am'];
$wal = $_GET['wal'];
$type = $_GET['type'];
$day = urldecode($_GET['day']);
$code = $_GET['code'];

include("connection.php");
    $user = base64_decode($u);

    $insert_data = "INSERT INTO tasks_history (email, amount, task_id, type, day, status)
                        values('$user', '$amount', '$id', '$type', '$day', 'success')";
      mysqli_query($con, $insert_data);
       

?>