<?php
require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/db_connect.php");
include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/func/php/show_customer_list.php");

$sql = "SELECT * FROM `004_customer` AS cus WHERE 1";

if (isset($_GET["customer_info"]) && $_GET["customer_info"] != "") {
  $info = $_GET["customer_info"];
  $sql .= ' AND (cus.full_name LIKE "%' . $info . '%" 
            OR (cus.email) LIKE "%' . $info . '%")';
}

$result = mysqli_query($conn, $sql);
$customer = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach ($customer as $cus) {
  show_customer_list($cus);
}
