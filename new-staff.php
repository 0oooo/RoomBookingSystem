<?php
  //function to include partials
  require('session-functions.php');
  require('view/view-function.php');
  require('model/staff.php');
require('model/event-log.php');

  //create short variable names from the data received from the form
  $username = $_POST['username'];
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];

  $message = '';

// we are now (re)checking if the entries are filled ..
  if( empty($username) || empty($first_name) || empty($last_name) || empty($phone) || empty($password) || empty($confirmPassword)){
      header("Location: staff-sign-up.php?error=missing_value&username=$username&first_name=$first_name&last_name=$last_name&phone=$phone&password=superstronglyencryptedpasswordyoucantseeit");
      exit();
//if the password is long enough
   } elseif(strlen($password) < 5){
     header("Location: staff-sign-up.php?error=weak_password&username=$username&first_name=$first_name&last_name=$last_name&phone=$phone&password=superstronglyencryptedpasswordyoucantseeit");
     exit();
//if the password match
   } elseif($password != $confirmPassword){
     header("Location: staff-sign-up.php?error=non_matching_password&username=$username&first_name=$first_name&last_name=$last_name&phone=$phone&password=superstronglyencryptedpasswordyoucantseeit");
     exit();
   }

  //now we'll check if the username already exists in the database
  $username_results = get_staff_by_username($username);
  if ($username_results)
  {
    header("Location: staff-sign-up.php?error=username_taken&username=$username&first_name=$first_name&last_name=$last_name&phone=$phone&password=superstronglyencryptedpasswordyoucantseeit");
    exit();
  }
  else {
     $message = 'You have succesfully signed up!';
     create_staff($username, $first_name, $last_name, $phone, $password);
     add_event_log($username, $user_register);
  }

  view('New Staff', 'new-staff',['message'=>$message]);

?>
