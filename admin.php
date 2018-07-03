<?php
  //function to include partials
  require('session-functions.php');
  require('view/view-function.php');
  view('Admin page', 'admin', []);
  $role = 'admin';
  redirect_if_no_access($role);
?>
