<?php
session_start();
date_default_timezone_set("Asia/Kolkata");
include("con.php");
$errors = array();
if(isset($_COOKIE['PHPSESID'])){
    $u= $_COOKIE['PHPSESID'];
    $user = base64_decode(str_replace('uuk2', '=', $u));
}else{
    array_push($errors, "<a href='login'>Need to login!.</a>");
    if($_SERVER['PHP_SELF'] != "/tenthis/index.php" && $_SERVER['PHP_SELF'] != "/tenthis/promote.php"){
        header("location: login");
    }
}
if(!isset($_COOKIE['theme'])){
    setcookie("theme", "light", time()+6048000);
}
?>