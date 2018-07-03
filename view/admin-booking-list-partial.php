<div class="room-list">
    <?php if(empty($value['booking_list'])){
        echo '<div class="subtitle"> No upcoming booking for '.$value['staff_name'].'. </div>';
        die();
    } ?>
    <div class="subtitle">Upcoming booking for <?= $value['staff_name']?></div>
<table>
    <thead>
    <tr>
        <th>Room number</th>
        <th>Start time</th>
        <th>End time</th>
        <th>Cancellation</th>
    </tr>
    </thead>
    <tbody>
    <?php
    // Foreach is doing the equivalent of the following:
    // for($i = 0; $i < sizeof($value['room_list'] ); $i++ )
    // $room = $value['room_list'][$i];
    ?>
    <?php if (!empty($value['booking_list'])) {
        foreach($value['booking_list'] as $book): ?>
            <tr>
                <td><?= $book['room_num'] ?> </td>
                <td><?= $book['start_time'] ?> </td>
                <td><?= $book['end_time'] ?> </td>
                <td>
                    <a href="booking-list.php?staff_id=<?=$staff['staff_id']?>&&booking_num=<?=$book['booking_num'];?>"
                       onclick="return confirm('Are you sure you want to cancel the booking of  <?= $value['staff_name']?> for the room <?= $booking['room_num']?> of <?= date('l, jS F h:iA', strtotime($booking['start_time'])) ?>to <?= date('l, jS F h:iA', strtotime($booking['end_time']))?> ?');">Cancel</a>
                </td>
            </tr>
        <?php endforeach;
    } ?>


    </tbody>
</table>

</div>
