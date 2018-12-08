<?php

function get_reservations($reservation_id) {  // array to select reservations
    global $db;                                                         //PDO variable
    $query = 'SELECT room_name, reservation_id, resdate, start_time, end_time
              FROM reservations
              INNER JOIN rooms ON reservations.room_id = rooms.room_id
              ORDER BY resdate, start_time';
    $statement = $db->prepare($query);                  //prepare statement
    $statement->bindValue( ':reservation_id', $reservation_id);
    $statement->execute();
    $reservations = $statement->fetchAll();
    $statement->closeCursor();
    return $reservations;
}

function delete_reservation($reservation_id) {    // array to delete reservations
    global $db;                                         //PDO variable
    $query = 'DELETE FROM reservations WHERE reservation_id = :reservation_id';
    $statement = $db->prepare($query); //prepare statement
    $statement->bindValue(':reservation_id', $reservation_id);
    $statement->execute();
    $statement->closeCursor();
}

// array to add reservation
function add_reservation($room_id, $date, $start_time, $end_time) {
    global $db;
    $queryAdd = 'INSERT INTO reservations (room_id, resdate, start_time, end_time)
            VALUES (:room_id, :date, :start_time, :end_time)';
    $statement = $db->prepare($queryAdd); // prepare database for reservation insert
    $statement->bindValue( ':room_id', $room_id );
    $statement->bindValue( ':date', $date );
    $statement->bindValue( ':start_time', $start_time );
    $statement->bindValue( ':end_time', $end_time );
    $statement->execute();
    $statement->closeCursor();
}

// function to check reservation time
function checktime($h, $m, $s) {
    return $h >=8 && $h < 5 && $m >= 0 && $m < 60 && $s >= 0 && $s < 60;
}

?>
