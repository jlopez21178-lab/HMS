<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/db_connect.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/func/php/move_to.php");
/** @var array $reservation */

$conn = get_connection();
$error = [];
$customer_id = $_POST["customer_id"] ??  $reservation["customer_id"] ?? "";
$room_id = $_POST["room_id"] ?? $reservation["room_id"] ?? -1;
$reservation_id = $_POST["reservation_id"] ?? $reservation["reservation_id"] ?? "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $executed = false;
    $affected_rows = 0;

    if (!$customer_id) {
        $error["customer_id"] = "A reservation can't have no customer associated";
    }

    if ($room_id == -1) {
        $error["room_number"] = "Select a room number";
    }


    if (empty($error)) {
        $stmt = $conn->prepare("UPDATE `004_reservation`
                        SET customer_id = ?, 
                            room_id = ?
                        WHERE reservation_id = ?");

        $stmt->bind_param("iii", $customer_id, $room_id, $reservation_id);
        $executed = $stmt->execute();
        $affected_rows = $stmt->affected_rows; ?>

        <div class="<?= $execute_container ?>">
            <?php if ($executed && $affected_rows > 0) { ?>
                <div class="<?= $execute_correct ?>">
                    <p>Reservation has been succesfully updated</p>
                </div>
            <?php } else { ?>
                <div class="<?= $execute_error ?>">
                    <p>An error occured and the reservation has not been updated</p>
                </div>
            <?php } ?>
        </div>
<?php
        if (isset($_POST["save_exit"])) move_to($form_path . "/reservation_list.php");
    }
}
