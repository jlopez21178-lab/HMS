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

if (isset($_GET["category_name"]) && $_GET["category_name"] != "") {
  $sql .= " AND category.category_name = '" . $_GET["category_name"] . "'";
}

$res = mysqli_query($conn, $sql);

$rooms = mysqli_fetch_all($res, MYSQLI_ASSOC);
mysqli_close($conn);

// Si hay resultados el array $rooms sera mayor a 0, 
if (count($rooms) > 0) {
  // encabezado de la tabla
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
          <tbody >";


  foreach ($rooms as $room) {
    echo "<tr class='divide-x-2 border-b-2 border-purple-200 divide-purple-200 divide-solid'>
            <td>" . $room["room_id"] . "</td>
            <td>" . $room["city"] . "</td>
            <td>" . $room["room_number"] . "</td>
            <td>" . $room["category_name"] . "</td>
            <td class='p-2 m-2'>
                <button class='p-2 cursor-pointer bg-purple-200 hover:bg-purple-500/40 rounded-lg' onclick='openModifyForm(" . json_encode($room) . ")'>Modify</button>
            </td>
          </tr>";
  }

  echo "</tbody></table>";
} else {
  echo "No se han encontrado resultados";
}

?>

<script>
  function openModifyForm(room) {
    const params = new URLSearchParams(room);
    window.location.href = '/student004/hotel/form/form_modify_room.php?' + params.toString();
  }
</script>