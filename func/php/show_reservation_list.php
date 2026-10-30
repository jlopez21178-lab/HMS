 <?php function show_reservation_list($res)
  {
    global $table_row_data;

    // calcular total dias
    $date_in = new DateTime($res["date_in"]);
    $date_out = new DateTime($res["date_out"]);
    $days = $date_in->diff($date_out);

    $statusStyle = "rounded-lg ";
    $statusStyle .= match ($res["status"]) {
      'pendent' => "bg-slate-800/50",
      'ongoing' => "bg-green-300/70",
      'finished' => "bg-olive-500/30",
      'eliminated' => "bg-red-500/30"
    };
  ?>

   <tr class="<?= $table_row_data ?>">
     <td><?= $res["reservation_number"] ?>
       <div class="<?= $statusStyle ?>">
         <?= $res["status"] ?>
       </div>
     </td>
     <td><?= $res["full_name"]  ?></td>
     <td><?= ((isset($res["room_id"])) ? $res["room_id"] : "") ?></td>
     <td><?= ((isset($res["room_number"])) ? $res["room_number"] : "") ?></td>
     <td><?= $res["date_in"] ?></td>
     <td><?= $res["date_out"] ?></td>
     <td><?= $days->days ?></td>
     <td><?= $res["cat_code_given"] . " / " . $res["cat_code_charged"] ?></td>
     <td></td>
   </tr>
 <?php } ?>