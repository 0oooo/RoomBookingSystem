<?php

require_once('session-functions.php');
require_once('view/view-function.php');
require_once('model/staff.php');
require_once('model/room.php');
require_once('model/booking.php');
$role = 'staff';
redirect_if_no_access($role);

redirect_if_not_signed_in();
$room_num = '';
if(isset($_GET['room_num'])){
    $room_num = $_GET['room_num'];
}
//print_r(search_room_by_num($room_num)[0]['room_type_name']);
// this is how I get the 0 index from but not sure why I need that.
$room_name = search_room_by_num($room_num)[0]['room_type_name'];
$room_capacity = search_room_by_num($room_num)[0]['capacity'];

$booking_list = get_booking_by_room($room_num);


$message = '';

if(isset($_GET['error'])){
    $error = $_GET['error'];
    if($error == "invalid"){
        $message = "The date you have entered is invalid, try again.";
    }if($error == "taken"){
        $message = "There are already reservations for the selected date.";
    }if($error == "bookings"){
        $message = " You can't have more than two bookings. Please cancel one or wait for your upcoming bookings to end";
    }
}



view('Booking room', 'booking-room', ['booking_list'=>$booking_list,
                                                    'room_num'=>$room_num,
                                                    'room_name'=>$room_name,
                                                    'capacity'=>$room_capacity, 'message'=>$message]);

// TODO : stop the selection for saturdays / sundays / public holidays