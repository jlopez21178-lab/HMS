<?php include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/db_connect.php");

$sql = "SELECT * FROM `004_category`";
$res = mysqli_query($conn, $sql);
$category = mysqli_fetch_all($res, MYSQLI_ASSOC);

mysqli_close($conn); 

?>
