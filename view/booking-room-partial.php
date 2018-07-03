<div class="booking-list">
    <table>
        <thead>
        <tr>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Staff</th>
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
                <td><?= date('l, jS F h:iA', strtotime($booking['end_time'])) ?> </td>
                <td><?= $booking['s_name'] ?> </td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>

</div>