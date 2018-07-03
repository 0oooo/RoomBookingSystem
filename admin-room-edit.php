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

$room_num = $_GET['room_num'];
$room = get_room_by_num($room_num)[0];

$capacity = $room['capacity'];
$room_type_id = $room['room_type_id'];
$whiteboard = '';
$projector = '';
$audio_system = '';
$telephone = '';
if($room['whiteboard'] == 'Y'){
    $whiteboard = 'checked';
}
if($room['projector'] == 'Y'){
    $projector = 'checked';
}
if($room['audio_system'] == 'Y'){
    $audio_system = 'checked';
}
if($room['telephone'] == 'Y'){
    $telephone = 'checked';
}
$room_types = get_room_type_list();

$error = False;
$error_message = '';
if(isset($_GET['error'])){
    $error = $_GET['error'];
}
if($error == "room_num"){
    $error_message = "You can not edit the room num.";
}
if($error == "missing_value"){
    $error_message = 'An entry is missing.';
}
if($error == "capacity"){
    $error_message = 'There is a problem with the capacity.';
}

if(isset($_GET['capacity'])){
    $capacity = $_GET['capacity'];
}
if(isset($_GET['room_type_id'])){
    $room_type = $_GET['room_type_id'];
}
// this is an extra trick to change the css of the box of the username when already assigned
$focus = '';
if(isset($_GET['error'])){
    $focus = 'focus';
}

view('Room Edit', 'admin-room-edit', [
    'error'=>$error,
    'error_message'=>$error_message,
    'room_num'=>$room_num,
    'capacity'=>$capacity,
    'room_type_id'=>$room_type_id,
    'room_types'=>$room_types,
    'focus'=>$focus,
    'whiteboard'=>$whiteboard,
    'projector'=> $projector,
    'audio_system'=>$audio_system,
    'telephone'=>$telephone,
    'room'=>$room
]);