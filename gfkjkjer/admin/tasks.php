<?php require './function.php';?>
<!DOCTYPE html>
<html><head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
  <title>TenthIs</title> 
  <meta name="viewport" content="width=device-width"> 
<link href="style.css" rel="stylesheet">
<script src="script.js"></script>
</head>
<body>

<div class="contact-wrapper">
  <div class="header">
    <header> <h2>ADMIN</h2>
        </header>
</div>
<?php

 $check = "SELECT * FROM tasks_history WHERE type !='Refer Verified'";
 $res = mysqli_query($con, $check);

 $check_profile = "SELECT * FROM tasks_history WHERE type ='Youtube'";
 $res5 = mysqli_query($con, $check_profile);

 $check_refer = "SELECT * FROM tasks_history WHERE type = 'Shortlink'";
 $res2 = mysqli_query($con, $check_refer);

 $check_verified = "SELECT * FROM tasks_history WHERE type='Instagram'";
 $res3 = mysqli_query($con, $check_verified);

 $check_tasks = "SELECT * FROM tasks";
 $res4 = mysqli_query($con, $check_tasks);
?>

<div class="p">Total Tasks Completed : <b><?php echo  mysqli_num_rows($res); ?></b></div>
<div class="p">Total Youtube Tasks Completed : <b><?php echo  mysqli_num_rows($res5); ?></b></div>
<div class="p">Total Shortlink Tasks Completed : <b><?php echo mysqli_num_rows($res2); ?></b></div>
<div class="p">Total Instagram Tasks Completed : <b><?php echo mysqli_num_rows($res3); ?></b></div>
<div class="p">Total No. of Tasks : <b><?php echo mysqli_num_rows($res4); ?></b></div>

</div>
</body></html>