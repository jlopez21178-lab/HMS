<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/db_connect.php");
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
if (isset($_POST["checkin"])) {
  $sql .= " AND res.status  = 'ongoing' AND res.date_in = ?";
  $type .= "s";
  $param[] = date("Y-m-d");
} else if (isset($_POST["ongoing"])) {
  $sql .= " AND res.status  = 'ongoing'";
} else if (isset($_POST["checkout"])) {
  $sql .= " AND res.status  = 'ongoing' AND res.date_out = ?";
  $type .= "s";
  $param[] = date("Y-m-d");
} else {
  if (isset($_POST["date_in"]) && $_POST["date_in"] != "") {
    $sql .= ' AND res.date_in = ?';
    $type .= "s";
    $param[] = $_POST["date_in"];
  }

  if (isset($_POST["date_out"]) && $_POST["date_out"] != "") {
    $sql .= ' AND res.date_in = ?';
    $type .= "s";
    $param[] = $_POST["date_out"];
  }

  if (isset($_POST["category_given"]) && $_POST["category_given"] != "") {
    $sql .= ' AND res.category_given = ?';
    $type .= "i";
    $param[] = $_POST["category_given"] . '"';
  }

  if (isset($_POST["category_charged"]) && $_POST["category_charged"] != "") {
    $sql .= ' AND res.category_charged = ?';
    $type .= "i";
    $param[] =  $_POST["category_charged"];
  }

  // si carga la pagina por primera vez no hay ningun status seleccionado por lo que ponemos de default las reservas en marcha
  $status = $_POST["status"] ?? "ongoing";
  $sql .= " AND res.status = ?";
  $type .= "s";
  $param[] = $status;
}

// el trabajador solo podra ver las reservas del hotel en el que trabaja
if ($_SESSION["user_role"] != "admin") {
  $sql .= " AND res.hotel_id = ?";
  $type .= "i";
  $param[] = $_SESSION["user_workplace"];
}

$stmt = $conn->prepare($sql);

if (!empty($param)) $stmt->bind_param($type, ...$param);

$stmt->execute();
$reservation = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
mysqli_close($conn);

if (count($reservation) > 0) {

  foreach ($reservation as $res) {
    show_reservation_list($res);
  }
} else {
  echo "<tr><td colspan='10'>No reservation founded</td></tr>";
}
