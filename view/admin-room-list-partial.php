<div class="add-room">
    <form class="add-room" name="add-room" action="admin-new-room.php">
        <input class="view-button" type="submit" name="submit" value="Add room"/>
    </form>
</div>
<div class="add-room type">
    <form class="add-room type" name="add-room-type" action="admin-new-room-type.php">
        <input class="view-button" type="submit" name="submit" value="Add type"/>
    </form>
</div>

<div class="room-list">
    <div class="message"> <?= $value['message'];?></div>
    <table>
        <thead>
        <tr>
            <th>Room Number</th>
            <th>Room Name</th>
            <th>Capacity</th>
            <th>Equipment</th>
            <th>Booking</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Foreach is doing the equivalent of the following:
        // for($i = 0; $i < sizeof($value['room_list'] ); $i++ )
        // $room = $value['room_list'][$i];
        ?>
        <?php if (!empty($value['room_list'])) {
            foreach($value['room_list'] as $room): ?>
                <tr>
                    <td><?= $room['room_num'] ?> </td>
                    <td><?= $room['room_type_name'] ?> </td>
                    <td><?= $room['capacity'] ?> </td>
                    <td><?
                        if($room['whiteboard'] == 'Y'){
                            echo "Whiteboard</br>";
                        }
                        if($room['projector'] == 'Y'){
                            echo "Projector</br>";
                        }
                        if($room['audio_system'] == 'Y'){
                            echo "Audio System</br>";
                        }
                        if($room['telephone'] == 'Y'){
                            echo "Telephone</br>";
                        }
                                ?>
                    </td>
                    <td>
                        <a href="booking-list.php?room_num=<?= $room['room_num']?>">Booking</a>
                    </td>
                    <td>
                        <a href="admin-room-edit.php?room_num=<?= $room['room_num']?>">Edit</a>
                    </td>
                    <td>
                        <a href="admin-home.php?cancel=true&room_num=<?= $room['room_num']?>&origin=<?= $value['origin']?>"
                           onclick="return confirm('Are you sure you want to delete the room <?= $room['room_num']?>\n<?php if($room['booking'] == 1){
                                        echo 'Be aware there is one booking linked to this room';
                           }if($room['booking'] > 1){
                                echo 'Be aware there are '.$room['booking'].' bookings linked to this room';
                           }
                           ?>')">
                            Delete
                        </a>
                    </td>
                </tr>
            <?php endforeach;
        } ?>

        </tbody>
    </table>
</div>