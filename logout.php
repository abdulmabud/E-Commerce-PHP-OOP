<?php 
    session_start();
    unset($_SESSION['username']);
    if(isset($_SESSION['isadmin'])){
        unset($_SESSION['isadmin']);
    }
    header('Location: index.php');
?>