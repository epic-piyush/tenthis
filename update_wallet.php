<?php require './php/function.php';?>
<?php include("php/head.php"); ?>
<div class="p">
    <?php 
     $check_profile = "SELECT * FROM users WHERE email = '$user'";
     $res = mysqli_query($con, $check_profile);
     mysqli_num_rows($res);
     $profile = mysqli_fetch_assoc($res);
     ?>
    Your Paytm Wallet : <?php echo $profile['wallet']; ?><br>
</div>
<?php 
if(isset($_POST['add'])){
if($profile['wallet'] == "Not added"){
    $wallet = mysqli_real_escape_string($con, $_POST['wallet']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    if(password_verify($password, $profile['password'])){
      $check_wallet = "SELECT * FROM users WHERE wallet = '$wallet'";
      $res2 = mysqli_query($con, $check_wallet);
      if(mysqli_num_rows($res2) == 0){
        $update_wallet = "UPDATE users SET wallet = '$wallet' WHERE email = '$user'";
        $res = mysqli_query($con, $update_wallet);
        $_SESSION['msg'] = "Wallet Updated Successfully.";
        header("location: profile");
      }else{
        echo '<div class="error">Wallet already added by another account!</div>';
      }
    }else{
        ?> 
        <div class="error">Password Incorrect!</div>
    <?php
    }
}else{
?> <div class="error">Walley Already Updated </div>
    <?php
}
}
?>
<form method="POST" action="" autocomplete="off">
   <div class="form-row">
       <input type="number" name="wallet" minlength="10" maxlength="10" required="" placeholder="Ex- 9399300000">
       <span>Enter Your Wallet</span>
     </div>
   <div class="form-row">
       <input type="password" name="password" minlength="6" maxlength="1000" required="">
       <span>Enter Your Password</span>
     </div>
     <div class="form-row">
       <button type="submit" value="submit" name="add"> <font size="3">Add Wallet</font></button></div></form>
    <div class="error">If wallet already added. You cannot update it</div>
    <?php include("php/ad.php"); ?>
    <?php include("php/menu-bar.php"); ?>
