<?php

include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/db_connect.php");
include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/func/php/show_reservation_list.php");

$sql = "SELECT *, 
        (SELECT code FROM `004_category` WHERE category_id = res.category_given) AS 'cat_code_given', 
        (SELECT code FROM `004_category` WHERE category_id = res.category_charged) AS 'cat_code_charged'
        FROM `004_reservation` AS res
        LEFT JOIN `004_customer` AS cus
          ON res.customer_id = cus.customer_id
        LEFT JOIN `004_room` AS room
          ON res.room_id = room.room_id
        WHERE 1";

if (isset($_GET["date_in"]) && $_GET["date_in"] != "") {
  $sql .= ' AND res.date_in = "' . $_GET["date_in"] . '"';
}

if (isset($_GET["date_out"]) && $_GET["date_out"] != "") {
  $sql .= ' AND res.date_in = "' . $_GET["date_out"] . '"';
}

if (isset($_GET["category_given"]) && $_GET["category_given"] != "") {
  $sql .= ' AND res.category_given = "' . $_GET["category_given"] . '"';
}

if (isset($_GET["category_charged"]) && $_GET["category_charged"] != "") {
  $sql .= ' AND res.category_charged = "' . $_GET["category_charged"] . '"';
}

$sql .= ' ORDER BY date_in';

$result = mysqli_query($conn, $sql);
$reservation = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_close($conn);

$row = "divide-x-1 divide-purple-300 border-b-1 border-purple-300 ,m-2";

foreach ($reservation as $res) {
  show_reservation_list($res);
}
