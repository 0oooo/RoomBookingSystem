<?php

/*
 * Create and return new database instance
 * (displays error when database creation fails)
 */
function get_connect_db(){
  //connect to database
  @$db = new mysqli('localhost', 'root', '', 'assignment1');

  if (mysqli_connect_error())
  { //display the details of any connection errors
      echo 'Error connecting to database:<br />'.mysqli_connect_error();
      exit;
  }
  return $db;
}
?>
