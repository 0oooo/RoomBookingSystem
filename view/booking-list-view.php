
<?php
if($value['booking_list'] == [] && $value['staff_name'] != ''){
    echo '<div class="subtitle"> There is no booking for '.$value['staff_name'].'.</div>';
    echo '<script>
        function goBack() {
              window.history.back();
        }
        </script>
<button class="back-button" onclick="goBack()">Back</button>
            ';
    exit();
}if($value['booking_list'] == [] && $value['room_num'] != ''){
    echo '<div class="subtitle"> There is no booking for '.$value['room_num'].'.</div>';
} else {
    ?>
    <div class="booking-list">
        <div class="subtitle"> Booking for <? if( $value['staff_name'] != '')
            { echo $value['staff_name']; }else{
                echo $value['room_num'];
            } ?>.</div>
        <div class="message"> <?= $value['message'];?></div>
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
                        <?php if( $value['staff_name'] != '') {
                            echo '<a href="booking-list.php?cancel=true&&booking_num='.$booking['booking_num']. '&&staff_id='.$value['staff_id'].'"';
                        }else{

                            echo '<a href="booking-list.php?cancel=true&&room_num='.$value['room_num'].'&&start_date='.$booking['start_time']. '&&end_date='.$booking['end_time']. '"';
                        }?>
                           onclick="return confirm('Are you sure you want to cancel the booking for the room <?= $booking['room_num']?> of <?= date('l, jS F h:iA', strtotime($booking['start_time'])) ?> to <?= date('l, jS F h:iA', strtotime($booking['end_time']))?> ?');">
                            Cancel
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
        <button class="back-button" onclick="goBack()">Back</button>

    </div>
<?php }?>