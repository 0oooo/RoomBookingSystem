<?php
require('model/db-function.php');
//create short variable names from the data received from the form
$username = $_POST['username'];
$password = $_POST['password'];
//check if the submitted username and password exist in the database
$queryId = "SELECT * FROM admin WHERE username LIKE '".$username."' AND password LIKE '".$password."'";
$queryResult = $db->query($queryId);
if ($queryResult->num_rows == 0){
  header("Location: admin-sign-in.php?error=invalid");
  die();
}
?>

<div class="title">
  <h2>Welcome <?php $username ?></h2>
</div>
