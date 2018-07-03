<?php
  $error = False;
  if(isset($_GET['error'])){
    $error = $_GET['error'];
  }
?>

<div class="header-content">
  <h2 class="title">Welcome Admin</h2>
  <h3 class="subtitle">Prove your identity</h3>
</div>

<form name="login" class="form" method="post" action="login.php" onsubmit="return validateLogin()">
  <div class="username">
    <input type="text" class="input" name="username" placeholder="Type your username here">
  </div>
  <div class="password">
    <input type="password" class="input" name="password" placeholder="Type your password here">
  </div>
  <div class="error-message">
    <?php
      if($error == "invalid"){
        echo "Invalid login, try again.";
      }
    ?>
  </div>
    <input type="hidden" name="userType" value="admin">
    <input type="submit" name="admin" value="Sign in" class="button1"/>
</form>
