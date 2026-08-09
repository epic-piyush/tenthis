<?php require './php/function.php';?>
<?php include("php/head.php"); ?>
<a href="students_offer"> <div class="b"><img src="">Students' Offer</div></a>
     <a href="task_offer">  <div class="b"><img src="">Task Offers</div> </a>
<div class="">
    <div class="h-bar">
    <div class="row">Type </div><hr>
    <div class="row">Amount</div><hr>
    <div class="row">Status</div>
</div>
<div class="scroll">
    <?php
$check_history = "SELECT * FROM tasks_history WHERE email='$user' AND type !='Refer Verified' ORDER BY id DESC";
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
</div>
<?php include("php/ad.php"); ?>
<?php include("php/menu-bar.php"); ?>