<?php
require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/db_connect.php");
include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/func/php/show_customer_list.php");

$conn = getConnection();

$type = "";
$param = [];
$sql = "SELECT * FROM `004_customer` AS cus WHERE 1";

if (isset($_GET["customer_info"]) && $_GET["customer_info"] != "") {
  $sql .= ' AND (cus.full_name LIKE ?) OR (cus.email LIKE ? )';
  $type = "ss";
  $info = "%" . $_GET["customer_info"] . "%";
  $param[] = $info;
  $param[] = $info;
}

$stmt = $conn->prepare($sql);

if (!empty($param)) $stmt->bind_param($type, ...$param);

$stmt->execute();
$customer = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

mysqli_close($conn);

foreach ($customer as $cus) {
  show_customer_list($cus);
}
