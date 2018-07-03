<?php
//function to include partials
require('session-functions.php');
require('view/view-function.php');
require('model/staff.php');
require('model/event-log.php');
require_once('model/room.php');
redirect_if_not_signed_in();
$role = 'admin';
redirect_if_no_access($role);

//create short variable names from the data received from the form
$room_num = $_POST['room_num'];
$room_type_id = $_POST['room_type_id'];
$capacity = $_POST['capacity'];
$username = $_SESSION['name'];

$message = '';

// we are now (re)checking if the entries are filled ..
if( empty($room_num) || empty($room_type_id) || empty($capacity) ){
    header("Location: admin-new-room.php?error=missing_value&room_num=$room_num&room_type_id=$room_type_id&capacity=$capacity");
    exit();
}
elseif( !is_numeric($capacity)){
    header("Location: admin-new-room.php?error=capacity&room_num=$room_num&room_type_id=$room_type_id&capacity=$capacity");
    exit();
}

//now we'll check if the room name already exists in the database
$room_name_results = get_room_type_name($room_num);
if ($room_name_results)
{
    header("Location: admin-new-room.php?error=room_type_name_taken&room_num=$room_num&room_type_id=$room_type_id&capacity=$capacity");
    exit();
}
else {
    $equipment = array();
    $yes = array();
    if(isset($_POST['whiteboard'])){
        $equipment[] = $_POST['whiteboard'];
        $yes[] = 'Y';
    }
    if(isset($_POST['projector'])){
        $equipment[] = $_POST['projector'];
        $yes[] = 'Y';
    }
    if(isset($_POST['audio_system'])){
        $equipment[] = $_POST['audio_system'];
        $yes[] = 'Y';
    }
    if(isset($_POST['telephone'])){
        $equipment[] = $_POST['telephone'];
        $yes[] = 'Y';
    }
    $equipment = implode(', ', $equipment) ;
    $yes = implode('\', \'', $yes) ;
    $message = 'You have successfully added a room!';
    if(strlen($equipment) > 1){
        create_room_with_equipment($equipment, $room_num, $room_type_id, $capacity, $yes);
    }else{
       create_room_no_equipment($room_num, $room_type_id, $capacity);
    }
    add_event_log($username, $admin_add_room);
    view('New Room', 'admin-home',['message'=>$message]);
    exit();
}

view('New Room', 'new-room-finalised',['message'=>$message]);

?>
