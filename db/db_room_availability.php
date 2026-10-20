<?php

require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/templates/header.php");

include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/db_connect.php");


$date_in = $_GET["date_in"];
$date_out = $_GET["date_out"];

$sql = "SELECT hotel.hotel_id,hotel.city, category.category_id, category.name FROM 004_room as room
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


$room_default =  "this.onerror=null; this.src='" . $myroot . "img/room/default.jpg'";
echo "<section class='grow m-5 flex flex-col justify-center items-center gap-10'>";

foreach ($result as $res) {

  $room_img = $myroot . "img/room/hotel-" . $res["hotel_id"] . "-category-" . $res["category_id"];

  echo '<div class="flex rounded-lg  border-black border-1 justify-between w-[70vw] bg-purple-500/10 backdrop-blur-lg">
          <img class="rounded-lg max-h-[200px] aspect-3/2" 
              src="' . $room_img .  '" onerror= "' . $room_default . '">
          <div class=" p-3 w-full flex flex-col justify-around">
            <h1><b>Ciudad: ' . $res["city"] . '</b></h1>
            <p>Categoria: ' . $res["name"] . '</p>
            <button class="cursor-pointer bg-purple-500 rounded-lg">Reservar</button>
          </div>
        </div>';
}

echo "</section>";


mysqli_close($conn);




require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/templates/footer.php")
?>