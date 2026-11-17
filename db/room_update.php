<?php
require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/template/bo_header.php");
include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/db_connect.php");

$conn = getConnection();

$stmt = $conn->prepare("UPDATE `004_room` AS room
                        SET room.room_number = ?,
                            room.category_id = ?
                        WHERE room.room_id = ?");

$stmt->bind_param("iii", $_POST["room_number"], $_POST["category_id"], $_POST["room_id"]);
$executed = $stmt->execute();
$affected_rows = $stmt->affected_rows;
mysqli_close($conn)
?>
<div class="<?= $execute_container ?>">
  <?php if ($executed && $affected_rows > 0) { ?>
    <div class="<?= $execute_correct ?>">
      <p>Room updated succesfully</p>
    </div>
  <?php } else { ?>
    <div class="<?= $execute_error ?>">
      <p>Error. The room was not updated</p>
    </div>
  <?php } ?>
</div>
