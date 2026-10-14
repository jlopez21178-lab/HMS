<?php require("./db_connect.php"); ?>
<?php


$sql = "SELECT * FROM `004_room` AS room WHERE 1=1 ";

if (isset($_GET["category"])) {
  $sql .= 'AND room.category_id = $_GET["category"]';
}



$result = mysqli_query($conn, $sql);

$rooms = mysqli_fetch_all($result, MYSQLI_ASSOC);
// 
echo json_encode($rooms);

mysqli_close($conn);
?>



