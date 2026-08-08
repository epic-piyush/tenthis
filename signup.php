<?php require './php/server.php';
if(isset($_COOKIE['PHPSESID'])){
  header("location: index");
}?>
<?php include("php/head.php"); ?>
<div class="detail-row">
    <?php if(count($errors)): foreach($errors as $error) : ?>
    <div class="error"><?php echo $error; ?></div>
    <?php endforeach; endif;?>
    </div>
    <form method="POST" action="" autocomplete="off">
   
    <div class="form-row">
       <input type="text" name="name" minlength="1" maxlength="100" required="">
       <span>Enter Your Name</span>
     </div>
   <div class="form-row">
       <input type="email" name="email" minlength="1" maxlength="100" required="">
       <span>Enter Your Email</span>
     </div>
   <div class="form-row">
       <input type="password" name="password" minlength="6" maxlength="100" required="">
       <span>Create Password</span>
     </div>
     <div class="form-row">
       <input type="text" name="conf_password" minlength="6" maxlength="100" required="">
       <span>Confirm Password</span>
     </div>
     <input type="hidden" name="refer" value="<?php if(isset($_GET['ref'])){ echo $_GET['ref'];}else{ echo "IND1"; } ?>">
     
     <div class="detail-row">Already have an account? <a href="login">Login Now</a> </div>
     <div class="form-row">
       <button type="submit" value="submit" name="signup"> <font size="3">SignUp</font></button></div></form></body></html>