<?php require './php/function.php';?>
<?php include("php/head.php"); ?>
    <?php 
    $ref = 4;
    $errors = array();
     $check_profile = "SELECT * FROM users WHERE email = '$user'";
     $res = mysqli_query($con, $check_profile);
     $profile = mysqli_fetch_assoc($res);
     
     $check_history = "SELECT * FROM tasks_history WHERE email='$user' && type != 'Refer Verified'";
     $res2 = mysqli_query($con, $check_history);
     ?>
<?php
if(isset($_POST['submit'])){
    $id = str_replace("IND", "", $profile['refer']);
if($profile['status'] != "notverified"){
    array_push($errors, "Account Already Verified.");
}
if($profile['wallet'] == "Not added"){
    array_push($errors, "Wallet not added yet.");
}
if(mysqli_num_rows($res2) < 11){
    array_push($errors, "Total Tasks not completed.");
}
if(count($errors) == 0){
    $check_refer = "SELECT * FROM users WHERE id = '$id'";
    $res3 = mysqli_query($con, $check_refer);
    $refer = mysqli_fetch_assoc($res3);
    $r_user = $refer['email'];
    $day = date("d/m/y", time());
    $a = $refer['balance'] + $ref;
    $update_wallet = "UPDATE users SET status = 'verified' WHERE email = '$user'";
            $res23 = mysqli_query($con, $update_wallet);
    $update_refer= "UPDATE users SET balance = '$a' WHERE id = '$id'";
            $res24 = mysqli_query($con, $update_refer);
    $insert_data = "INSERT INTO tasks_history (email, amount, task_id, type, day, status)
                        values('$r_user', '$ref', '', 'Refer Verified', '$day', 'success')";
        $data_check = mysqli_query($con, $insert_data);
        if($data_check){
        $_SESSION['msg'] = "Account Verified Success.";
        header("location: profile"); 
        }
}
}
?>
<?php 
if(count($errors)){
foreach($errors as $error){
echo "<div class='error'>$error</div>";
}
}
?>
<div class="p">No. of Task Completed  :  <b> <?php echo mysqli_num_rows($res2); ?>/11</b></div>
<div class="p">Wallet Added :  <b> <?php if($profile['wallet'] == "Not added"){ echo "No"; }else{echo "Yes";}  ?></b></div>
<div class="p">No. of Student Offer Completed :  <b> /0</b></div>
<div class="p">Your Referal : <?php echo $profile['refer']; ?></b></div>

<form method="POST" action="" autocomplete="off">
     <div class="form-row">
       <button type="submit" value="submit" name="submit"> <font size="3">Check & Verify</font></button></div>
</form>
<div class="success">You need to complete the tasks needed. Need to complete atleast 11 tasks , Add your wallet and complete atleast 0 students offer. 
</div>
<div class="ad"><?php include("php/ad.php"); ?></div>
    <?php include("php/menu-bar.php"); ?>
