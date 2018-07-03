<div class="staff-list">
    <table>
        <thead>
        <tr>
            <th>Staff name</th>
            <th>Username</th>
            <th>Phone number</th>
            <th>Booking</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Foreach is doing the equivalent of the following:
        // for($i = 0; $i < sizeof($value['room_list'] ); $i++ )
        // $room = $value['room_list'][$i];
        ?>
        <?php if (!empty($value['staff_list'])) {
            foreach($value['staff_list'] as $staff): ?>
                <tr>
                    <td><?= $staff['username'] ?> </td>
                    <td><?= $staff['name'] ?> </td>
                    <td><?= $staff['phone'] ?> </td>
                    <td>
                        <a href="booking-list.php?staff_id=<?=$staff['staff_id']?>">Bookings</a>
                    </td>
                </tr>
            <?php endforeach;
        } ?>

        </tbody>
    </table>

</div>
