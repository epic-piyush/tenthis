<?php require './php/function.php';?>
<?php include("php/head.php"); ?>
<?php
if(isset($_COOKIE['session_id'])){
    $session_id = $_COOKIE['session_id'];
    $ip = $_SERVER['SERVER_ADDR'];
    $un = hex2bin(str_replace('.', '', $session_id));
    $id = str_replace(".".$user.$ip, '', $un);

$check_profile = "SELECT * FROM tasks WHERE id = '$id'";
$res = mysqli_query($con, $check_profile);
if(mysqli_num_rows($res) != 0){
    $task = mysqli_fetch_assoc($res);
    if($task['status'] == "open"){


$check_history = "SELECT * FROM tasks_history WHERE email='$user' AND task_id = '$id'";
     $res2 = mysqli_query($con, $check_history);
     if(mysqli_num_rows($res2) == 0){

     $check_user = "SELECT * FROM users WHERE email = '$user'";
     $res_user = mysqli_query($con, $check_user);
     mysqli_num_rows($res_user);
     $profile = mysqli_fetch_assoc($res_user);

     $amount = $task['amount'];
     $a = $profile['balance'] + $amount;

     $update_wallet = "UPDATE users SET balance = '$a' WHERE email = '$user'";
     $res_wallet = mysqli_query($con, $update_wallet);

     $u = $task['users'] + 1; 
     $update_task = "UPDATE tasks SET users = '$u' WHERE id = '$id'";
     $res_task = mysqli_query($con, $update_task);

     $type = $task['type'];
     $day = date("d/m/y", time());
     $insert_data = "INSERT INTO tasks_history (email, amount, task_id, type, day, status)
                        values('$user', '$amount', '$id', '$type', '$day', 'success')";
     $res_data = mysqli_query($con, $insert_data);
        
        $insert_detail = "INSERT INTO impression (user, short_id, session_id, status)
                        values('$user', '$id', '$session_id', 'valid')";
        $detail_check = mysqli_query($con, $insert_detail);

        if($detail_check){
         
      ?>

  <div class="success">Task completed successfully! & Reward: Rs.<?php echo $amount; ?> added to your wallet.</div>

      
<?php
      
      }else{
        echo '<div class="error">Unexpected error occurred.</div>';
      }
     }else{
        echo '<div class="error">Task already completed.</div>';
     }

}else{
  echo '<div class="error">Task Status Closed.</div>';
}
}else{
  echo '<div class="error">Invalid Task or System Error.</div>';    
  }
}else{
  header("location: task_offer");
}

?>

    <?php include("php/ad.php"); ?>
    <br><br>
</body></html>