<?php

  require('session-functions.php');
  require('model/event-log.php');
  $username = $_GET['username'];
  add_event_log($username,$user_log_out);
  logout();
  header ("Location: sign-in.php?message=logout");
  die();

?>
