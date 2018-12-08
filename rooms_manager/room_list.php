<?php include '../view/header.php'; ?>
<main>
    <h1>Room List</h1>


    <section>

        <!-- display a table of rooms -->
        <div class="w3-container">

            <table class="w3-table-all" style="width:100%">
                <tr>
                    <th>Room Name</th>
                    <th>Size</th>
                    <th>Description</th>
                    <th>&nbsp;</th>
                </tr>

                <?php foreach ($rooms as $room) : ?>
                <tr>
                    <td><?php echo $room['room_name']; ?></td>
                    <td><?php echo $room['room_size']; ?></td>
                    <td><?php echo $room['room_description']; ?></td>
                    <!--td><form action="index.php" method="post"-->
                    <td><form action="../reservations_manager/index.php" method="post">
                      <input type="hidden" name="action" value="start_reservation">

                      <input type="hidden" name="room_id" value="<?php echo $room['room_id']; ?>">
                      <!--input type="hidden" name="action" value="delete_room"-->
                      <!--input type="submit" value="Delete"-->
                      <input type="submit" value="Reserve">
                    </form></td>

                    <td><form action="index.php" method="post">

                      <input type="hidden" name="room_id" value="<?php echo $room['room_id']; ?>">
                      <input type="hidden" name="action" value="delete_room">
                      <input type="submit" value="Delete">
                    </form></td>


                  </tr>
                <?php endforeach; ?>
            </table>
    </div>
        <p><a href="add_room.php">Add Room</a></p>
        <!--p><a href="../reservations_manager/add_reservation.php">Add Reservation</a></p>-->

    </section>
</main>
<?php include '../view/footer.php'; ?>
