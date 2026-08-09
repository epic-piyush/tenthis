<?php require './php/function.php';?>
<?php include("php/head.php"); ?>
<div class="p">
    <?php 
     $check_profile = "SELECT * FROM users WHERE email = '$user'";
     $res = mysqli_query($con, $check_profile);
     mysqli_num_rows($res);
     $profile = mysqli_fetch_assoc($res);
     $id = "IND".$profile['id'];
     $check_refer = "SELECT * FROM users WHERE refer = '$id'";
     $res2 = mysqli_query($con, $check_refer);
     echo "Total refers : ".mysqli_num_rows($res2);
     ?>
</div>
   <div class="form-row">
       <input type="text" name="referlink" id='referlink' value="http://localhost/tenthis/signup?ref=<?php echo $id; ?>" disabled>
       <span>Your Refer Link</span>
     </div>
   <div class="form-row">
   <input type="text" name="refercode" value="<?php echo $id; ?>" disabled>
       <span>Your Refer Code</span>
     </div>
     <div class="form-row">
       <button type="submit" value="submit" id="copy" onclick="copy('referlink')"> <font size="3">Copy Link</font></button></div>
    <div class="success">Per verified refer : 4 points. Only 10 refers counts per user per anum</div>
    <div class="">
    <div class="h-bar">
    <div class="row">Type </div><hr>
    <div class="row">Amount</div><hr>
    <div class="row">Status</div>
</div>
    <?php
$check_history = "SELECT * FROM tasks_history WHERE email='$user' AND type='Refer Verified' ORDER BY id DESC";
$res2 = mysqli_query($con, $check_history);
if(mysqli_num_rows($res2) > 0){
while($h = mysqli_fetch_array($res2)){
echo " <div class='h-bar'><div class='row'>".$h['type']."</div><hr><div class='row'>".$h['amount']."</div><hr><div class='row'>".$h['status']."</div></div>\n";
}
}else{
    echo "<div class='h-bar'><div class='row'>No history</div></div>";
}
    ?>

</div>
    <?php include("php/ad.php"); ?>
    <?php include("php/menu-bar.php"); ?>
