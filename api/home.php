<?php 
  
  include "../connect.php" ; 


  $arraydatahome = array(); 

  $data = getAllData("servciesview" , "services_favorite = 1 LIMIT 6 "); 

 if ( $data['count'] > 0 ) {
   
    $arraydatahome['servicesfavorite'] = $data['values'] ; 

 }

 $data = getAllData("servciesview" , "services_common = 1 LIMIT 5 "); 
  

 if ( $data['count'] > 0 ) {
   
    $arraydatahome['servicescommon'] = $data['values'] ; 

 }

 $data = getAllData("expertsview" , "experts_common = 1 LIMIT 5"); 

 if ( $data['count'] > 0 ) {
   
    $arraydatahome['expertscommon'] = $data['values'] ; 

 }

 $data = getAllData("questions" , "questions_common = 1 LIMIT 5"); 

 if ( $data['count'] > 0 ) {
   
    $arraydatahome['questionscommon'] = $data['values'] ; 

 }

 $data = getAllData("coursesview" , "courses_common = 1 LIMIT 5"); 

 if ( $data['count'] > 0 ) {
   
    $arraydatahome['coursescommon'] = $data['values'] ; 

 }


 $data = getAllData("categories" , "1 = 1 LIMIT 5 "); 

 if ( $data['count'] > 0 ) {
   
    $arraydatahome['categories'] = $data['values'] ; 

 }

 

// echo "<pre>" ; 
// print_r($arraydatahome) ; 
// echo "</pre>" ; 


echo json_encode($arraydatahome) ; 
