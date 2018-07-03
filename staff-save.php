<?php
  //function to include partials
  require('session-functions.php');
  require('view/view-function.php');
  require('model/staff.php');
  require('model/event-log.php');
  redirect_if_not_signed_in();
  $role = 'staff';
  redirect_if_no_access($role);

  //create short variable names from the data received from the form
  $staff_id = $_POST['staff_id'];
  $username = $_POST['username'];
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];


  $message = '';

  // we are now (re)checking if the entries are filled ..
    if( empty($username) || empty($first_name) || empty($last_name) || empty($phone) || empty($password) || empty($confirmPassword)){
        header("Location: staff-edit.php?error=missing_value&username=$username&first_name=$first_name&last_name=$last_name&phone=$phone&password=superstronglyencryptedpasswordyoucantseeit");
        exit();
  //if the password is long enough
     } elseif(strlen($password) < 5){
       header("Location: staff-edit.php?error=weak_password&username=$username&first_name=$first_name&last_name=$last_name&phone=$phone&password=superstronglyencryptedpasswordyoucantseeit");
       exit();
  //if the password match
     } elseif($password != $confirmPassword){
       header("Location: staff-edit.php?error=non_matching_password&username=$username&first_name=$first_name&last_name=$last_name&phone=$phone&password=superstronglyencryptedpasswordyoucantseeit");
       exit();
     }

     //now we'll check if the username already exists in the database
     $username_results = get_staff_by_username($username);
     if ($username_results && $staff_id != $username_results['staff_id']){
       header("Location: staff-edit.php?error=username_taken&username=$username&first_name=$first_name&last_name=$last_name&phone=$phone&password=superstronglyencryptedpasswordyoucantseeit");
       exit();
     }
     else {
        $message = 'Profile edited.';
        update_staff($staff_id, $username, $first_name, $last_name, $phone, $password);
        set_session_variable('username', $username);
        set_session_variable('name', $first_name.' '.$last_name);
        add_event_log($username, $user_edit_profile);
     }


  view('Staff Edited', 'staff-save', ['message'=>$message]);
?>
