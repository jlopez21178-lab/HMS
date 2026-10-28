<?php

function show_room($room)
{

  $room_default =  "this.onerror=null; this.src='/student004/hotel/img/room/default.jpg'";
  $room_img = "/student004/hotel/img/room/hotel-" . $room["hotel_id"] . "-category-" . $room["category_id"];
?>

  <div class="flex rounded-lg  border-black border-1 justify-between w-[70vw] bg-purple-500/10 backdrop-blur-lg">
    <img class="rounded-lg max-h-[200px] aspect-3/2" src="<?= $room_img ?>"
      onerror=" <?= $room_default ?>">
    <div class=" p-3 w-full flex flex-col justify-around">
      <h1><b>Ciudad: <?= $room["city"] ?></b></h1>
      <p>Categoria: <?= $room["category_name"] ?></p>
      <button class="cursor-pointer bg-purple-500 rounded-lg">Reservar</button>
    </div>
  </div>
<?php } ?>