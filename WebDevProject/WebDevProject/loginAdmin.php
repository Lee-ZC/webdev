<?php
//include '../server.php';

//   unset($_SERVER['PHP_AUTH_USER']);       
//   unset($_SERVER['PHP_AUTH_PW']);




if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo '<h1>Reload page to login Again ! </h1>';
} 

else {
    unset($_SERVER['PHP_AUTH_USER']);       
    unset($_SERVER['PHP_AUTH_PW']);
    header('Location: Admin/adminV2.php');
}



?>