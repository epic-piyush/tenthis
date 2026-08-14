<?php require './php/function.php';?>
<?php include("php/head.php"); ?>
<div class="p" style="justify-content: center;">
    <?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        header("location: task_offer");
    }
     $check_profile = "SELECT * FROM tasks WHERE id = '$id'";
     $res = mysqli_query($con, $check_profile);
     mysqli_num_rows($res);
     $task = mysqli_fetch_assoc($res);
     ?>
    <b><?php echo $task['title']; ?></b>
</div>
<?php
if(isset($_POST['submit'])){
$code = $_POST['code'];
$id = $_POST['id'];

if($task['status'] == 'open'){

$check_history = "SELECT * FROM tasks_history WHERE email='$user' AND task_id = '$id'";
     $res2 = mysqli_query($con, $check_history);
     if(mysqli_num_rows($res2) == 0){
        if($code == $task['code']){
            $time = date("h:i:s", time());
            $day = date("d/m/y", time());

            $check_profile2 = "SELECT * FROM users WHERE email = '$user'";
     $res22 = mysqli_query($con, $check_profile2);
     $profile = mysqli_fetch_assoc($res22);
     $wal = $profile['wallet'];
     $amount = $task['amount'];
     $type = $task['type'];
            $a = $profile['balance'] + $amount;
            $u = $task['users'] + 1;
           

            $update_wallet = "UPDATE users SET balance = '$a' WHERE email = '$user'";
            $res23 = mysqli_query($con, $update_wallet);
            $update_tasks = "UPDATE tasks SET users = '$u' WHERE id = '$id'";
            $res24 = mysqli_query($con, $update_tasks);
            if($u == $task['validity']){
                $update_tasks = "UPDATE tasks SET status = 'closed' WHERE id = '$id'";
            $res24 = mysqli_query($con, $update_tasks);
            }
            $insert_data = "INSERT INTO tasks_history (email, amount, task_id, type, day, status)
                        values('$user', '$amount', '$id', '$type', '$day', 'success')";
        $data_check = mysqli_query($con, $insert_data);
        if($data_check){
        $_SESSION['msg'] = "Task Completed Success. Amount Credited to your account";
        header("location: task_offer"); 
        }
        }else{
            echo '<div class="error">Incorrect Code. Please Check</div>';
        }
     }else{
        echo '<div class="error">Task already completed.</div>';
     }

    }else{
        echo '<div class="error">Task Status Closed.</div>';
    }
}
?>
<div class="p">Type :  <b> <?php echo $task['type']; ?></b></div>
<div class="p">Amount :  <b>  <?php echo $task['amount']; ?> points</b></div>
<div class="p">Total Vailidity :  <b> <?php echo $task['validity']; ?> users</b></div>
<div class="p">Total Completed :  <b> <?php echo $task['users']; ?> users</b></div>

<?php 
if ($task['status'] == "open") {
if($task['type'] == "Shortlink"){
    echo '<div class="p">Code :  <b> '.$task["code"].'</b></div>';
}
?>
     <div class="detail-row">
      <a href="<?php if($task['type'] == 'Shortlink'){ echo 'short?id='.$id; }else{ echo $task['link']; } ?>" target="_blank"> <button type="submit" value="submit" name="add"> <font size="3">Open Link</font></button></a></div>
       <hr>
       <div class="success">Click <b>Open Link</b> and <?php 
if($task['type'] == "Shortlink"){
    echo " then complete the shortlink task to open the final link that where you will need to enter the code given below ";
}elseif($task['type'] == "Youtube"){
    echo " then play the youtube video and subscribe to the channel and you will get the code from the youtube video that you need to enter below ";
}elseif($task['type'] == "Instagram"){
    echo " then you will redirect to a instagram reel or post and where you will get the code in pinned comment or discription and then enter the code below ";
}
?>and click <b>Submit</b>  and you will get the amount in your acount. And you can watch tutorial : <a href="https://youtube.com/search?q=tenthiswebearner"><b>HERE</b></a></div>
<hr>
       <?php
       if($task['type'] != "Shortlink"){ ?>
       <form method="POST" action="" autocomplete="off">
   <div class="form-row">
       <input type="text" name="code" minlength="5" maxlength="1000" required="">
       <span>Enter The Code</span>
     </div>
     <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
     <div class="form-row">
       <button type="submit" value="submit" name="submit"> <font size="3">Submit</font></button></div></form>
<?php } 

}else{
    echo '<div class="error">Task Status Closed.</div>';
}
    ?>
<?php include("php/ad.php"); ?>
    <?php include("php/menu-bar.php"); ?>
