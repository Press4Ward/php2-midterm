<?php
require('../model/database.php');
require('../model/room_db.php');
require('../model/reservations_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'rooms_list';
    }
}

if ($action == 'rooms_list') {
    $room_id = filter_input(INPUT_GET, 'room_id',
            FILTER_VALIDATE_INT);
    if ($room_id == NULL || $room_id == FALSE) {
        $room_id = 1;
    }
    $rooms = get_rooms();
    include('room_list.php');
} else if ($action == 'delete_room') {
    $room_id = filter_input(INPUT_POST, 'room_id',
            FILTER_VALIDATE_INT);
    if ($room_id == NULL || $room_id == FALSE) {
        $error = "Missing or incorrect room id.";
        include('../errors/error.php');
    } else {
        delete_room($room_id);
        header("Location: .");
    }
} else if ($action == 'add_room') {
    $room_name = filter_input(INPUT_POST, 'room_name');
    $room_size = filter_input(INPUT_POST, 'room_size');
    $room_description = filter_input(INPUT_POST, 'room_description');

    if ($room_name == NULL || $room_name == NULL ||  $room_size == NULL || $room_size == FALSE  || $room_description == NULL || $room_description == FALSE) {
        $error = "Invalid room information. Check all fields or input data and try again.";
        include('../errors/error.php');
    } else {
        add_room($room_name, $room_size, $room_description);
        header("Location: .");
    }

}
?>
