<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/db_connect.php");

$conn = get_connection();

$stmt = $conn->prepare("SELECT * FROM `004_reservation` WHERE reservation_id = ?");
$stmt->bind_param("i", $_GET["reservation_id"]);
$stmt->execute();
$reservation = $stmt->get_result()->fetch_all(MYSQLI_ASSOC)[0];



mysqli_close($conn);
