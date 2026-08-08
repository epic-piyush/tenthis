<?php require './php/function.php';?>
<?php include("php/head.php"); ?>
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
    <?php if(isset($_GET['theme'])){
$theme = $_GET['theme']; 
if($theme == "light"){
    setcookie("theme", "light", time()+6048000);
    header("location: profile");
}
if($theme == "dark"){
  setcookie("theme", "dark", time()+6048000);
  header("location: profile");
}
    }
    ?>
    <div class="form-row"><div></div><div class="p">Theme : <?php echo $_COOKIE['theme']; ?></div><?php if($_COOKIE['theme'] == "dark"){ echo '<a href="?theme=light"><div class="b">Light</div></a>'; }else{echo '<a href="?theme=dark"><div class="b">Dark</div></a>'; } ?></div>
    <div class="p">
    <img src="img/user.png">
    <?php 
     $check_profile = "SELECT * FROM users WHERE email = '$user'";
     $res = mysqli_query($con, $check_profile);
     mysqli_num_rows($res);
     $profile = mysqli_fetch_assoc($res);
     ?>
    Name : <?php echo $profile['name']; ?><br>
    Email : <?php echo str_split($profile['email'], 14)[0].'...'; ?><br>
    Wallet : <?php echo $profile['wallet']; ?><br>
    Balance : <?php echo $profile['balance']; ?><br>
</div>
     <a href="update_wallet"><b> <div class="p">Update Wallet</div></a></b>
     <a href="update_password"><b>  <div class="p">Update Password</div> </a></b>
     <a href="withdraw"><b>  <div class="p">Withdraw Money </div> </a></b>
     <a href="withdraw_history"><b>  <div class="p">Withdraw History </div> </a></b>
     <a href="verify"><b>  <div class="p">Verify Account </div> </a></b>
     <a href="contact"><b> <div class="p">Contact Us </div> </a></b>
     <?php if($profile['status'] == 'admin'){
       echo '<a href="gfkjkjer/admin"><b> <div class="p">Admin Panel</div> </a></b>';
     }else{
     echo '<a href="logout"><b> <div class="p">Logout</div> </a></b>';
     }?>
    <div class="ad"><?php include("php/ad.php"); ?>
  </div>
<?php include("php/menu-bar.php"); ?>