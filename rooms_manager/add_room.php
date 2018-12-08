<!--?php include '../view/header.php'; ?-->

<main>
    <h1>Add New Room</h1>
    <form action="index.php" method="post" id="add_room">
        <input type="hidden" name="action" value="add_room">

        <label>Room Name:</label>
        <input type="text" name="room_name"  />
        <br>

         <label>Size:</label>
        <input type="text" name="room_size"  />
        <br>

        <label>Description:</label>
        <input type="text" name="room_description"  />
        <br>

        <label>&nbsp;</label>
        <input type="submit" name="add_room" value="Add Room" />
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php">View Conference Room List</a>

</main>
<?php include '../view/footer.php'; ?>
