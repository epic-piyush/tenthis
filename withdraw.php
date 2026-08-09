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
    Your Balance : <?php echo $profile['balance']; ?><br>
</div>
<?php 
if(isset($_POST['withdraw'])){
if($profile['status'] != "notverified"){
    $amount = mysqli_real_escape_string($con, $_POST['amount']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $time = date("h:i:s", time());
        $day = date("d/m/y", time());
    if(password_verify($password, $profile['password'])){
        if($profile['balance'] >= $amount){
          $check_withdraw = "SELECT * FROM withdraws WHERE email = '$user' AND day = '$day' ";
     $res2 = mysqli_query($con, $check_withdraw);
    
     if( mysqli_num_rows($res2) == 0){

        $a = $profile['balance'] - $amount;
        $update_wallet = "UPDATE users SET balance = '$a' WHERE email = '$user'";
        $res = mysqli_query($con, $update_wallet);
        $wal = $profile['wallet'];
        
        
        $insert_data = "INSERT INTO withdraws (email, amount, wallet, time, day, balance, status)
                        values('$user', '$amount', '$wal', '$time', '$day', '$a', 'pending')";
        $data_check = mysqli_query($con, $insert_data);
        if($data_check){
        $_SESSION['msg'] = "Withdraw Success. Amount Credited within 7 days.";
        header("location: profile"); 
        }

      }else{
        ?> <div class="error">Today's Withdraw Limit Over!</div>
  <?php
      }
    }else{
      ?> <div class="error">Not enough balance!</div>
  <?php
  }
    }else{
        ?> <div class="error">Incorrect password!</div>
    <?php
    }
}else{
?> <div class="error">User not Verified!</div>
    <?php
}
}
?>
<form method="POST" action="" autocomplete="off">
   <div class="form-row">
    
   
   <select name="amount" required>
    <option value="50">50 (Rs.5)</option>
    <option value="100">100 (Rs.10)</option>
    <option value="500">500 (Rs.50)</option>
</select>
<span>Select Withdraw Amount</span>
     </div>
   <div class="form-row">
       <input type="password" name="password" minlength="6" maxlength="1000" required="">
       <span>Enter Your Password</span>
     </div>
     <div class="form-row">
       <button type="submit" value="submit" name="withdraw"> <font size="3">Withdraw</font></button></div></form>
    <div class="error">Withdraw Limit : Once a day.</div>
    <?php include("php/ad.php"); ?>
    <?php include("php/menu-bar.php"); ?>
