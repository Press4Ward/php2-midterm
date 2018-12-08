<?php


function get_rooms() {       // array to select rooms by
    global $db;              //PDO variable
    $query = 'SELECT * FROM rooms';
    $statement = $db->prepare($query);
    $statement->execute();
    $rooms = $statement->fetchAll();
    $statement->closeCursor();
    return $rooms;
}
// array to delete rooms
function delete_room($room_id) {
    global $db;                                         //PDO variable
    $query = 'DELETE FROM rooms WHERE room_id = :room_id';
    $statement = $db->prepare($query); //prepare statement
    $statement->bindValue(':room_id', $room_id);
    $statement->execute();
    $statement->closeCursor();
}

// array to add room to rooms database
function add_room($room_name, $room_size, $room_description) {
    global $db;                         //PDO variable
    $query = 'INSERT INTO rooms (room_name, room_size, room_description)
            VALUES (:room_name, :room_size, :room_description)';
    $statement = $db->prepare($query);                  //prepare statement
    $statement->bindValue( ':room_name', $room_name);
    $statement->bindValue( ':room_size', $room_size);
    $statement->bindValue( ':room_description', $room_description);
    $statement->execute();
    $statement->closeCursor();
}

?>
