<?php
require_once('model/db-function.php');

function get_room_list(){
  $db = get_connect_db();
  $room_query = "SELECT r.room_num, rt.room_type_name, r.capacity, r.whiteboard, r.projector, r.audio_system, r.telephone, COUNT(b.booking_num) AS booking
             FROM room AS r 
             INNER JOIN room_type AS rt 
             ON r.room_type_id=rt.room_type_id
             LEFT JOIN booking AS b
             ON b.room_num = r.room_num
             GROUP BY  r.room_num, rt.room_type_name, r.capacity, r.whiteboard, r.projector, r.audio_system, r.telephone
             ORDER BY r.room_num";

  return $db->query($room_query)->fetch_all(MYSQLI_ASSOC);
  // fetch_assoc only returns a result so changed for fetch_all
  // to know more http://php.net/manual/en/mysqli-result.fetch-all.php
}
function search_room_by_num($room_search){
  $db = get_connect_db();
  $room_query = "SELECT room.room_num, room_type.room_type_name, room.capacity, room.whiteboard, room.projector, 
                        room.audio_system, room.telephone
                 FROM room
                 INNER JOIN room_type ON room.room_type_id=room_type.room_type_id
                 WHERE room.room_num LIKE '%".$room_search."%'
                 OR room_type.room_type_name LIKE '%".$room_search."%'
                 OR room.capacity = '{$room_search}' ;";
  // if I have time to change the search for room capacity, change the == to =<

  $result = $db->query($room_query);

  if($result){
    return $result->fetch_all(MYSQLI_ASSOC);
  } else{
    return [];
  }
}

function get_room_type_name($room_name){
    $db = get_connect_db();
    $room_type_query = "SELECT * FROM room WHERE room_type_name = '".$room_name."' ";

    $result = $db->query($room_type_query);
    if($result){
        return $result->fetch_assoc();
    }else{
        return [];
    }
}

function create_room_no_equipment($room_num, $room_type_id, $capacity){
    $db = get_connect_db();
    $query = "INSERT INTO `room` (room_num, room_type_id, capacity) 
              VALUES ('{$room_num}', '{$room_type_id}', '{$capacity}')";

    return $db->query($query);
}

function create_room_with_equipment($equipment, $room_num, $room_type_id, $capacity, $yes){
    $db = get_connect_db();
    $query = "INSERT INTO `room` (room_num, room_type_id, capacity, {$equipment}) 
              VALUES ('{$room_num}', '{$room_type_id}', '{$capacity}', '{$yes}')";

    return $db->query($query);
}

function delete_room_by_number($room_num){
    $db = get_connect_db();
    $query = "DELETE FROM `room` WHERE room_num = '{$room_num}' ";

    return $db->query($query);
}

function get_room_by_type($room_type){
    $db = get_connect_db();
    $room_query = "SELECT * FROM room 
                   WHERE room_type_id = (SELECT room_type_id FROM room_type
                                            WHERE room_type_name = '{$room_type}');";

    $result = $db->query($room_query);
    if($result){
        return $result->fetch_all(MYSQLI_ASSOC);
    } else{
        return [];
    }
}

function get_room_by_num($room_num){
    $db = get_connect_db();
    $room_type_query = "SELECT * FROM room WHERE room_num = '".$room_num."' ";

    return $result = $db->query($room_type_query)->fetch_all(MYSQLI_ASSOC);
}

function update_room($equipment, $room_num, $room_type_id, $capacity){
    $db = get_connect_db();
    $query = "UPDATE room SET capacity={$capacity}, room_type_id={$room_type_id}, $equipment
                                            WHERE room_num='{$room_num}'";
   $db->query($query);
   // return $query;
}

function get_room_from_equipment($equipment){
    $db = get_connect_db();
    $query = "SELECT * FROM room
             INNER JOIN room_type ON room.room_type_id=room_type.room_type_id
              WHERE {$equipment} ";

    $result = $db->query($query);
    if($result){
        return $result->fetch_all(MYSQLI_ASSOC);
    } else{
        return [];
    }
}