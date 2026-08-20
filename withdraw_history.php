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
<div class="">
    <div class="h-bar">
    <div class="row">Date </div><hr>
    <div class="row">Amount</div><hr>
    <div class="row">Status</div>
</div>
    <?php
$check_history = "SELECT * FROM withdraws WHERE email = '$user'";
$res2 = mysqli_query($con, $check_history);
if(mysqli_num_rows($res2) > 0){
while($h = mysqli_fetch_array($res2)){
echo " <div class='h-bar'><div class='row'>".$h['day']."</div><hr><div class='row'>".$h['amount']."</div><hr><div class='row' id='".$h['status']."'>".$h['status']."</div></div>\n";
}
}else{
    echo "<div class='h-bar'><div class='row'>No history</div></div>";
}
    ?>
    
</div>
<?php include("php/ad.php"); ?>
    <?php include("php/menu-bar.php"); ?>
