<?php require './php/function.php';?>
<?php include("php/head.php"); ?>
<div class="p">
Promote Your Product Like Youtube/ Intagram/ Website.
</div>
<?php 
if(isset($_POST['promote'])){
    $type = mysqli_real_escape_string($con, $_POST['type']);
    $im = mysqli_real_escape_string($con, $_POST['im']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $time = date("h:i:s", time());
    $day = date("d/m/y", time());

        
        $insert_data = "INSERT INTO promotions (email, type, impressions, time, day, status)
                        values('$contact', '$type', '$im', '$time', '$day', 'pending')";
        $data_check = mysqli_query($con, $insert_data);
        if($data_check){
        $_SESSION['msg'] = "Promotion Deal added. We will contact you at your email.";
        header("location: index"); 
        }
}
?>
<form method="POST" action="" autocomplete="off">
   <div class="form-row">
    
   
   <select name="type" required>
    <option value="Youtube">Youtube Video</option>
    <option value="Instagram">Insta Post</option>
    <option value="WebPage">Website Page</option>
</select>
<span>Select Promotion Type</span>
     </div>
   <div class="form-row">
       <input type="number" name="im" minlength="3" maxlength="1000" required="" placeholder="Minimum : 100">
       <span>Enter Impressions Needed</span>
     </div>
     <div class="form-row">
       <input type="email" name="contact" minlength="4" maxlength="1000" required="">
       <span>Enter Your Contact Email</span>
     </div>
     <div class="form-row">
       <button type="submit" value="submit" name="promote"> <font size="3">Promote</font></button></div></form>
    <div class="success">In Youtube Video : 1 impression = 0.5Rs. Ex- 100 impressions = 50Rs.<br>
    In Insta Post : 1 impression = 0.35Rs. Ex- 100 impressions = 35Rs.<br>
    In Webiste Page : 1 impression = 0.65Rs. Ex- 100 impressions = 65Rs.<br>
    You need to pay before active the promotion. All impressions will be verified and original from our registered users.</div>
    <div class="ad"><?php include("php/ad.php"); ?></div>
    <?php include("php/menu-bar.php"); ?>