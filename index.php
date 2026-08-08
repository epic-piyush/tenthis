<?php #impports functions for user and session management
require './php/function.php';?>

<!-- Imports the header -->
<?php include("php/head.php"); ?>


    <?php if(count($errors)): ?>
      <div class="detail-row">
   <?php   foreach($errors as $error) : ?>
    <div class="error"><?php echo $error; ?></div>
    <?php endforeach; ?>
   </div>
    <?php endif;?>
    <?php
    if(isset($_COOKIE['PHPSESID'])){
    if(!isset($_SESSION['login'])){
      $_SESSION['msg'] = "Welcome Back : $user";
      $_SESSION['login'] = 1;
    }
  }
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
    <div class="detail-row">
      <?php include_once("php/open_msg.php"); ?>
  </div>
     <a href="students_offer"> <div class="b"><img src="img/offer.png">Students' Offer</div></a>
     <a href="task_offer">  <div class="b"><img src="img/task.png">Task Offers</div> </a>
     <a href="history">  <div class="b"><img src="img/history.png">Task History</div> </a>
     <a href="refer">  <div class="b"><img src="img/refer.png">Refer And Earn </div> </a>
     <a href="promote">  <div class="b promo"><img src="">Promote Your Product</div> </a>
<?php include("php/menu-bar.php"); ?>