<?php
session_start();
date_default_timezone_set("Asia/Kolkata");
include("connection.php");
$errors = array();
if(isset($_COOKIE['PHPSESID'])){
    $u= $_COOKIE['PHPSESID'];
    $user = base64_decode(str_replace('uuk2', '=', $u));
}else{
    array_push($errors, "<a href='login'>Need to login!.</a>");
    $callerFile = str_replace("/tenth/tenthis/", "", $_SERVER['PHP_SELF']);
    if($_SERVER['PHP_SELF'] != $callerFile."index.php" && $_SERVER['PHP_SELF'] != $callerFile."promote.php"){
        header("location: login");
    }
}
if(!isset($_COOKIE['theme'])){
    setcookie("theme", "light", time()+6048000);
}
?>