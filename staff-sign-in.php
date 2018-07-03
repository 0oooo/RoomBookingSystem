<?php
  //function to include partials
  require('session-functions.php');
  require('view/view-function.php');
  if(check_if_signed_in()){
    header ("Location: staff-home.php");
  }else{
    view('Staff sign in', 'staff-sign-in', []);
  }
?>
