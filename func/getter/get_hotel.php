<?php 
include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/db_connect.php");

$sql = "SELECT * from `004_hotel`";
$res = mysqli_query($conn, $sql);
$hotel = mysqli_fetch_all($res, MYSQLI_ASSOC);


mysqli_close($conn);
