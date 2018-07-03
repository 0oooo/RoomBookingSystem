<?php
  $error = False;
  if(isset($_GET['error'])){
    $error = $_GET['error'];
  }
?>

<div class="header-content">
  <h2 class="title">Welcome Staff Member</h2>
  <h3 class="subtitle">Prove your identity</h3>
</div>

<form name="login" class="form" method="post" action="login.php" onsubmit="return validateLogin()">
  <div class="username">
    <input type="text" class="input" name="username" placeholder="Enter username">
  </div>
  <div class="password">
    <input type="password" class="input" name="password" placeholder="Enter password">
  </div>
<!--    This div is what js is grabbing and changing if one of its element returns false-->
  <div class="error-message">
    <?php
      if($error == "invalid"){
        echo "Invalid login, try again.";
      }
    ?>
  </div>
  <input type="hidden" name="userType" value="staff">
  <input type="submit" name="submit" value="Sign in" class="button1"/>
  <div class="sign-up">
    <p>Not enrolled? Follow the link. It will only take a few minutes! <a href="staff-sign-up.php">Sign up.</a>
    </p>
</div>
</form>
