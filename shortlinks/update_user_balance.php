<?php 
session_start();
$u = $_GET['u'];
$a = $_GET['a'];

include("con.php");
    $user = base64_decode($u);

    $update_wallet = "UPDATE users SET balance = '$a' WHERE email = '$user'";
            $res23 = mysqli_query($con, $update_wallet);

?>