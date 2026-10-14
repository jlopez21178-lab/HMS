<?php require("./db_connect.php"); ?>
<?php
$sql = "Select * FROM `004_room`";
$result = mysqli_query($conn, $sql);
$rooms = mysqli_fetch_all($result, MYSQLI_ASSOC);
// echo "<b>ROOM ID</b> | <b>ROOM NUMBER</b> | <b>CATEGORY ID</b> <br>";
// foreach ($rooms as $room) {
//   echo $room["room_id"] . " |\n " . $room["room_number"] . " | " . $room["category_id"] . "<br>";
// }

echo json_encode($rooms, JSON_PRETTY_PRINT);

mysqli_close($conn);
?>



