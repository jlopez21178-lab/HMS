<?php

require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/templates/header.php");
include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/db_connect.php");
include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/func/php/show_room.php");

// GET variables
$date_in = $_GET["date_in"];
$date_out = $_GET["date_out"];

// SQL command
$sql = "SELECT hotel.hotel_id, hotel.city, category.category_id, category.category_name FROM 004_room as room
        inner join 004_hotel as hotel 
          on hotel.hotel_id = room.hotel_id
        inner join 004_category as category 
          on category.category_id = room.category_id
        WHERE `room_id` NOT IN (SELECT room_id 
                                FROM `004_reservation` AS res 
                                WHERE res.date_in < '$date_out' AND res.date_out > '$date_in')
        Group BY hotel.hotel_id, room.category_id;";

$query = mysqli_query($conn, $sql);
$rooms = mysqli_fetch_all($query, MYSQLI_ASSOC);
mysqli_close($conn);


echo "<section class='grow m-5 flex flex-col justify-center items-center gap-10'>";

foreach ($rooms as $room)  show_room($room);


echo "</section>";

require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/templates/footer.php");
