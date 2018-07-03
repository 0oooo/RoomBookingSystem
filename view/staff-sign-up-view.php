  <div class="header-content">
    <h2 class="subtitle">Enrol in the ECU booking system</h2>
  </div>

  <form name="newStaffForm" class="form" method="post" action="new-staff.php" onsubmit="return validateForm()">
      <input class="form-input  <?php echo $value['focus'] ?>" name="username" type="text" placeholder="Username" maxlength="50" value="<?php echo $value['username'] ?>">
      <div class="error-message">
      <?php echo $value['error_message'] ?>
      </div>
      <input class="form-input" name="first_name" type="text" placeholder="First name" maxlength="50" value="<?php echo $value['first_name'] ?>" >
      <input class="form-input" name="last_name" type="text" placeholder="Last name" maxlength="50" value="<?php echo $value['last_name'] ?>">
      <input class="form-input" name="phone" type="text" placeholder="Phone number" maxlength="4" value="<?php echo $value['phone'] ?>">
      <input class="form-input" name="password" type="password" placeholder="Password" maxlength="100" value="">
      <input class="form-input" name="confirmPassword" type="password" placeholder="Please enter password again" maxlength="100">
      <input class="submit-button" type="submit" name="submit" value="Submit"/>
  </form>
