<?php
  //function to include partials
  require('session-functions.php');
  require('view/view-function.php');
  require('model/staff.php');
  redirect_if_not_signed_in();
  $role = 'staff';
  redirect_if_no_access($role);


  $username = $_SESSION['username'];
//we are getting the information requested by the person who clicked on edit thanks to the session
  $staff = get_staff_by_username($username);
  $staff_id = $staff['staff_id'];
  $username = $staff['username'];
  $first_name = $staff['first_name'];
  $last_name = $staff['last_name'];
  $phone = $staff['phone'];

    // we are checking if we arrived on this file after an error (the full page is designed for that)
    $error = False;
    $error_message = '';
    if(isset($_GET['error'])){
      $error = $_GET['error'];
    }
    //we are checking the value of the error message to write the corresponding error message
      if($error == "username_taken"){
       $error_message = "This username is already taken, please select another one.";
      }
      if($error == "missing_value"){
        $error_message = 'An entry is missing.';
      }
      if($error == "weak_password"){
        $error_message = 'Your password is not long enough.';
      }
      if($error == "non_matching_password"){
        $error_message = 'Your passwords do not match.';
      }

      //if the username has been changed, we re-assigned the variable to the change
        if(isset($_GET['username'])){
          $username = $_GET['username'];
        }
      //same with first_name
        if(isset($_GET['first_name'])){
          $first_name = $_GET['first_name'];
        }
      // and with last_name
        if(isset($_GET['last_name'])){
          $last_name = $_GET['last_name'];
        }
      //and with phone number
        if(isset($_GET['phone'])){
          $phone = $_GET['phone'];
        }
      // this is an extra trick to change the css of the box of the username when already assigned
        $focus = '';
        if(isset($_GET['error'])){
          $focus = 'focus';
        }
    //once we have either our variables assigned to the session variables
    //either assigned to what the person has been editing
        view('Staff Edit', 'staff-edit', [
          'error'=>$error,
          'error_message'=>$error_message,
          'staff_id'=>$staff_id,
          'username'=>$username,
          'first_name'=>$first_name,
          'last_name'=>$last_name,
          'phone'=>$phone,
          'focus'=>$focus]);
  ?>
