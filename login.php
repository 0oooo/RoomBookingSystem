<?php
  //function to include partials
  require('view/view-function.php');
  require('model/staff.php');
  require('session-functions.php');
  require('model/event-log.php');

  //create short variable names from the data received from the form in staff-sign-in-view
  $username = $_POST['username'];
  $password = $_POST['password'];
  $userType = $_POST['userType'];
  //$staff_member = get_staff_by_username_and_password($username, $password);
  //call the function from staff to check if the username and password entered
  //are in the DB. We also pass the userType than we are using along this page
  $member = get_member_by_username_and_password($username, $password, $userType);
//if member doesnt return anything, we go back to the sign in page/ either staff or admin
  if (!$member) {
    header("Location: ".$userType."-sign-in.php?error=invalid");
    die();
//otherwise we start a session, set the username variable, pass the userType variable
  } else {
    set_session_variable('username', $member['username']);
    set_session_variable('userType', $userType);
//if its a staff, we set the name to welcome him/her and we go on the
    if($userType == 'staff'){
      set_session_variable('name', $member['first_name'].' '.$member['last_name']);
      add_event_log($username, $user_log);
      header ('Location: staff-home.php');

    }else{
      set_session_variable('name', $member['username']);
      add_event_log($username, $user_log);
      header ('Location: admin-home.php');
    }

  }


?>
