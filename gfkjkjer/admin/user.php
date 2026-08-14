<?php require './function.php';?>
<!DOCTYPE html>
<html><head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
  <title>TenthIs</title> 
  <meta name="viewport" content="width=device-width"> 
<link href="style.css" rel="stylesheet">
<script src="script.js"></script>
</head>
<body>

<div class="contact-wrapper">
  <div class="header">
    <header> <h2>ADMIN</h2>
        </header>
</div>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $check_profile = "SELECT * FROM users WHERE id ='$id'";
    $res = mysqli_query($con, $check_profile);
    $p = mysqli_fetch_array($res);
    $email = $p['email'];
    $check_profile = "SELECT * FROM withdraws WHERE email ='$email'";
    $res = mysqli_query($con, $check_profile);
    $check_profile2 = "SELECT * FROM login_details WHERE email = '$email'";
    $res2 = mysqli_query($con, $check_profile2);
    $profile = mysqli_fetch_assoc($res2);
}
?>
<div class="p">Email : <b><?php echo  $p['email']; ?></b></div>
<div class="p">Signup at : <b><?php echo  $profile['day']." - ".$profile['time']; ?></b></div>
<div class="p">Wallet : <b><?php echo  $p['wallet']; ?></b></div>
<div class="p">Balance : <b><?php echo  $p['balance']; ?></b></div>
<div class="p">Referral : <b><?php echo  $p['refer']; ?></b></div>
<div class="p">Status : <b><?php echo  $p['status']; ?></b></div>

<div class="">
    <div class="h-bar">
    <div class="row">Id</div><hr>
    <div class="row">Amount</div><hr>
    <div class="row">Status</div>
</div>
    <?php
while($h = mysqli_fetch_array($res)){
echo " <div class='h-bar'><div class='row'>".$h['id']."</div><hr><div class='row'>". str_split($h['amount'], 10)[0]."</div><hr><div class='row'>".$h['status']."</div></div>\n";
}
    ?>
    
</div>
</body></html>