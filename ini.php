<?php 

include "connect.php" ; 

define("PATH_TMP" , "include/") ;
define("PATH_CSS" , "layout/css/") 		; 
define("PATH_IMG" , "layout/images/") 		; 
define("PATH_JS"  , "layout/js/") 		; 


$perpage = 20;


if (!isset($login)){
    ob_start() ; 
    session_start() ;
     if (!isset($_SESSION['email']) ) {
        header("location:../../index.php") ;
        exit() ;   
     }
}

?>