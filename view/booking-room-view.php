<?php
$error = False;
if(isset($_GET['error'])){
    $error = $_GET['error'];
}
?>

<div class="header-content">
    <h3 class="title"> <?php echo $value['room_num'] ?></h3>

    <div class="subtitle">This room is a <?php echo $value['room_name'] ?> and can contain up to <?php echo $value['capacity'] ?> persons. </div>

    <div class="reservation-form">
        <form name="reservation" method="get" action="finalised-reservation.php" class="date-selection" onsubmit="return validateDate()">
            <div class="form-row">
                <label for="date">Date</label>
                <input type="text" id="date" name="date" placeholder="DD-MM-YYYY"/>
            </div>
            <div class="form-row">
                <label for="start-time">Start</label>
                <select name="start_time" id="start-time">
                    <?php make_time(); ?>
                </select>
                <label for="end-time">End</label>
                <select name="end_time" id="end-time">
                    <?php make_time(); ?>
                </select>
            </div>
            <div class="error-message"><?= $value['message']?>
            </div>
            <input type="hidden" name="room_num" value="<?php echo $value['room_num'] ?>">
            <input class="submit-button" type="submit" name="submit" value="Submit"/>
        </form>
    </div>

    <?php if(empty($value['booking_list'])){ ?>
        <div class="subtitle">
            No upcoming reservation for  <?= $value['room_num'] ?> .
        </div>
    <?php }else{ ?>
    <div class="subtitle">
        <h3>Upcoming reservations.</h3>
    </div>
</div>
<?php partial('booking-room', $value); }?>

<!--   BACK BUTTON -->
<!--       TODO : find a way to create a back button that reflects a list or the research according to how we get into the page-->
<!--HINT: we are already passing the origin through $value['origin']-->
<!--PB : how to use php in the form?-->
<!--more important: how to get the input of the search (probably a $_GET...)-->
</br></br>
<form class="room-display" name="room-display" action="staff-home.php">
    <input class="view-button" type="submit" name="submit" value="Back"/>
</form>