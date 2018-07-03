<?php
//function to include partials
require('session-functions.php');
require('view/view-function.php');
require('model/staff.php');
require_once('model/room-type.php');
redirect_if_not_signed_in();
$role = 'admin';
redirect_if_no_access($role);

$room_type_name = $_POST['room_type_name'];
$message = '';

if( empty($room_type_name)){
    header("Location: admin-new-room-type.php?error=missing_value");
    exit();
}

$room_type_result = get_room_type_by_name($room_type_name);

if($room_type_result){
    header("Location: admin-new-room-type.php?error=room_type_name_taken");
    exit();
}else {
    $message = 'You have successfully added a room type!';
    create_room_type( $room_type_name);
}


view('New Room', 'admin-home',['message'=>$message]);

?>