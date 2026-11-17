<?php
require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/db_connect.php");
include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/func/php/show_room_list.php");

$conn = getConnection();

$type = "";
$param = [];
$sql = "SELECT * FROM `004_room` as room
        INNER JOIN `004_hotel` as hotel
          on hotel.hotel_id = room.hotel_id
        INNER JOIN `004_category` AS category 
          on category.category_id = room.category_id
        WHERE 1 = 1";

if (isset($_POST["hotel_id"]) && $_POST["hotel_id"] != "") {
  $sql .= " AND hotel.hotel_id = ?";
  $type .= "i";
  $param[] = $_POST["hotel_id"];
}

if (isset($_POST["category_id"]) && $_POST["category_id"] != "") {
  $sql .= " AND category.category_id = ?";
  $type .= "i";
  $param[] = $_POST["category_id"];
}

$sql .= " ORDER BY hotel.hotel_id, CAST(room.room_number AS UNSIGNED)";

$stmt = $conn->prepare($sql);

if (!empty($param)) $stmt->bind_param($type, ...$param);

$stmt->execute();
$rooms = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
mysqli_close($conn);

// Si hay resultados el array $rooms sera mayor a 0, 
if (count($rooms) > 0) {
  foreach ($rooms as $room) {
    show_room_list($room);
  }
} else {
  echo "No se han encontrado resultados";
}
