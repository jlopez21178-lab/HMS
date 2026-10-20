<?php
require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/db_connect.php");


$sql = "SELECT * FROM `004_room` as room
        INNER JOIN `004_hotel` as hotel
          on hotel.hotel_id = room.hotel_id
        INNER JOIN `004_category` AS category 
          on category.category_id = room.category_id
        WHERE 1 = 1";

if (isset($_GET["city"]) && $_GET["city"] != "") {
  $sql .= " AND hotel.city = '" . $_GET["city"] . "'";
}

if (isset($_GET["category"]) && $_GET["category"] != "") {
  $sql .= " AND category.name = '" . $_GET["category"] . "'";
}

$res = mysqli_query($conn, $sql);

$rooms = mysqli_fetch_all($res, MYSQLI_ASSOC);
mysqli_close($conn);

if (count($rooms) > 0) {

  echo "<table class='text-center w-full'>
          <thead>
            <tr class='divide-x-2 divide-purple-300 border-b-2 border-purple-300 divide-dashed'>
              <th>Room ID</th>
              <th>Hotel city</th>
              <th>Room number</th>
              <th>Category</th>
              <th></th>
            </tr>
          </thead>
          <tbody>";

  // diseño de los botones modificar / eliminar

  $button = "<td>
              <div class='flex flex-col gap-2 m-2'>
                <button class='cursor-pointer bg-blue-200 hover:bg-blue-100 rounded-lg'>Modificar</button>
                <button class='cursor-pointer bg-red-200 hover:bg-red-100 rounded-lg'>Eliminar</button>
              </div>
            </td>
          </tr>";

  foreach ($rooms as $room) {
    echo "<tr class='divide-x-2 border-b-2 border-purple-200 divide-purple-200 divide-solid'>
            <td>" . $room["room_id"] . "</td>
            <td>" . $room["city"] . "</td>
            <td>" . $room["room_number"] . "</td>
            <td>" . $room["name"] . "</td>" . $button;
  }

  echo "</tbody></table>";
} else {
  echo "No se han encontrado resultados";
}
