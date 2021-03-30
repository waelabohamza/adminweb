<?php 
session_start() ; 
include "ini.php" ;  

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $email    = superFilter($_POST['email']) ; 
    $password = sha1($_POST['password']) ; 
    $count =  signInWithEmailAndPassword("users", "users_email", "users_password",  $email , $password)['count'];
   
   if ($count > 0 ) {

    $_SESSION['email'] = $email  ;
    $_SESSION['password'] = $password  ;
         
    header("Location:pages/home/home.php");
    exit() ; 
         
   }else {
     
    $msg = "Email Or Password Invalid" ; 

   }
}


?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ijraat</title>
    <link href="<?php echo PATH_CSS  ?>bootstrap.css" rel="stylesheet">
    <link href="<?php echo PATH_CSS ?>font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo PATH_CSS ?>nice-select.css" rel="stylesheet">
    <link href="<?php echo PATH_CSS ?>style.css" rel="stylesheet">
    <script src="<?php echo PATH_JS ?>jquery-1.12.1.min.js"></script>
    <script src="<?php echo PATH_JS ?>jquery.nice-select.min.js"></script>
    <script src="<?php echo PATH_JS ?>bootstrap.js"></script>
    <script src="<?php echo PATH_JS ?>style.js"></script>
  </head>

  <body>

<style>
    body {
        background: #eee
    }
</style>

<div class="login">

<h1 class="text-center">  Admin  </h1>
<form  action="<?php  echo $_SERVER['PHP_SELF']  ?> " method="post">
  <input type ="text"     class="form-control "
     name="email" placeholder=" Email " autocomplete="off"/>
  <input type="password " class="form-control " name="password" placeholder="Password"  autocomplete="off" />

  <input type="submit" class="btn btn-block btn-primary btn-lg btnadmin" value="Sign In" />

  <?php if (isset($msg)) {

	echo '<div class="alert alert-info">'.$msg.'</div>' ;

  } ?>

</form>
</div>

<?php 

include "include/footer.php" ; 


?>
