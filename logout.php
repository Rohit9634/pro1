<?php
    include("server.php");
    include("home.php");
    
    if(session_status() == PHP_SESSION_ACTIVE) {
        session_destroy();
    }
    if(session_status() == PHP_SESSION_NONE){
        echo "<script>document.getElementById('usershowhome').innerHTML = '';</script>";
        echo "<script>document.getElementById('logout').innerHTML = '';</script>";
    } else {
        
    }
    echo "<script>alert('User has been logged out')</script>";
?>