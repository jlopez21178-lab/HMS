<?php
require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/template/header.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/db_connect.php");

$conn = get_connection();

$stmt = $conn->prepare('DELETE FROM `004_room` WHERE room_id = ?');
$stmt->bind_param("i", $_GET["room_id"]);
$executed = $stmt->execute();
$affected_rows = $stmt->affected_rows;

mysqli_close($conn); ?>

<div class="<?= $execute_container ?>">
  <?php if ($executed && $affected_rows > 0) { ?>
    <div class="<?= $execute_correct ?>">
      <p>Room deleted succesfully</p>
    </div>
  <?php } else { ?>
    <div class="<?= $execute_error ?>">
      <p>Error. The room was not deleted</p>
    </div>
  <?php } ?>
</div>

<?php  require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/template/footer.php");
