<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/db_connect.php");


function get_available_room($category_id, $date_in, $date_out)
{
  $conn = get_connection();

  $stmt = $conn->prepare(
    "SELECT * FROM `004_room` AS room 
     WHERE room.room_id NOT IN (SELECT res.room_id
                                FROM `004_reservation` AS res
                                WHERE  res.date_in < ? AND res.date_out > ?  AND res.room_id IS NOT null )
      AND room.hotel_id = ? AND room.category_id = ?
    ORDER BY room.room_number"
  );

  $stmt->bind_param("ssii", $date_out, $date_in, $_SESSION["user_workplace"], $category_id);
  $stmt->execute();
  $room = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);


  mysqli_close($conn);
  print_r($room);

  return $room;
}
