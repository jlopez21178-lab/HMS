<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/db_connect.php");


function get_available_room(int $category_id, string $date_in, string $date_out, int|string $room_id)
{
  $conn = get_connection();

  $stmt = $conn->prepare(
    "SELECT room.room_id, room.room_number FROM `004_room` AS room 
     WHERE room.room_id NOT IN (SELECT res.room_id
                                FROM `004_reservation` AS res
                                WHERE  res.date_in < ? AND res.date_out > ?  AND res.room_id IS NOT null AND res.room_id != ? )
      AND room.hotel_id = ? AND room.category_id = ?
    ORDER BY CAST(room.room_number AS unsigned)"
  );

  $stmt->bind_param("ssiii", $date_out, $date_in, $room_id, $_SESSION["user_workplace"], $category_id);
  $stmt->execute();
  $room = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);


  mysqli_close($conn);

  return $room;
}
