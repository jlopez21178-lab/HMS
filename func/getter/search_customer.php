<?php
include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/db_connect.php");

header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);
$info = $data["customer_info"] ?? "";

if (!$info) {
  echo json_encode([]);
  exit;
}

$like = "%" . $info . "%";

$stmt = $conn->prepare(
  "SELECT * 
     FROM `004_customer` AS cus
     WHERE cus.full_name LIKE ?
     OR cus.email LIKE ?
     OR cus.phone LIKE ?
     OR cus.identity_number LIKE ?"
);

$stmt->bind_param("ssss", $like, $like, $like, $like);
$stmt->execute();

$customer_list = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
echo json_encode($customer_list);
