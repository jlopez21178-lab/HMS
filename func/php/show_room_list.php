<?php
include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/styles.php");
function show_room_list($room)
{
  global $table_row_data;
  global $table_button; ?>
  <tr class='<?= $table_row_data ?>'>
    <td><?= $room["room_id"] ?></td>
    <td><?= $room["city"] ?></td>
    <td><?= $room["room_number"] ?></td>
    <td><?= $room["code"] ?></td>
    <td class='p-2 m-2'>
      <a href="/student004/hotel/form/room_modify.php?room_id=<?= $room["room_id"] ?>" class="<?= $table_button ?> " onclick="openModifyForm(<?= json_encode($room) ?> )">Modify</a>
    </td>
  </tr>
<?php } ?>