<div class="header-content">
    <h2 class="subtitle">Add a new room</h2>
</div>
<!--TO ADD ACTION ( admin home -> list of rooms + message "" new room added")-->
<form name="add-room" class="form" method="post" action="new-room-finalised.php"">
    <input class="form-input  <?php echo $value['focus'] ?>" name="room_num" type="text" placeholder="Room number"
           maxlength="20" value="<?php echo $value['room_num'] ?>">
    <div class="error-message">
        <?php echo $value['error_message'];  echo is_numeric($value['capacity'])?>
    </div>
    <select name="room_type_id" class="room-type">  <option value="">Select room type</option>
        <?php foreach ($value['room_types'] as $room_type): ?>
            <option value="<?= $room_type['room_type_id'] ?>" <?php if($value['room_type_id'] ==  $room_type['room_type_id']){ echo "selected=\"selected\" ";}?>><?= $room_type['room_type_name'] ?></option>
        <?php endforeach; ?>
    </select>
    <input class="capacity" name="capacity" type="number" placeholder="Capacity" maxlength="10"
           value="<?php echo $value['capacity'] ?>">

<label class="container">Whiteboard
    <input type="checkbox" id="whiteboard" name="whiteboard" value="whiteboard" class="equipment-element">
    <span class="checkmark"></span>
</label>
<label class="container">Projector
    <input type="checkbox" id="projector" name="projector" value="projector" class="equipment-element" >
    <span class="checkmark"></span>
</label>
<label class="container">Audio System
    <input type="checkbox" id="audio_system" name="audio_system" value="audio_system" class="equipment-element">
    <span class="checkmark"></span>
</label>
<label class="container">Telephone
    <input type="checkbox" id="telephone" name="telephone" value="telephone" class="equipment-element">
    <span class="checkmark"></span>
</label>
    <input class="submit-button" type="submit" name="submit" value="Submit"/>
</form>

<script>
    function goBack() {
        window.history.back();
    }
</script>
<button class="back-button" onclick="goBack()">Back</button>

