<?php
require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/db_connect.php");

// common media type
header("Content-Type: application/json");

// cojer el json con los datos del cliente
$data = json_decode(file_get_contents("php://input"), true);

if (empty($data)) {
  echo json_encode(["successful" => false]);
  exit;
}

$stmt = $conn->prepare(
  "INSERT 
   INTO `004_reservation`(hotel_id, 
                          customer_id, 
                          date_in, 
                          date_out,
                          category_given, 
                          category_charged, 
                          price_night)
   VALUES (?,?,?,?,?,?,?);
"
);

// TODO seleccionar el hotel por el hotel_id donde trabaja el que hace la reserva y quitar el default de 1

$stmt->bind_param(
  "iissiid",
  1,
  $data["customer_id"],
  $data["date_in"],
  $data["date_out"],
  $data["category_given"],
  $data["category_charged"],
  $data["price_night"]
);

$stmt->execute();

// Si es mayor a 0 las filas afectadas significa que se ha insertado la reserva
echo json_encode(["successful" => ($stmt->affected_rows > 0)]);
