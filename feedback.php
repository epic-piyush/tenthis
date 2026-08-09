<?php require './php/function.php';?>
<!DOCTYPE html>
<html><?php include("php/head.php"); ?>
<body>

<div class="contact-wrapper">
  <div class="header">
    <header> <h2><?php echo $web_title; ?></h2>
        </header>
</div>
<div class="p">
Your Feedback Give Us New Suggestions
</div>
<?php 
if(isset($_POST['add'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $feed = mysqli_real_escape_string($con, $_POST['feed']);
    $time = date("h:i:s", time());
    $day = date("d/m/y", time());
    $insert_data = "INSERT INTO feedbacks (email, name, feed, time, day, status)
                        values('$user', '$name', '$feed', '$time', '$day', 'pending')";
        $data_check = mysqli_query($con, $insert_data);
        if($data_check){
        $_SESSION['msg'] = "Feedback Sent to Admin.";
        header("location: profile.php"); 
        }
}
?>
<form method="POST" action="" autocomplete="off">
   <div class="form-row">
       <input type="text" name="name" minlength="2" maxlength="100" required="">
       <span>Enter Your Name</span>
     </div>
     <div class="form-row">
       <textarea name="feed" required=""></textarea>
       <span>Your Feedback</span>
     </div>
     <div class="form-row">
       <button type="submit" value="submit" name="add"> <font size="3">Submit</font></button></div></form>
    <?php include("php/ad.php"); ?>
    <?php include("php/menu-bar.php"); ?>