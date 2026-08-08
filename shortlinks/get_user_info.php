<?php 
session_start();

include("connection.php");

if(isset($_GET['u'])){
    $u = $_GET['u'];
    $user = base64_decode($u);
    $check_profile = "SELECT * FROM users WHERE email = '$user'";
}elseif(isset($_GET['id'])){
    $id = $_GET['id'];
    $check_profile = "SELECT * FROM users WHERE id = '$id'";
}

$res = mysqli_query($con, $check_profile);
     if(mysqli_num_rows($res) == 1){
        $profile = mysqli_fetch_assoc($res);
echo json_encode($profile);
     }else{
        echo 'error';
     }


?>