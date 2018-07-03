<?php

  require('session-functions.php');
  require('view/view-function.php');
  require('model/staff.php');
  require('model/booking.php');
  redirect_if_not_signed_in();
  $role = 'staff';
  redirect_if_no_access($role);

  $username = $_SESSION['username'];
  $staff = get_staff_by_username($username);
  $staff_id = $staff['staff_id'];

  $booking_list = get_all_booking($staff_id);
  $name = get_session_variable('name');

  view('Signed in Staff', 'staff-home', ['booking_list'=>$booking_list,
                                                       'name'=>$name,
                                                       'staff_id'=>$staff_id]);

// TODO :Add a button " search by name / search by number