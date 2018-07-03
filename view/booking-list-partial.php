<div class="booking-list">
    <table>
        <thead>
        <tr>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Room number</th>
            <th>Cancel</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Foreach is doing the equivalent of the following:
        // for($i = 0; $i < sizeof($value['room_list'] ); $i++ )
        // $room = $value['room_list'][$i];
        ?>
        <?php
        foreach($value['booking_list'] as $booking): ?>
            <tr>
                <?php
                // <?= $someVar \?\> (short echo) is the equivalent of
                // <?php echo $someVar; \?\>
                ?>
                <td><?= date('l, jS F h:iA', strtotime($booking['start_time'])); ?> </td>
                <td><?= date('l, jS F h:iA', strtotime($booking['end_time'])); ?> </td>
                <td><?= $booking['room_num'] ?> </td>
                <td>
                    <!--                    Little javascript inserted but to confirm the booking has to be deleted
                       but to avoid https://www.w3schools.com/jsref/tryit.asp?filename=tryjsref_confirm-->
                    <a href="cancel-booking.php?booking_num=<?=$booking['booking_num'];?>&staff_id=<?=$value['staff_id']?>"
                       onclick="return confirm('Are you sure you want to cancel booking for room <?= $booking['room_num']?> ?  <?= $value['staff_id']?>');">
                        Cancel

                    </a>
                </td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
    <a href="download-booking.php?staff_id=<?= $value['staff_id']?>&&name=<?=$value['name']?>"
       onclick="return confirm('Are you ready to export your booking to your personal calendar?');">
        <h1 class="fake-button">
           Export bookings ->
        </h1>
    </a>
</div>
