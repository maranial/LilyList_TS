<?php 
  session_start();

echo <<<_INIT
<!DOCTYPE html> 
<html>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'> 
    <link rel='stylesheet' href='jquery.mobile-1.4.5.min.css'>
    <link rel='stylesheet' href='styles.css' type='text/css'>
   <link href="https://fonts.googleapis.com/css?family=Playfair+Display|Raleway" rel="stylesheet">
    <script src='javascript.js'></script>
    <script src='jquery-2.2.4.min.js'></script>
    <script src='jquery.mobile-1.4.5.min.js'></script>


_INIT;

  require_once 'functions.php';

  $userstr = 'Make a <strong>list</strong> here today with Lily!';

  if (isset($_SESSION['user']))
  {
    $user     = $_SESSION['user'];
    $loggedin = TRUE;
    $userstr  = "Hello, $user";
  }
  else $loggedin = FALSE;

echo <<<_MAIN
    <title>Lily's List: $userstr</title>
  </head>
  <body>
    <div data-role='page' style='background:#D1F2EB;color:#5D6D7E;'>
      <div data-role='header'>
        <br>
        <br>
      
        <div class="center" style="font-family: 'Playfair Display', serif;font-weight: bold;font-size: 120px;color: #76D7C4;">Lily's List</div>
        <br>
        <br>
        
        <div class="center" style="font-family:'Raleway', sans-serif;font-size:14pt;color      :#D35400;border:solid 2px #fff;padding:4px">$userstr</div>
      </div>
      <div data-role='content'>

_MAIN;

  if ($loggedin)
  {
echo <<<_LOGGEDIN
        <div class='center'>

          <br>
          
          <a data-role='button'  data-inline='true' data-icon='home'
            data-transition="slide" href='members.php?view=$user' style='background:#E8F8F5;color:#148F77;'>Home</a>
      
          
          <a data-role='button' data-inline='true' data-icon='bullets'
            data-transition="slide" href='lists.php' style='background:#E8F8F5;color:#148F77;'>To-Do List</a>
          <a data-role='button' data-inline='true' data-icon='edit'
            data-transition="slide" href='profile.php' style='background:#E8F8F5;color:#148F77;'>Edit Profile</a>
          <a data-role='button' data-inline='true' data-icon='lock'
            data-transition="slide" href='logout.php' style='background:#E8F8F5;color:#148F77;'>Log out</a>
        </div>
        
        
_LOGGEDIN;
  }
  else
  {
echo <<<_GUEST
        <div class='center'>

          <br>
          
          <a data-role='button' data-inline='true' data-icon='home'
            data-transition='slide'  href='index.php' style='background:#E8F8F5;color:#148F77;'>Home</a>
          <a data-role='button' data-inline='true' data-icon='plus'
            data-transition="slide" href='signup.php' style='background:#E8F8F5;color:#148F77;'>Sign Up</a>
          <a data-role='button' data-inline='true' data-icon='check'
            data-transition="slide" href='login.php' style='background:#E8F8F5;color:#148F77;'>Log In</a>
        </div>

        
_GUEST;
  }

?>
