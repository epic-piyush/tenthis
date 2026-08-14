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

    <?php if(count($errors)): ?>
      <div class="detail-row">
   <?php   foreach($errors as $error) : ?>
    <div class="error"><?php echo $error; ?></div>
    <?php endforeach; ?>
   </div>
    <?php endif;?>
    <?php
    if(isset($_SESSION['msg'])){
?>
<div class="detail-row">
  <div class="success"><?php echo $_SESSION['msg']; ?>
    </div>
    </div>
    <?php
    unset($_SESSION['msg']);
    }
    ?>
     <a href="users.php"> <div class="b">Users History</div></a>
     <a href="withdraw.php">  <div class="b promo">Withdraw History</div> </a>
     <a href="tasks.php">  <div class="b">Tasks History</div> </a>
     <a href="add_tasks.php">  <div class="b">Add Tasks</div> </a>
</body></html>