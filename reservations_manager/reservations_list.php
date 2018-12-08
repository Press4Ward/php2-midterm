<?php include '../view/header.php'; ?>
<main>
        <h1>Reservations</h1>

        <table>
          <tr>
            <th>Room Name</th>
            <th>Date</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th></th>
          </tr>
          <?php foreach($reservations as $reservation) : ?>
            <tr>
              <td>
                <?php echo $reservation['room_name']; ?>
              </td>
              <td>
                <?php echo $reservation['resdate']; ?>
              </td>
              <td>
                <?php echo $reservation['start_time']; ?>
              </td>

              <td>
                <?php echo $reservation['end_time']; ?>
              </td>
              <td><form action="index.php" method="post">
                <input type="hidden" name="action"
                value="delete_reservation">
                <input type="hidden" name="reservation_id"
                value="<?php echo $reservation['reservation_id']; ?>">
                <input type="submit" value="Delete">
                </form>
              </td>
            </tr>
          <?php endforeach; ?>

        </table>


</main>
<?php include '../view/footer.php'; ?>
