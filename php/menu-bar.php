<?php
    // $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1);
    // $caller = $trace[0];
    // $callerFile = $caller['file'];
    $callerFile = str_replace("/tenth/tenthis/", "", $_SERVER['PHP_SELF']);
    $currentFile = __FILE__;
    $home = '';
    $earn = '';
    $profile = '';
    if ($callerFile == 'index.php'){$home = "-2";}elseif($callerFile == 'history.php'){$earn="-2";}elseif($callerFile == 'profile.php'){$profile="-2";}
echo '
<div class="menu-bar">
          <a href="\."> <div class="row"><img src="img/home'.$home.'.png">Home</div>
          <a href="history"> <div class="row"><img src="img/earn'.$earn.'.png">History</div>
          <a href="profile"> <div class="row"><img src="img/profile'.$profile.'.png">Profile</div>
         </div>
</body></html>
';
// echo $_SERVER['PHP_SELF'];
?>