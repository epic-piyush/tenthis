<?php
session_start();
date_default_timezone_set("Asia/Kolkata");
include("connection.php");
$email = "";
$name = "";
$errors = array();

if(isset($_POST['login'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $check_email = "SELECT * FROM users WHERE email = '$email'";
    $res = mysqli_query($con, $check_email);
    if(mysqli_num_rows($res) > 0){
        $fetch = mysqli_fetch_assoc($res);
        $fetch_pass = $fetch['password'];
        if(password_verify($password, $fetch_pass)){
            $u = base64_encode($email);
            $user= str_replace('=', 'uuk2', $u);
            setcookie("PHPSESID", $user, time()+604800);
           
            $_SESSION['login'] = 1;
            $_SESSION['msg'] = "Login Success";
                header('location: index');
        }else{
            array_push($errors, "Incorrect password!");
        }
    }else{
        array_push($errors, "User not found! Please signUp");
    }
}

if(isset($_POST['signup'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['conf_password']);
    $ref = mysqli_real_escape_string($con, $_POST['refer']);
    $ip = $_SERVER['SERVER_ADDR'];
    $device = mysqli_real_escape_string($con, $_SERVER['HTTP_USER_AGENT']);
    $ip_check = "SELECT * FROM login_details WHERE ip = '$ip' OR device = '$device'";
    $res_ip = mysqli_query($con, $ip_check);
    if(mysqli_num_rows($res_ip) > 0){
        array_push($errors, "User by this device/ip already signup.");
    }
    if($password !== $cpassword){
        array_push($errors, "Confirm password not matched!");
    }
    $email_check = "SELECT * FROM users WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email that you have entered is already exist!";
    }
    if(count($errors) === 0){
        $ref_check = "SELECT * FROM users WHERE refer = '$ref'";
    $res2 = mysqli_query($con, $ref_check);
    if(mysqli_num_rows($res2) >= 10){
        $ref = "IND1";
    }
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = 4;
        $status = "notverified";

       
        
        
        $time = date("h:i:s", time());
        $day = date("d/m/y", time());
        $insert_detail = "INSERT INTO login_details (email, ip, device, time, day, status)
                        values('$email', '$ip', '$device', '$time', '$day', '0')";
        $detail_check = mysqli_query($con, $insert_detail);


        $insert_data = "INSERT INTO users (name, email, password, wallet, refer, balance, status)
                        values('$name', '$email', '$encpass', 'Not added', '$ref', '$code', '$status')";
        $data_check = mysqli_query($con, $insert_data);

        if($data_check && $detail_check){

            $u = base64_encode($email);
            $user= str_replace('=', 'uuk2', $u);
            setcookie("PHPSESID", $user, time()+604800);
            $_SESSION['login'] = 1;
            
                $_SESSION['msg'] = "SignUp Success. Signup Bonus : ".$code;
                header('location: index.php');
                exit();
            
        }else{
            array_push($errors, "Internal Server Error!");
        }
    }

}