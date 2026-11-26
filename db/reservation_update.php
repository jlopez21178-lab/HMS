<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/db_connect.php");

/** @var array $reservation */

$conn = get_connection();

$customer_id = $_POST["customer_id"] ?? $reservation["customer_id"];
$room = $_POST["room_id"] ?? $reservation["room_id"] ?? -1;

$stmt = $conn->prepare("UPDATE `004_reservation`
                        SET customer_id = ?, 
                            room_id = ?
                        WHERE reservation_id = ?");

$stmt->bind_param("ii", $customer_id, $room);
