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

?>

<form method="POST" action="" autocomplete="off">
     <div class="form-row">
       <button type="submit" value="submit" name="submit"> <font size="3">Generate & Open Link</font></button></div></form>
      
<?php
if(isset($_POST['submit'])){

$check_history = "SELECT * FROM tasks_history WHERE email='$user' AND task_id = '$id'";
     $res2 = mysqli_query($con, $check_history);
     if(mysqli_num_rows($res2) == 0){
      
      $local = "http://localhost/SS";

      $url = $task['link'];
      $u = base64_encode($user);
      $data = "";
      if($url == 'gplinks.in'){
      $int = file_get_contents($local."/makelink.php?user=$u&id=$id");
      // echo $int;
      //=====Waiting for Shortlink API========//
      
      $long_url = urlencode($int);
      $api_token = 'f9d5033625b181271a635b59ba8d53365f917374';
      $api_url = "https://gplinks.in/api?api=$api_token&url=$long_url";
      $result = json_decode(file_get_contents($api_url),TRUE);
      // echo json_encode($result);
      if(count($result)){
      $l = $result["shortenedUrl"];
      if($result["status"] != 'error') {
      header("location: $l");
      echo "<script>window.location='$l'; </script>";
      
      }else{
        echo "error";
      }
    }
    }elseif($url == 'giveaway'){
      $l = $local.'/giveaway/ghtydiks';
      header("location: $l");
      echo "<script>window.location='$l'; </script>";
    }
      // echo $l;
      // header("location: $int");



     }else{
        echo '<div class="error">Task already completed.</div>';
     }
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

    <div class="ad"><?php include("php/ad.php"); ?></div>
    <br><br>
</body></html>