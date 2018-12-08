<?php
require('../model/database.php');
require('../model/room_db.php');
require('../model/reservations_db.php');

$action = filter_input(INPUT_POST, 'action'); //get value from $db variable
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'reservations_list';
    }
}

//ADDED 10-8 to START RESERVATIONS
if ($action =='start_reservation') {
  $room_id = filter_input(INPUT_GET, 'room_id');
  $room_name = filter_input(INPUT_GET, 'room_name');
  include('add_reservation.php');
}


// list reservations
if ($action == 'reservations_list') {
  $reservation_id = filter_input(INPUT_GET,'', FILTER_VALIDATE_INT);
  //$reservations = get_reservations(); // get the room by room_id
  //include 'reservations_list.php'; // file located inside current folder

} else if ($action == 'add_reservation') { // validate reservation date and time
    $room_id = filter_input(INPUT_POST, 'room_id', FILTER_VALIDATE_INT);
    $room_name = filter_input(INPUT_POST, 'room_name');
    $date = filter_input(INPUT_POST, 'date');
    $start_time = filter_input(INPUT_POST, 'start_time');
    $end_time = filter_input(INPUT_POST, 'end_time');
    add_reservation($room_id, $room_name, $date, $start_time, $end_time);
    header("Location: .");
  }

    // format times from string to object
    $today = new DateTime();
    $resStart = $today->setTime($start_time, 00, 00);
    $start_time = $resStart->format('H:i:s');

    $resEnd = $today->setTime($end_time, 00, 00);
    $end_time = $resEnd->format('H:i:s');

    //verify date is Monday - Friday, not weekend
    $dateCheck = DateTime::createFromFormat('Y-m-d', $date);
    $weekDay = $dateCheck->format('l');
    if ($weekDay == 'Saturday' || $weekDay == 'Sunday') {
      $error = "Please select a weekday (Monday - Friday) only.";
      include('../errors/error.php');
    } else {
      add_reservation($room_id, $date, $start_time, $end_time);
      header("Location: .?action=reservations_list");

      //} else if ($action == 'delete_reservation') {
      //  $reservation_id = filter_input(INPUT_POST, 'reservation_id', FILTER_VALIDATE_INT);

  //delete_reservation($reservation_id);
  //header("Location: .?action=reservations_list");
}
?>
