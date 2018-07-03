<?php

require('model/booking.php');
require('model/event-log.php');
require('session-functions.php');
$role = 'staff';
redirect_if_no_access($role);

$booking_num = $_GET['booking_num'];
$staff_id = $_GET['staff_id'];
$username = $_SESSION['username'];

if(cancel_booking($booking_num, $staff_id)){
    add_event_log( $username, $user_cancel_booking);
    header ('Location: staff-home.php');
}

