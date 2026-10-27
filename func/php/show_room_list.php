<?php function show_room_list($room)
{ ?>
  <tr class='divide-x-2 border-b-2 border-purple-200 divide-purple-200 divide-solid'>
    <td><?= $room["room_id"] ?></td>
    <td><?= $room["city"] ?></td>
    <td><?= $room["room_number"] ?></td>
    <td><?= $room["code"] ?></td>
    <td class='p-2 m-2'>
      <a href="/student004/hotel/form/room_modify.php?room_id=<?= $room["room_id"] ?>" class='p-2 cursor-pointer bg-purple-200 hover:bg-purple-500/40 rounded-lg' onclick="openModifyForm(<?= json_encode($room) ?> )">Modify</a>
    </td>
  </tr>
<?php } ?>