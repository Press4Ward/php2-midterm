        <nav>
            <ul>
                <!-- display links for all rooms -->
                <?php foreach($rooms as $room) : ?>
                <li>
                    <a href="?room_id=<?php
                              echo $room['room_id']; ?>">
                        <?php echo $room['room_name']; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>
