<?php require('model/booking.php');
$staff_id = $_GET['staff_id'];
$name = $_GET['name'];
$booking = get_all_booking($staff_id);
//print_r($booking);
// the iCal date format. Note the Z on the end indicates a UTC timestamp.
// max line length is 75 chars. New line is \\n
$output = "BEGIN:VCALENDAR\r\n
METHOD:PUBLISH\r\n
VERSION:2.0\r\n
PRODID:-//ECU//CSG2431 Assignment 2//EN\r\n
BEGIN:VTIMEZONE\r\n
TZID:Perth\r\n
BEGIN:STANDARD\r\n
DTSTART:16010101T000000\r\n
TZOFFSETFROM:+0800\r\n
TZOFFSETTO:+0800\r\n
END:STANDARD\r\n
END:VTIMEZONE\r\n";

// loop over events
foreach ($booking as $booking):
    $output .= "
BEGIN:VEVENT\r\n
SUMMARY: Booking for $name\r\n
LOCATION:".$booking['room_num']."\r\n
DTSTART;TZID=Perth:".date('Ymd\THis', strtotime($booking['start_time']))."\r\n
DTEND;TZID=Perth:".date('Ymd\THis', strtotime($booking['end_time']))."\r\n
DTSTAMP:".date('Ymd\THis\Z')."\r\n
UID:".uniqid()."\r\n
END:VEVENT\r\n
";
endforeach;
// close calendar
$output .= "END:VCALENDAR\r\n";
header('Content-Disposition: inline; filename=calendar.ics');
header('Content-type: text/calendar; charset=utf-8');
echo  $output;
?>

