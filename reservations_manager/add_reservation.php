<?php

include('../view/header.php'); // include page header
//include('../model/database.php'); // connect to database
//include('../model/reservations_db.php'); // connect to reservations database
//include('../model/room_db.php'); //connect to rooms database

$rooms = get_rooms(); // get list of rooms

?>

<!DOCTYPE html>
<!--head - page tab-->
<html lang="en-US">

  <!--body -->
  <body>


    <p>
      Welcome to the Wells Conference Room Reservation System. In order to reserve a room, be sure to start by selecting the date and time to confirm availability. <br> <br>If the room is available, you may proceed with your reservation. Enjoy our space as if it were your own. <br/><i><b>Thank you!</i></b>
    <p>

    <hr />  <!-- draws line on screen -->


  <form method="POST" action="index.php"><!--sends info to the controller which is reservations manager / index.php -->
    <input type="hidden" name="action"
    value="add_reservation" />
      <!--Select Date calendar--> <!--MODIFIED ON 10-8-18-->
      <!--Date: <input type="date" name="date" value="<1-?php echo date('Y-m-d');?>"><br /><br /-->
      Date: <input type="date"></input><br /><br />

      <!--Conference Room Name-->
      Conference Room: <select name="room_name">
        <?php foreach($rooms as $room): ?>
          <option value="<?php echo $room['room_id']; ?>"><?php echo $room['room_name'];?></option>
        <?php endforeach; ?>
      </select><br /><br />

      <!--Time in military time-->
      Start Time: <select name="start_time">
        <option value="8">8:00a</option>
        <option value="9">9:00a</option>
        <option value="10">10:00a</option>
        <option value="11">11:00a</option>
        <option value="12">12:00p</option>
        <option value="13">1:00p</option>
        <option value="14">2:00p</option>
        <option value="15">3:00p</option>
        <option value="16">4:00p</option>
      </select><br /><br />

      End Time: <select name="end_time">
        <option value="9">9:00a</option>
        <option value="10">10:00a</option>
        <option value="11">11:00a</option>
        <option value="12">12:00p</option>
        <option value="13">1:00p</option>
        <option value="14">2:00p</option>
        <option value="15">3:00p</option>
        <option value="16">4:00p</option>
        <option value="17">5:00p</option>
      </select>
      <br /><br />

      <input type="submit" value="Reserve Now">

    </form>
