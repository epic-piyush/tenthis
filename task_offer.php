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
<div class="">
    <div class="h-bar">
    <div class="row">Type </div><hr>
    <div class="row">Amount</div><hr>
    <div class="row">Status</div>
</div>
    <?php
// $check_history = "SELECT * FROM tasks WHERE status='open'";
$check_history = "SELECT * FROM tasks WHERE type='Shortlink' AND id NOT IN (SELECT task_id FROM tasks_history WHERE email='$user')";
$res = mysqli_query($con, $check_history);
if(mysqli_num_rows($res) > 0){
while($h = mysqli_fetch_array($res)){
    $id = $h['id'];
echo "<a href='view_task?id=".$id."' target='_blank'><div class='r-bar'><div class='row'>".$h['type']."</div><hr><div class='row'>".$h['amount']."</div><hr><div class='row ".$h['status']."'>".$h['status']."</div></div></a>\n";

}
}else{
    echo "<div class='h-bar'><div class='row'>Today No Task Available</div></div>";
}
    ?>
    
</div>
<?php include("php/ad.php"); ?>
    <?php include("php/menu-bar.php"); ?>
