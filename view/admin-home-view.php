<?php
if(isset($value['origin']) && $value['origin'] == 'staff') {
    if (empty($value['staff_list'])) { ?>
        <div class="subtitle"> No staff registered</div>';
    <?php } else { ?>
        <div class="subtitle">List of staff members</div>
        <div class="table">
            <?php $staff_list = $value['staff_list'];
            echo partial('admin-staff-list', ['staff_list' => $staff_list]); ?>
        </div>
        <form class="room-display" name="room-display" action="admin-home.php">
            <input class="button" type="submit" name="submit" value="back">
        </form>

    <?php }
} elseif(isset($value['origin']) && $value['origin'] == 'room'){
    if(empty($value['room_list'])){ ?>
        <div class="subtitle"> No room found </div>
  <?php  }else { ?>
        <div class="subtitle"><h3>List of rooms</h3></div>
        <div class="table">
    <?php $room_list = $value['room_list'];
        $message = $value['message'];
        $origin = $value['origin'];
        echo partial('admin-room-list', ['room_list' => $room_list, 'message'=>$message, 'origin'=>$origin]); ?>
        </div>
        <form class="room-display" name="room-display" action="admin-home.php">
            <input class="button" type="submit" name="submit" value="back">
        </form>
    <?php }
}else{ ?>

<div class="header-content">
    <h3 class="title">Welcome</h3>
    <div class="subtitle"> <h3> What would you like to manage ? </h3> </div>
    <div class="message"> <?= $value['message']?> </div>
    <a href="admin-home.php?origin=staff" class="list">
        <div>
            Staffs
        </div>
    </a>
    <a href="admin-home.php?origin=room" class="list">
        <div>
            Rooms
        </div>
    </a>
    <a href="log-display.php">
        <h1 class="fake-button">
            Display log events ->
        </h1>
    </a>
    <?php } ?>