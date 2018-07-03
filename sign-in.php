<?php
  //function to include partials
  require('session-functions.php');
  require('view/view-function.php');

  $message = '';
  if(isset($_GET['message']) && $_GET['message'] == 'logout'){
    $message = 'You have logged out';
  }
  if(isset($_GET['message']) && $_GET['message'] == 'kill'){
    $message = 'You have deleted your account.';
  }

  view('ECU Room Booking System', 'sign-in', ['message'=>$message]);

?>
