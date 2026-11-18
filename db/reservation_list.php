<?php
// require_once($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/db_connect.php");
 require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/func/php/show_reservation_list.php");

$conn = getConnection();

$type = "";
$param = [];
$sql = "SELECT *, 
        (SELECT category_code FROM `004_category` WHERE category_id = res.category_given) AS 'cat_code_given', 
        (SELECT category_code FROM `004_category` WHERE category_id = res.category_charged) AS 'cat_code_charged'
        FROM `004_reservation` AS res
        LEFT JOIN `004_customer` AS cus
          ON res.customer_id = cus.customer_id
        LEFT JOIN `004_room` AS room
          ON res.room_id = room.room_id
        WHERE 1";

if (isset($_GET["date_in"]) && $_GET["date_in"] != "") {
  $sql .= ' AND res.date_in = ?';
  $type .= "s";
  $param[] = $_GET["date_in"];
}

if (isset($_GET["date_out"]) && $_GET["date_out"] != "") {
  $sql .= ' AND res.date_in = ?';
  $type .= "s";
  $param[] = $_GET["date_out"];
}

if (isset($_GET["category_given"]) && $_GET["category_given"] != "") {
  $sql .= ' AND res.category_given = ?';
  $type .= "i";
  $param[] = $_GET["category_given"] . '"';
}

if (isset($_GET["category_charged"]) && $_GET["category_charged"] != "") {
  $sql .= ' AND res.category_charged = ?';
  $type .= "i";
  $param[] =  $_GET["category_charged"];
}


$stmt = $conn->prepare($sql);

if (!empty($param)) $stmt->bind_param($type, ...$param);

$stmt->execute();
$reservation = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
mysqli_close($conn);

foreach ($reservation as $res) {
  show_reservation_list($res);
}
