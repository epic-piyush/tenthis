<?php require './php/server.php';
if(isset($_COOKIE['PHPSESID'])){
  header("location: \.");
}
?>
<?php include("php/head.php"); ?>
<div class="detail-row">
    <?php if(count($errors)): foreach($errors as $error) : ?>
    <div class="error"><?php echo $error; ?></div>
    <?php endforeach; endif;?>
    </div>

    <form method="POST" action="">
   <div class="form-row">
       <input type="email" name="email" minlength="1" maxlength="1000" required="">
       <span>Enter Your Email</span>
     </div>
   <div class="form-row">
       <input type="password" name="password" minlength="6" maxlength="1000" required="">
       <span>Enter Your Password</span>
     </div>
     
     <div class="detail-row">Don't have an account? <a href="signup">SignUp Now</a> </div>
     <div class="form-row">
       <button type="submit" value="submit" name="login"> <font size="3">Login</font></button></div></form></body></html>