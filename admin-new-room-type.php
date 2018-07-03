<?php
require('session-functions.php');
//functions partial + layout
require('view/view-function.php');
require_once('model/room-type.php');
require_once('model/room.php');
redirect_if_not_signed_in();
$role = 'admin';
redirect_if_no_access($role);


$error = False;
$message = '';
if(isset($_GET['error'])){
    $error = $_GET['error'];
}
if($error == "missing_value"){
    $message = 'An entry is missing.';
}
if($error == "room_type_name_taken"){
    $message = 'This room type already exists.';
}

$room_type_name = '';
if(isset($_GET['room_type_name'])){
    $room_type_name = $_GET['room_type_name'];
}

$room_types = get_room_type_list();

if(isset($_GET['cancel'])){
    $room_type_name = $_GET['room_type_name'];
    $has_room = get_room_by_type($room_type_name);
    if($has_room){
        $message = 'You can\'t delete this room type as there are rooms linked to it.';
    }else{
        $message = 'You have deleted the room type '.$room_type_name.'';
        delete_room_type_by_name($room_type_name);
        $room_types =  get_room_type_list();
    }
}

view('New Room', 'admin-new-room-type', [
    'error'=>$error,
    'message'=>$message,
    'room_types'=>$room_types,
    'room_type_name'=>$room_type_name
]);
?>
