<div class="header-content">
    <h2 class="subtitle">Add a new room type</h2>
</div>

<form name="add-room-type" class="form" method="post" action="new-room-type-finalised.php"">
<input class="form-input" name="room_type_name" type="text" placeholder="Room type name"
       maxlength="100" value="">
<div class="error-message">
    <?php echo $value['message'] ?>
</div>
<input class="submit-button" type="submit" name="submit" value="Submit"/>
</form>

<script>
    function goBack() {
        window.history.back();
    }
</script>
<button class="back-button" onclick="goBack()">Back</button>


<div class="subtitle">Existing room types</div>
<div class="booking-list">
    <table>
        <thead>
        <tr>
            <th>Room type</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
<?php if (!empty($value['room_types'])) {
foreach($value['room_types'] as $room_types): ?>
<tr>
    <td><?= $room_types['room_type_name']; ?> </td>
    <td>
        <a href="admin-room-type-edit.php?room_type_name=<?= $room_types['room_type_name']?>">Edit</a>
    </td>
    <td>
        <a href="admin-new-room-type.php?cancel=true&room_type_name=<?= $room_types['room_type_name']?>"
           onclick="return confirm('Are you sure you want to delete the room <?= $room_types['room_type_name']?>');">
            Delete
        </a>
    </td>
</tr>
<?php endforeach;
} ?>

        </tbody>
    </table>

