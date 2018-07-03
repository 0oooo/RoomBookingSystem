<?php
//PB : WHEN I CALL BOOKING AND STAFF, IT DOES NOT LIKE TO HAVE BOTH DB FUNCTION REQUIRED (its like Im redefining it... stupid php)
// UPDATE: require_once is identical to require except PHP will check if the file has already been included (http://php.net/manual/en/function.require-once.php)
require_once('model/db-function.php');

function get_all_booking($staff_id){
    $db = get_connect_db();
    $booking_query = " SELECT start_time, end_time, room_num, booking_num FROM `booking` 
                       WHERE DATE(`start_time`) >= NOW()
                       AND staff_id = '{$staff_id}'
                       ORDER BY start_time;";

    $result = $db->query($booking_query);

    if($result){
        return $result->fetch_all(MYSQLI_ASSOC);
    } else{
        return [];
    }
}

function cancel_booking($booking_num, $staff_id){
    $db = get_connect_db();
    $booking_query = "DELETE FROM `booking`
                      WHERE `booking_num` = '{$booking_num}'
                      AND `staff_id` = '{$staff_id}'
                      ;";

    $result = $db->query($booking_query);
    return $result;
}

function get_booking_by_room($room_num){
    $db = get_connect_db();
    $booking_query = "SELECT booking.start_time, booking.end_time, booking.room_num, CONCAT(staff.first_name, ' ', staff.last_name) AS s_name
                      FROM booking
                      INNER JOIN staff ON booking.staff_id=staff.staff_id 
                      WHERE room_num = '{$room_num}'
                      AND booking.start_time >= NOW()
                      ORDER BY booking.start_time;";

    $result = $db->query($booking_query);
    if($result){
        return $result->fetch_all(MYSQLI_ASSOC);
    } else{
        return [];
    }
}

function get_all_booking_by_room($room_num){
    $db = get_connect_db();
    $booking_query = "SELECT booking.start_time, booking.end_time, booking.room_num, CONCAT(staff.first_name, ' ', staff.last_name) AS s_name
                      FROM booking
                      INNER JOIN staff ON booking.staff_id=staff.staff_id 
                      WHERE room_num = '{$room_num}'
                      ORDER BY booking.start_time;";

    $result = $db->query($booking_query);
    if($result){
        return $result->fetch_all(MYSQLI_ASSOC);
    } else{
        return [];
    }
}

function get_booking_num_by_room_and_date($room_num, $start_date, $end_date){
    $db = get_connect_db();
    $booking_query = "SELECT booking_num
                      FROM booking
                      WHERE room_num = '{$room_num}' AND start_time =  '{$start_date}' AND end_time = '{$end_date}'";

    $result = $db->query($booking_query);
    if($result){
        return $result->fetch_all(MYSQLI_ASSOC);
    } else{
        return [];
    }
}

function get_staff_id_by_room_and_date($room_num, $start_date, $end_date){
    $db = get_connect_db();
    $booking_query = "SELECT staff_id FROM booking
                      WHERE room_num = '{$room_num}'
                      AND start_time = '{$start_date}'
                      AND end_time = '{$end_date}'";

    $result = $db->query($booking_query);
    if($result){
        return $result->fetch_all(MYSQLI_ASSOC);
    } else{
        return [];
    }
}


function get_room_name_by_booking_number($booking_num){
    $db = get_connect_db();
    $room_query = "SELECT room_num FROM booking where booking_num = '.$booking_num.'";
    $result = $db->query($room_query);

   return $result->fetch_assoc();
}

function make_booking($staff_id, $start_time, $end_time, $room_num){
    $db = get_connect_db();
    $booking_query = "INSERT INTO `booking` 
                      VALUES (NULL,'{$start_time}','{$end_time}','{$room_num}',{$staff_id})";

    $result = $db->query($booking_query);
    return $result;
}

function get_booking_by_room_and_time($room_num, $start_time, $end_time){
    $db = get_connect_db();
    $booking_query = "SELECT * FROM booking 
                      WHERE room_num = '{$room_num}'
                      AND '{$start_time} ' < end_time
                      AND '{$end_time}' > start_time ";

    $result = $db->query($booking_query)->fetch_all(MYSQLI_ASSOC);;
    return $result;
}

function cancel_booking_by_room($room_num){
    $db = get_connect_db();
    $query = "DELETE FROM booking
              WHERE room_num = '{$room_num}'";

    return $result = $db->query($query);
}


?>


