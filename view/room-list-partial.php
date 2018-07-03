<div class="room-list">
 <table>
     <thead>
        <tr>
            <th>Room Number</th>
            <th>Room Name</th>
            <th>Capacity</th>
            <th>Equipment</th>
            <th>Booking</th>
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
                            <a href="booking-room.php?room_num=<?= $room['room_num']?>&&origin=<?= $value['origin']?>">Book</a>
                        </td>
                    </tr>
              <?php endforeach;
          } ?>

     </tbody>
 </table>

</div>
