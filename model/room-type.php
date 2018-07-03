<?php
require_once('model/db-function.php');

function get_room_type_list(){
    $db = get_connect_db();
    $room_type_query = 'SELECT * FROM room_type';

    return $db->query($room_type_query)->fetch_all(MYSQLI_ASSOC);
}

function get_room_type_by_name($room_type_name){
    $db = get_connect_db();
    $room_type_query = "SELECT * FROM room_type WHERE room_type_name = '".$room_type_name."' ";

    return $result = $db->query($room_type_query)->fetch_all(MYSQLI_ASSOC);
}

function create_room_type($room_type_name){
    $db = get_connect_db();
    $query = "INSERT INTO room_type 
              VALUES (NULL, '{$room_type_name}')";

    return $db->query($query);
}

function delete_room_type_by_name($room_type_name){
    $db = get_connect_db();
    $delete_query = "DELETE FROM room_type WHERE room_type_name = '".$room_type_name."' ";

    return $result = $db->query($delete_query);
}

function update_room_type($room_type_name, $room_type_id){
    $db = get_connect_db();
    $query = "UPDATE room_type SET room_type_name='{$room_type_name}'
                                            WHERE room_type_id='{$room_type_id}'";
    $db->query($query);
}


function delete_room_type_by_id($room_type_id){
    $db = get_connect_db();
    $delete_query = "DELETE FROM room_type WHERE room_type_id = '".$room_type_id."' ";

    return $result = $db->query($delete_query);
}
