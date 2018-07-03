<?php
  //function to include partials
  require('session-functions.php');
  require('view/view-function.php');
  require('model/staff.php');
require('model/event-log.php');
  redirect_if_not_signed_in();
  $role = 'staff';
  redirect_if_no_access($role);

  $username = $_SESSION['username'];
  $staff = get_staff_by_username($username);
  $staff_id = $staff['staff_id'];
  $username = $staff['username'];
  $first_name = $staff['first_name'];
  $last_name = $staff['last_name'];
  $phone = $staff['phone'];

  $action = '';
  if(isset($_POST['delete'])){
    $action = $_POST['delete'];
  }

  if($action == 'cancel'){
    header("Location: staff-home.php");
    die();
  }
  if($action == 'delete'){
      add_event_log($username,$user_delete_profile);
      logout();
      delete_staff($staff_id);
    header("Location: sign-in.php?message=kill");
  }

  view('Staff Delete', 'staff-delete', [
    'staff_id'=>$staff_id,
    'username'=>$username,
    'first_name'=>$first_name,
    'last_name'=>$last_name,
    'phone'=>$phone
  ]);
