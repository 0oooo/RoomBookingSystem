 <?php
 //function to include partials
 require('view/view-function.php');
 require('model/staff.php');
 require('session-functions.php');
 require('booking-function.php');
 require('model/booking.php');
 require('model/event-log.php');
 redirect_if_not_signed_in();
// die('jjajja');
 $role = 'staff';
 redirect_if_no_access($role);

 $username = $_SESSION['username'];
 $staff = get_staff_by_username($username);
 $staff_id = $staff['staff_id'];
 $room_num = $_GET['room_num'];
 $name = get_session_variable('name');
 $booking_list = get_all_booking($staff_id);

 //get the information of the connected staff to check his/her bookings
 $booking_list_staff = get_all_booking($staff_id);


 $date = $_GET['date']; // format of the date so far DD-MM-YYYY
 $start_time = $_GET['start_time']; // format = HH:MM
 $end_time = $_GET['end_time'];


$new_date = explode('-', $date);
$new_date = $new_date[2].'-'.$new_date[1].'-'.$new_date[0];
$start_date = $new_date.' '.$start_time;
$end_date = $new_date.' '.$end_time;

// source : https://stackoverflow.com/questions/6238992/converting-string-to-date-and-datetime
 $time = getdate()['year'].'-'.getdate()['mon'].'-'.getdate()['mday'];
$now = strtotime($time);
$comparison_date = strtotime($new_date);

if(!validateDate($new_date)){
    header("Location: booking-room.php?room_num=".$room_num."&&error=invalid");
    die();
}
if( $now > $comparison_date){
    header("Location: booking-room.php?room_num=".$room_num."&&error=invalid");
    die();
 }
 if(sizeof($booking_list_staff) >= 2){
    header("Location: booking-room.php?room_num".$room_num."&&error=bookings");
    die();
 }
 else{
    $is_slot_taken = get_booking_by_room_and_time($room_num, $start_date, $end_date);
     if($is_slot_taken){
         header("Location: booking-room.php?room_num=".$room_num."&&error=taken");
         die();
     }else{
         make_booking($staff_id, $start_date, $end_date, $room_num);
         $booking_list = get_all_booking($staff_id);
         add_event_log( $username, $user_booking);
         view('Signed in Staff', 'staff-home', ['booking_list'=>$booking_list,
                                                             'room_num'=>$room_num,
                                                             'date'=>$date,
                                                             'start_time'=>$start_time,
                                                             'end_time'=>$end_time,
                                                             'name'=>$name]);
     }
 }

