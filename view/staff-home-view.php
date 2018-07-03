<div class="header-content">
    <h3 class="title">Welcome <?php echo $value['name'] ?></h3>


 <?php if(isset($value['date'])){
     echo  '<div class="subtitle">You have successfully reserved the room "'.$value['room_num'].'"</br>
    on '.date('l, jS, F', strtotime($value['date'])).'
    from '.$value['start_time'].' to '.$value['end_time'].'. </div>';
 }?>

    <div class="subtitle">
        <h3>Would you like to make a <?php if(isset($value['date'])){echo 'new ';}?>reservation?</h3>
    </div>
    <form name="searchRoom" class="search-room" method="get" action="room-display.php?search-input=" class="search-form">
        <input type="text" name="search-input" placeholder="Search room" class="search-input"/>
        <input type="submit" value="Search" class="search-button"/>
    </form>

    <form name="search-equipment" method="get" action="room-display.php?search-equipment" class="search-equipment">
        <label class="container">Whiteboard
            <input type="checkbox" id="whiteboard" name="whiteboard" value="whiteboard" class="equipment-element">
            <span class="checkmark"></span>
        </label>
        <label class="container">Projector
            <input type="checkbox" id="projector" name="projector" value="projector" class="equipment-element" >
            <span class="checkmark"></span>
        </label>
        <label class="container">Audio System
            <input type="checkbox" id="audio_system" name="audio_system" value="audio_system" class="equipment-element">
            <span class="checkmark"></span>
        </label>
        <label class="container">Telephone
            <input type="checkbox" id="telephone" name="telephone" value="telephone" class="equipment-element">
            <span class="checkmark"></span>
        </label>
        <input type="submit" value="Equipment" class="button search-equipment-button"/>
    </form>

    <form class="room-display" name="room-display" action="room-display.php">
        <input class="view-button" type="submit" name="submit" value="View rooms"/>
    </form>

    <?php if(empty($value['booking_list'])){ ?>
    <div class="subtitle">
        No upcoming reservation  .
    </div>
    <?php }else{ ?>
     <div class="subtitle">
        <h3>Upcoming reservations.</h3>
    </div>
    </div>
<?php partial('booking-list', $value);
    }
    ?>
