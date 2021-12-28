<?php

   session_start();
    
    if($_SESSION['logout'] === 'concour_login'){
        $location = 'concour_login.php';
    } else {
        $location = 'web_login.php';
    }

   session_destroy();

   header('Location: ../' . $location);


?>