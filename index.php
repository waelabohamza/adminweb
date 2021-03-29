<?php
ob_start() ; 

session_start() ; 

if (isset($_SESSION['email'])){
  
    header("Location:pages/home/home.php");
    exit() ; 

}else {
    
    header("Location:login.php");
    exit() ; 

}





ob_end_flush() ;
