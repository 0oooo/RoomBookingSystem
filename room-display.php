<?php
require('session-functions.php');
require('view/view-function.php');
require('model/room.php');
$role = 'staff';
redirect_if_no_access($role);
redirect_if_not_signed_in();

//If a search has been done, send the user to the room-display with the result of the search and the id (search vs list)
if(isset($_GET['search-input']) && !empty($_GET['search-input'])){
  //here the room list = the result of the search
  $room_list = search_room_by_num($_GET['search-input']);
  view('Room display', 'room-display', [ 'origin'=>'search',
                                                      'room_list'=>$room_list,
                                                      'search-term'=>$_GET['search-input']]);

}elseif(isset($_GET['whiteboard']) || isset($_GET['projector']) || isset($_GET['audio_system']) || isset($_GET['telephone'])){
    $equipment = array();
    if(isset($_GET['whiteboard'])){
        $equipment[] = $_GET['whiteboard'];
    }
    if(isset($_GET['projector'])){
        $equipment[] = $_GET['projector'];
    }
    if(isset($_GET['audio_system'])){
        $equipment[] = $_GET['audio_system'];
    }
    if(isset($_GET['telephone'])){
        $equipment[] = $_GET['telephone'];
    }
    $equipment = implode(' = \'Y\'  && ', $equipment).' = \'Y\' ' ;
    $room_list = get_room_from_equipment($equipment);

    view('Room display', 'room-display', ['origin'=>'equipment', 'room_list'=>$room_list]);

    // if the user has clicked on search but the search is empty, send the user on staff home page (where s/he is already)
}elseif(isset($_GET['search-input']) && empty($_GET['search-input']) &&empty($_GET['search-equipment'])){
  header("Location: staff-home.php");
  //the last case scenario (which will be the main one even if the person types the address) : display the room
}else{
  //here the room list = the room list
    $room_list = get_room_list();
  view('Room display', 'room-display', ['origin'=>'list',
                                                     'room_list'=>$room_list]);
}



?>
