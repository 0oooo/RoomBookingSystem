<?php
  //function to include partials
  require('session-functions.php');
  require('view/view-function.php');


if(check_if_signed_in()){
    header ("Location: admin-home.php");
}else {
    view('Admin Sign in', 'admin-sign-in', []);
}
?>
