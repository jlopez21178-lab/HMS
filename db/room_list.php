<?php
require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/db_connect.php");
include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/func/php/show_room_list.php");


$sql = "SELECT * FROM `004_room` as room
        INNER JOIN `004_hotel` as hotel
          on hotel.hotel_id = room.hotel_id
        INNER JOIN `004_category` AS category 
          on category.category_id = room.category_id
        WHERE 1 = 1";

if (isset($_GET["city"]) && $_GET["city"] != "") {
  $sql .= " AND hotel.city = '" . $_GET["city"] . "'";
}

if (isset($_GET["code"]) && $_GET["code"] != "") {
  $sql .= " AND category.code = '" . $_GET["code"] . "'";
}

$res = mysqli_query($conn, $sql);

$rooms = mysqli_fetch_all($res, MYSQLI_ASSOC);
mysqli_close($conn);

// Si hay resultados el array $rooms sera mayor a 0, 
if (count($rooms) > 0) {
  foreach ($rooms as $room) {
    show_room_list($room);
  }
} else {
  echo "No se han encontrado resultados";
}
