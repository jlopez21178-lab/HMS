<?php require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/templates/header.php") ?>

<?php include(__DIR__ . "/db_connect.php"); ?>
<?php

$date_in = $_POST["date_in"];
$date_out = $_POST["date_out"];

$sql = "SELECT * FROM room 
        WHERE `004_room_id` NOT IN (SELECT room_id 
                              FROM `004_reservation` AS res 
                              WHERE res.date_in < '$date_out' AND res.date_out > '$date_in')";

$query = mysqli_query($conn, $sql);

$result = mysqli_fetch_all($query, MYSQLI_ASSOC);

echo "<table> <theader><th>Room id</th><th>Hotel id</th></theader></tbody>";
// json_encode($res, JSON_PRETTY_PRINT)
foreach ($result as $res)
  echo "<tr><td>" . $res["room_id"] . "</td><td>" . $res["hotel_id"] . "</td><td><button class='cursor-pointer bg-purple-500 rounded-lg'>Reservar</button></td></tr>";


echo "</tbody></table>";


mysqli_close($conn);
?>

<?php require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/templates/footer.php") ?>