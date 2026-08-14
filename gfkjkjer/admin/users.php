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
 $check_profile = "SELECT * FROM users";
 $res = mysqli_query($con, $check_profile);

 $check_refer = "SELECT * FROM users WHERE refer='IND1'";
 $res2 = mysqli_query($con, $check_refer);

 $check_verified = "SELECT * FROM users WHERE status='verified'";
 $res3 = mysqli_query($con, $check_verified);
?>
<div class="p">Total Users : <b><?php echo  mysqli_num_rows($res); ?></b></div>
<div class="p">Total Self Refered : <b><?php echo mysqli_num_rows($res2); ?></b></div>
<div class="p">Total Verified : <b><?php echo mysqli_num_rows($res3); ?></b></div>
<div class="">
    <div class="h-bar">
    <div class="row">Id</div><hr>
    <div class="row">Email</div><hr>
    <div class="row">Balance</div>
</div>
    <?php
while($h = mysqli_fetch_array($res)){
echo "<a href='user?id=".$h['id']."'><div class='h-bar'><div class='row'>".$h['id']."</div><hr><div class='row'>". str_split($h['email'], 10)[0]."</div><hr><div class='row'>".$h['balance']."</div></div>\n";
}

    ?>
    
</div>
</body></html>