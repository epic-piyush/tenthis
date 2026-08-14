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
 $check_profile = "SELECT * FROM withdraws WHERE status ='pending'";
 $res = mysqli_query($con, $check_profile);

 $check_refer = "SELECT * FROM withdraws WHERE status = 'failed'";
 $res2 = mysqli_query($con, $check_refer);

 $check_verified = "SELECT * FROM withdraws WHERE status='success'";
 $res3 = mysqli_query($con, $check_verified);
?>
<div class="p">Total Pending Withdraws : <b><?php echo  mysqli_num_rows($res); ?></b></div>
<div class="p">Total Failed Withdraws : <b><?php echo mysqli_num_rows($res2); ?></b></div>
<div class="p">Total Success Withdraws : <b><?php echo mysqli_num_rows($res3); ?></b></div>

<div class="">
    <div class="h-bar">
    <div class="row">Wallet</div><hr>
    <div class="row">Amount</div><hr>
    <div class="row">Day</div>
</div>
    <?php
while($h = mysqli_fetch_array($res)){
echo "<a href='view.php?id=".$h['id']."'><div class='h-bar'><div class='row'>".$h['wallet']."</div><hr><div class='row'>".$h['amount']."</div><hr><div class='row'>".$h['day']."</div></div></a>\n";
}
    ?>
</div>
</body></html>