<?php
require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/db_connect.php");

$stmt = $conn->prepare("SELECT room.*, hotel.city, cat.code 
                        FROM `004_room` AS room
                        INNER JOIN `004_hotel` AS hotel
                          ON room.hotel_id = hotel.hotel_id
                        INNER JOIN `004_category` AS cat
                          ON room.category_id = cat.category_id
                        WHERE room_id = ?");

$stmt->bind_param("i", $_GET["room_id"]);
$stmt->execute();
$room = $stmt->get_result()->fetch_assoc();
