<?php
require('session-functions.php');
//functions partial + layout
require('view/view-function.php');
require_once('model/room-type.php');
redirect_if_not_signed_in();
$role = 'admin';
redirect_if_no_access($role);

$error = False;
$error_message = '';
if(isset($_GET['error'])){
    $error = $_GET['error'];
}
if($error == "room_num_taken"){
    $error_message = "This room number is already used for a room.";
}
if($error == "missing_value"){
    $error_message = 'An entry is missing.';
}
if($error == "capacity"){
    $error_message = 'Please enter a realistic number of person.';
}


//if the room num is already assigned, we get it and pass it
$room_num = '';
if(isset($_GET['room_num'])){
    $room_num = $_GET['room_num'];
}
// same with capacity
$capacity = '';
if(isset($_GET['capacity'])){
    $capacity = $_GET['capacity'];
}

$room_type_id = '';
if(isset($_GET['room_type_id'])){
    $room_type_id = $_GET['room_type_id'];
}

// this is an extra trick to change the css of the box of the room num when already assigned
$focus = '';
if(isset($_GET['error'])){
    $focus = 'focus';
}

$room_types = get_room_type_list();


view('New Room', 'admin-new-room', [
    'error'=>$error,
    'error_message'=>$error_message,
    'room_num'=>$room_num,
    'room_types'=>$room_types,
    'room_type_id'=>$room_type_id,
    'capacity'=>$capacity,
    'focus'=>$focus,
]);
?>
