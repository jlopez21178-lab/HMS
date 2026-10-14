
<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/templates/header.php") ?>

<?php require("./db/db_connect.php") ?>

<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $hotel_id = $_POST["hotel_id"];
  $room_number = $_POST["room_number"];
  $category_id = $_POST["category_id"];

  $sql = "INSERT INTO `004_room`(hotel_id, room_number, category_id) VALUES ('$hotel_id', '$room_number', '$category_id')";

  $query = mysqli_query($conn, $sql);
  $result = mysqli_fetch_all($query);

  if ($result) {
    echo "Se ha añadido la habitacion";
  } else {
    echo "No se ha añadido la habitacion";
  }
}


mysqli_close($conn);
?>



<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/templates/footer.php") ?>
