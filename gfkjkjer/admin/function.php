<?php
session_start();
date_default_timezone_set("Asia/Kolkata");
$con = mysqli_connect('localhost', 'root', '', 'tenthis');
$errors = array();
if(isset($_COOKIE['PHPSESID'])){
    $u= $_COOKIE['PHPSESID'];
    $user = base64_decode(str_replace('uuk2', '=', $u));
    if($user != "tenthis.admin.piyush@tenthis.com"){
        header("location: login.php");
    }
}else{
        header("location: login.php");
    
}
?>