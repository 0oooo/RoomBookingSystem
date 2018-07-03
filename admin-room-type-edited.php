<?php
//function to include partials
require('session-functions.php');
require('view/view-function.php');
require('model/staff.php');
require('model/room.php');
require('model/room-type.php');
redirect_if_not_signed_in();
$role = 'admin';
redirect_if_no_access($role);

$room_type_name = $_GET['room_type_name'];
$room_type_id = $_GET['room_type_id'];
$message = '';

if(empty($room_type_name)){
    header("Location: admin-room-type-edit.php?error=missing_value");
    exit();
}
$room_type_result = get_room_type_by_name($room_type_name);


if($room_type_result) {
    header("Location: admin-room-type-edit.php?error=room_type_name_taken");
    exit();
}else {
    $message = 'Room type edited.';
    update_room_type($room_type_name, $room_type_id);
    $room_types = get_room_type_list();
}

view('Room Edited', 'admin-new-room-type', ['message'=>$message,
                                                            'room_types'=>$room_types]);
?>
