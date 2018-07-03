<div class="booking-list">
    <div class="subtitle">Log events</div>
    <table>
        <thead>
        <tr>
            <th>Log ID</th>
            <th>Log time</th>
            <th>Log IP</th>
            <th>Log Event</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Foreach is doing the equivalent of the following:
        // for($i = 0; $i < sizeof($value['room_list'] ); $i++ )
        // $room = $value['room_list'][$i];
        ?>
        <?php
        foreach($value['event'] as $event): ?>
            <tr>
                <td><?= $event['logID']; ?> </td>
                <td><?=
                 //   date('l, jS F h:iA', strtotime(
                            $event['logTime']
               //     ))
                    ; ?> </td>
                <td><?= $event['logIp'] ?> </td>
                <td><?= $event['logDetail'] ?></td>
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
