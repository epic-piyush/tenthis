<?php 
session_start();
    $id = $_GET['id'];
    include("con.php");
$check_profile = "SELECT * FROM tasks WHERE id = '$id'";
     $res = mysqli_query($con, $check_profile);
     mysqli_num_rows($res);
     $profile = mysqli_fetch_assoc($res);

echo json_encode($profile);

?>