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
if(isset($_POST['add'])){
    $type = mysqli_real_escape_string($con, $_POST['type']);
    $vail = mysqli_real_escape_string($con, $_POST['im']);
    $am = mysqli_real_escape_string($con, $_POST['amount']);
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $link = mysqli_real_escape_string($con, $_POST['link']);
    $code = mysqli_real_escape_string($con, $_POST['code']);

        
        $insert_data = "INSERT INTO tasks (type, amount, title, link, validity, code, users, status)
                        values('$type', '$am', '$title', '$link', '$vail', '$code', '0', 'open')";
        $data_check = mysqli_query($con, $insert_data);
        if($data_check){
        $_SESSION['msg'] = "Tasks Added Success";
        header("location: index.php"); 
        }
}
?>
<form method="POST" action="" autocomplete="off">
   <div class="form-row">
    
   
   <select name="type" required>
    <option value="Youtube">Youtube Video</option>
    <option value="Shortlink">Shortlink</option>
</select>
<span>Select Tasks Type</span>
     </div>
   <div class="form-row">
       <input type="number" name="im" minlength="3" maxlength="1000" required="" placeholder="Minimum : 100">
       <span>Enter Vailidity</span>
     </div>
  <div class="form-row">
       <input type="number" name="amount" minlength="1" maxlength="1000" required="">
       <span>Enter Amount</span>
     </div>
  <div class="form-row">
       <input type="text" name="title" minlength="6" maxlength="1000" required="">
       <span>Enter Title</span>
     </div>
     <div class="form-row">
       <input type="link" name="link" minlength="4" maxlength="1000" required="">
       <span>Enter Task Link</span>
     </div>
     <div class="form-row">
       <input type="text" name="code" minlength="4" maxlength="1000" required="">
       <span>Enter Code</span>
     </div>
     <div class="form-row">
       <button type="submit" value="submit" name="add"> <font size="3">Add Task</font></button></div></form>

</body></html>