<?php

  require('session-functions.php');
  //functions partial + layout
  require('view/view-function.php');


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

//if the username is already assigned, we get it and pass it to the variable username
  $username = '';
  if(isset($_GET['username'])){
    $username = $_GET['username'];
  }
//same with first_name
  $first_name = '';
  if(isset($_GET['first_name'])){
    $first_name = $_GET['first_name'];
  }
// and with last_name
  $last_name = '';
  if(isset($_GET['last_name'])){
    $last_name = $_GET['last_name'];
  }
//and with phone number
  $phone = '';
  if(isset($_GET['phone'])){
    $phone = $_GET['phone'];
  }
// this is an extra trick to change the css of the box of the username when already assigned
  $focus = '';
  if(isset($_GET['error'])){
    $focus = 'focus';
  }

    view('Staff sign up', 'staff-sign-up', [
      'error'=>$error,
      'error_message'=>$error_message,
      'username'=>$username,
      'first_name'=>$first_name,
      'last_name'=>$last_name,
      'phone'=>$phone,
      'focus'=>$focus,
    ]);
?>
