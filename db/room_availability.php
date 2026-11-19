<?php
require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/template/header.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/db_connect.php");
require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/func/php/show_room.php");

$conn = getConnection();

// GET variables
$date_in = $_GET["date_in"];
$date_out = $_GET["date_out"];

$type = "ss";
$param = [$date_out, $date_in];

// SQL command
$sql = "SELECT hotel.hotel_id, hotel.city, category.category_id, category.category_name, category.price_night FROM 004_room as room
        inner join 004_hotel as hotel 
          on hotel.hotel_id = room.hotel_id
        inner join 004_category as category 
          on category.category_id = room.category_id
        WHERE (`room_id` NOT IN (SELECT room_id 
                                FROM `004_reservation` AS res 
                                WHERE res.date_in < ? AND res.date_out > ?))";

// si hotel_id es -1 significa que el usuario no ha introducido ningun hotel para buscar
if ($_GET["hotel_id"] != -1) {
  $sql .= " AND hotel.hotel_id = ?";
  $type .= "i";
  $param[] = $_GET["hotel_id"];
}

$sql .= " GROUP BY hotel.hotel_id, category.category_id ORDER BY category.category_id";

$stmt = $conn->prepare($sql);
$stmt->bind_param($type, ...$param);
$stmt->execute();
$rooms = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

mysqli_close($conn);


echo "<section class='grow m-5 flex flex-col justify-center items-center gap-10'>";
foreach ($rooms as $room)  show_room($room);
echo "</section>";

require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/template/footer.php");
