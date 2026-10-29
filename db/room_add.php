
<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/template/header.php") ?>

<?php require("./db_connect.php") ?>

<?php

if ($_SERVER["REQUEST_METHOD"] === "get") {
  $hotel_id = $_GET["hotel_id"];
  $room_number = $_GET["room_number"];
  $category_id = $_GET["category_id"];

  $sql = "INSERT INTO `004_room`(hotel_id, room_number, category_id) VALUES ('$hotel_id', '$room_number', '$category_id')";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    echo "Se ha añadido la habitacion";
  } else {
    echo "No se ha añadido la habitacion";
  }
}


mysqli_close($conn);
?>



<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/template/footer.php") ?>
