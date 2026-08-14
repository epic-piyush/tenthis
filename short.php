<?php require './php/function.php';?>
<?php include("php/head.php"); ?>
<?php
if(isset($_GET['id'])){
  $id = $_GET['id'];

$check_profile = "SELECT * FROM tasks WHERE id = '$id'";
$res = mysqli_query($con, $check_profile);
mysqli_num_rows($res);
$task = mysqli_fetch_assoc($res);
if($task['status'] == "open"){
  if($task['type'] == "Shortlink"){


$check_history = "SELECT * FROM tasks_history WHERE email='$user' AND task_id = '$id'";
     $res2 = mysqli_query($con, $check_history);
     if(mysqli_num_rows($res2) == 0){
         
        $ip = $_SERVER['SERVER_ADDR'];

            $session_id = ".".bin2hex(".".$user.$ip.$id);
            setcookie('session_id', $session_id, time() + 86400, "/");
          // $un = hex2bin(str_replace('.', '', $session_id));
        
        $insert_detail = "INSERT INTO shortlinks (user, short_id, session_id)
                        values('$user', '$id', '$session_id')";
        $detail_check = mysqli_query($con, $insert_detail);

        if($detail_check){
         
      ?>

<form method="GET" action="<?php echo $task['link']; ?>" autocomplete="off">
  <div class="success">Link generated successfully!</div>
     <div class="form-row">
       <button type="submit" value="submit" name="submit"> <font size="3">Open Link</font></button></div></form>
      
<?php
      
      }else{
        echo '<div class="error">Unexpected error occurred.</div>';
      }
     }else{
        echo '<div class="error">Task already completed.</div>';
     }

}else{
  echo '<div class="error">Task not type of Shortlink.</div>';
}
}else{
  echo '<div class="error">Task Status Closed.</div>';
}
}else{
  header("location: task_offer");
}

?>

    <?php include("php/ad.php"); ?>
    <br><br>
</body></html>