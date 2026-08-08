<?php
$trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1);

if (!empty($trace)) {
    $caller = $trace[0];
    $callerFile = $caller['file'];
    $currentFile = __FILE__;
    $home = '';
    $earn = '';
    $profile = '';
    if ($callerFile == 'C:\xampp\htdocs\tenthis\index.php'){$home = "2";}elseif($callerFile == 'C:\xampp\htdocs\tenthis\history.php'){$earn="-2";}elseif($callerFile == 'C:\xampp\htdocs\tenthis\profile.php'){$profile="-2";}
echo '
<div class="menu-bar">
          <a href="\."> <div class="row"><img src="img/home'.$home.'.png">Home</div>
          <a href="history"> <div class="row"><img src="img/earn'.$earn.'.png">History</div>
          <a href="profile"> <div class="row"><img src="img/profile'.$profile.'.png">Profile</div>
         </div>
</body></html>
';
// echo $callerFile;
}else{
    // echo "Error: menu-bar.php should be included in another file.";
    header("location: index.php");
}
?>