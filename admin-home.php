<?php
require('session-functions.php');
require('view/view-function.php');
require('model/staff.php');
require('model/room.php');
require('model/event-log.php');
require('model/booking.php');
redirect_if_not_signed_in();
$role = 'admin';
redirect_if_no_access($role);


$staff_list = get_all_staff();
$room_list =  get_room_list();
$message = '';
$username = $_SESSION['name'];
$prompt = '';

if(isset($_GET['cancel'])){
    $room_num = $_GET['room_num'];
    $has_booking = get_all_booking_by_room($room_num);
    if($has_booking){
//        if(sizeof($has_booking) == 1){
//            $prompt = ' - please notice there is one booking for this room - ';
//        }if(sizeof($has_booking) > 1){
//            $prompt = ' - please notice there are several bookings for this room - ';
//        }
        cancel_booking_by_room($room_num);
        $message = 'You have deleted room '.$room_num.' and the booking(s) associated to it';
        delete_room_by_number($room_num);
        add_event_log($username, $admin_delete_room);
        $room_list =  get_room_list();
    }else{
        $message = 'You have deleted room '.$room_num.'';
        delete_room_by_number($room_num);
        add_event_log($username, $admin_delete_room);
        $room_list =  get_room_list();
    }
}
if (isset($_GET['origin'])) {
    $origin = $_GET['origin'];
    view('Admin home', 'admin-home',
        ['origin' => $origin, 'staff_list' => $staff_list, 'room_list'=>$room_list, 'message'=>$message]);
} else {
    if(isset($_GET['message'])){
        $message = $_GET['message'];
        echo $value['username'];
    }
    view('Signed in Admin', 'admin-home', ['message'=>$message, 'prompt'=>$prompt]);
}


?>
