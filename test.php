<?php
$int = "https://tenthis.000webhostapp.com/tenthis/";
$long_url = urlencode($int);
      $api_token = 'f9d5033625b181271a635b59ba8d53365f917374';
      $api_url = "https://gplinks.in/api?api=$api_token&url=$long_url";
      $result = json_decode(file_get_contents($api_url),TRUE);
      echo json_encode($result);

     ?> 