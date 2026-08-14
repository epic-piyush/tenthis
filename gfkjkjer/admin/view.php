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
    $check_profile = "SELECT * FROM withdraws WHERE id ='$id'";
    $res = mysqli_query($con, $check_profile);
    $p = mysqli_fetch_array($res);
    $email = $p['email'];
    $check_profile = "SELECT * FROM withdraws WHERE email ='$email'";
    $res = mysqli_query($con, $check_profile);
    $check_profile2 = "SELECT * FROM users WHERE email = '$email'";
    $res2 = mysqli_query($con, $check_profile2);
    $profile = mysqli_fetch_assoc($res2);
}
?>
<div class="p">Email : <b><?php echo  $p['email']; ?></b></div>
<div class="p">Amount : <b><?php echo  $p['amount']; ?></b></div>
<div class="p">Wallet : <b><?php echo  $p['wallet']; ?></b></div>
<div class="p">Balance : <b><?php echo  $profile['balance']; ?></b></div>

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
if(isset($_GET['fail'])){
    $a = $profile['balance'] + $p['amount'];
        $update_wallet = "UPDATE users SET balance = '$a' WHERE email = '$email'";
        $res = mysqli_query($con, $update_wallet);

        $update_withdraw = "UPDATE withdraws SET status = 'Failed' WHERE id = '$id'";
        $res = mysqli_query($con, $update_withdraw);
        echo "<script>window.location='index.php?failed';</script>";

}elseif(isset($_GET['success'])){
    $update_withdraw = "UPDATE withdraws SET status = 'Success' WHERE id = '$id'";
        $res = mysqli_query($con, $update_withdraw);
        echo "Successed";
}
    ?>
    <a href="?id=<?php echo $id; ?>&success"><div class="b promo">Success</b></div></a>
    <a href="?id=<?php echo $id; ?>&fail"><div class="b promo">Fail</b></div></a>
    
</div>
</body></html>