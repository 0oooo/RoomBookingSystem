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

$room_types = '';
$room_type_id = '';
if(isset($_GET['room_type_name'])){
    $room_types = $_GET['room_type_name'] ;
    $room_type_id =  get_room_type_by_name($room_types)[0]['room_type_id'];
}

$error = False;
$error_message = '';
if(isset($_GET['error'])){
    $error = $_GET['error'];
}
if($error == "missing_value"){
    $error_message = 'An entry is missing.';
}
if($error == "room_type_name_taken"){
    $error_message = 'This room type already exists.';
}


view('Room Edit', 'admin-room-type-edit', [
    'error'=>$error,
    'error_message'=>$error_message,
    'room_type_name'=>$room_types,
    'room_type_id'=>$room_type_id
]);