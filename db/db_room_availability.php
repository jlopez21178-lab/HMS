<?php require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/templates/header.php") ?>

<?php include(__DIR__ . "/db_connect.php"); ?>
<?php

$date_in = $_POST["date_in"];
$date_out = $_POST["date_out"];

$sql = "SELECT hotel.city, category.name FROM 004_room as room
        inner join 004_hotel as hotel 
          on hotel.hotel_id = room.hotel_id
        inner join 004_category as category 
          on category.category_id = room.category_id
        WHERE `room_id` NOT IN (SELECT room_id 
                              FROM `004_reservation` AS res 
                              WHERE res.date_in < '$date_out' AND res.date_out > '$date_in')
          Group BY hotel.hotel_id, room.category_id;";

$query = mysqli_query($conn, $sql);

$result = mysqli_fetch_all($query, MYSQLI_ASSOC);

echo "<table> <theader><th>City</th><th>Category</th></theader></tbody>";
// json_encode($res, JSON_PRETTY_PRINT)
foreach ($result as $res)
  echo "<tr><td>" . $res["city"] . "</td><td>" . $res["name"] . "</td><td><button class='cursor-pointer bg-purple-500 rounded-lg'>Reservar</button></td></tr>";


echo "</tbody></table>";


mysqli_close($conn);
?>

<?php require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/templates/footer.php") ?>