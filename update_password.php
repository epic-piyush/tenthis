<?php require './php/function.php';?>
<?php include("php/head.php"); ?>
<?php 
     $check_profile = "SELECT * FROM users WHERE email = '$user'";
     $res = mysqli_query($con, $check_profile);
     mysqli_num_rows($res);
     $profile = mysqli_fetch_assoc($res);
if(isset($_POST['update'])){
    $old = mysqli_real_escape_string($con, $_POST['old']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    if(password_verify($old, $profile['password'])){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $update_password = "UPDATE users SET password = '$encpass' WHERE email = '$user'";
        $res = mysqli_query($con, $update_password);
        $_SESSION['msg'] = "Password Updated Successfully.";
        header("location: profile");
    }else{
        ?> <div class="error">Incorrect password!</div>
    <?php
    }
}
?>
<form method="POST" action="" autocomplete="off">
   <div class="form-row">
       <input type="password" name="old" minlength="6" maxlength="1000" required="">
       <span>Enter Old Password</span>
     </div>
   <div class="form-row">
       <input type="password" name="password" minlength="6" maxlength="1000" required="">
       <span>Create New Password</span>
     </div>
     <div class="form-row">
       <button type="submit" value="submit" name="update"> <font size="3">Update</font></button></div></form>
    <div class="error">If you forget your old password you need to contact us.</div>
    <?php include("php/ad.php"); ?>
    <?php include("php/menu-bar.php"); ?>
