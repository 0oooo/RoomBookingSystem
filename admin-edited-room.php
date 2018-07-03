<?php
//function to include partials
require('session-functions.php');
require('view/view-function.php');
require('model/staff.php');
require('model/room.php');
redirect_if_not_signed_in();
$role = 'admin';
redirect_if_no_access($role);

//create short variable names from the data received from the form
$room_num = $_POST['room_num'];
$capacity = $_POST['capacity'];
$room_type_id = $_POST['room_type_id'];

$message = '';

// we are now (re)checking if the entries are filled ..
if( empty($room_num) || empty($capacity) || empty($room_type_id) ) {
    header("Location: admin-room-edit.php?error=missing_value&room_num=$room_num&capacity=$capacity&room_type_id=$room_type_id&");
    exit();
} elseif(!is_numeric($capacity)){
    header("Location: admin-room-edit.php?error=capacity&room_num=$room_num&capacity=$capacity&room_type_id=$room_type_id&");
    exit();
} else {
    $equipment = array();
    if(isset($_POST['whiteboard'])){
        $equipment[] = $_POST['whiteboard'].' = \'Y\'';
    }else{
        $equipment[] = ' whiteboard = \'N\'';
    }
    if(isset($_POST['projector'])){
        $equipment[] = $_POST['projector'].' = \'Y\'';
    }else{
        $equipment[] = ' projector = \'N\'';
    }
    if(isset($_POST['audio_system'])){
        $equipment[] = $_POST['audio_system'].' = \'Y\'';
    }else{
        $equipment[] = 'audio_system = \'N\'';
    }
    if(isset($_POST['telephone'])){
        $equipment[] = $_POST['telephone'].' = \'Y\'';
    }else{
        $equipment[] = 'telephone = \'N\'';
    }
    $equipment = implode(', ', $equipment) ;
    $message = 'Room '.$room_num.' edited.';
    update_room($equipment, $room_num, $room_type_id, $capacity);
    $room_list =  get_room_list();
}

view('Room Edited', 'admin-home', ['message'=>$message, 'origin'=>'room', 'room_list'=>$room_list]);
?>