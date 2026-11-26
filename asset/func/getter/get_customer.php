<?php

require_once($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/db_connect.php");

$conn = get_connection();

$stmt = $conn->prepare("SELECT * FROM `004_customer` WHERE customer_id = ?");
$stmt->bind_param("i", $_GET["customer_id"]);
$stmt->execute();
$customer = $stmt->get_result()->fetch_all(MYSQLI_ASSOC)[0];

mysqli_close($conn);
