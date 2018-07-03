<?php
require_once('model/db-function.php');

$user_log = ' has logged in.';
$user_register = ' has register a new account !';
$user_edit_profile = ' has edited his/her profile.';
$user_delete_profile = ' has deleted his/her profile.';
$user_log_out = ' has logged out.';
$user_booking = ' has made a reservation.';
$user_cancel_booking = ' has canceled a booking.';
$admin_add_room = ' has added a new room.';
$admin_delete_room = ' has deleted a room.';



function add_event_log( $username, $event){
    $ip = $_SERVER['REMOTE_ADDR'];
    $db = get_connect_db();
    $query = "  INSERT INTO `logging`(`logIp`, `logDetail`)
                VALUES ('{$ip}', '{$username}{$event}');";

    return $result = $db->query($query);
}

function display_event_log(){
    $db = get_connect_db();
    $query = "SELECT * FROM `logging` ORDER BY logTime DESC";

    $result = $db->query($query);

    if($result){
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}