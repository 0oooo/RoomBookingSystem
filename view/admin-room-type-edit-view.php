<div class="header-content">
    <h2 class="subtitle">Edit a room type</h2>
</div>

<form name="add-room-type" class="form" method="get" action="admin-room-type-edited.php"">
<input class="form-input" name="room_type_name" type="text" placeholder="Room type name"
       maxlength="100" value="<?php echo $value['room_type_name'] ?>">
<input type="hidden" name="room_type_id" value="<?= $value['room_type_id'] ?>" >
<div class="error-message">
    <?php echo $value['error_message'] ?>
</div>
<input class="submit-button" type="submit" name="submit" value="Submit"/>
</form>

<script>
    function goBack() {
        window.history.back();
    }
</script>
<button class="back-button" onclick="goBack()">Back</button>
