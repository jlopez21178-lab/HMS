<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/template/bo_header.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/db_connect.php");

$conn = get_connection();


$stmt = $conn->prepare("INSERT INTO `004_room`(hotel_id, room_number, category_id) VALUES (?,?,?)");
$stmt->bind_param("iii", $_POST["hotel_id"], $_POST["room_number"], $_POST["category_id"]);
$executed = $stmt->execute();
?>

<div class="<?= $execute_container ?>">
  <?php if ($executed && $stmt->affected_rows > 0) { ?>
    <div class="<?= $execute_correct ?>">
      <p>Se ha añadido la habitacion</p>
    </div>
  <?php } else { ?>
    <div class="<?= $execute_error ?>">
      <p>No se ha añadido la habitacion</p>
    </div>
  <?php } ?>
</div>


<?php mysqli_close($conn); ?>