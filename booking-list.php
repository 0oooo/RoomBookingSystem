<?php

require('session-functions.php');
require('view/view-function.php');
require('model/staff.php');
require('model/booking.php');
redirect_if_not_signed_in();
$role = 'admin';
redirect_if_no_access($role);

$staff_id = '';
$staff_name = '';
$room_num = '';
$booking_list = '';

if(isset($_GET['staff_id'])){
    $staff_id = $_GET['staff_id'];
    $staff_name = get_staff_name($staff_id)['name'];
    $booking_list =  get_all_booking($staff_id);
    $message = '';
    if(isset($_GET['cancel'])){
        $booking_num = $_GET['booking_num'];
        $room_num = get_room_name_by_booking_number($booking_num)['room_num'];
        cancel_booking($booking_num, $staff_id);
        $booking_list =  get_all_booking($staff_id);

// TODO add ' for the room '.$room_num.'' ?
        $message = 'You have cancelled the booking number '.$booking_num.'';
    }
    view('Booking list', 'booking-list', ['booking_list'=>$booking_list, 'staff_name'=>$staff_name, 'room_num'=>$room_num, 'staff_id'=>$staff_id, 'message'=>$message]);

}if(isset($_GET['room_num'])){
    $room_num = $_GET['room_num'];
    $booking_list =  get_all_booking_by_room($room_num);
    $message = '';
    if(isset($_GET['cancel'])){
        $room_num = $_GET['room_num'];
        $start_date = $_GET['start_date'];
        $end_date = $_GET['end_date'];
        $booking_num = get_booking_num_by_room_and_date($room_num,  $start_date, $end_date);
        $booking_num = $booking_num[0]['booking_num'];
        $staff_id = get_staff_id_by_room_and_date($room_num, $start_date, $end_date)[0]['staff_id'];
        print_r($staff_id);
        cancel_booking($booking_num, $staff_id);
        $booking_list =  get_all_booking_by_room($room_num);

// TODO add ' for the room '.$room_num.'' ?
        $message = 'You have cancelled a booking.';
    }
    view('Booking list', 'booking-list', ['booking_list'=>$booking_list, 'staff_name'=>$staff_name, 'room_num'=>$room_num, 'staff_id'=>$staff_id, 'message'=>$message]);
//
//    view('Booking list', 'booking-list', ['booking_list'=>$booking_list, 'staff_name'=>$staff_name, 'room_num'=>$room_num, 'staff_id'=>$staff_id, 'message'=>$message]);
}






