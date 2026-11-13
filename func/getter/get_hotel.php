<?php
include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/db_connect.php");

$stmt = $conn->prepare("SELECT * from `004_hotel`");
$stmt->execute();
$hotel = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

mysqli_close($conn);
