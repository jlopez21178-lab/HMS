 <?php function show_reservation_list($res)
  {
    global $table_row_data;
    global $action_button;
    global $form_path;

    // calcular total dias
    $date_in = new DateTime($res["date_in"]);
    $date_out = new DateTime($res["date_out"]);
    $days = $date_in->diff($date_out)->d;

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
     <td><?= ($res["room_id"] ?? "") ?></td>
     <td><?= ($res["room_number"] ?? "") ?></td>
     <td><?= $res["date_in"] ?></td>
     <td><?= $res["date_out"] ?></td>
     <td><?= $days ?></td>
     <td><?= $res["cat_code_given"] . " / " . $res["cat_code_charged"] ?></td>
     <td></td>
     <td>
       <div class="flex text-center align-center <?= $action_button ?>">
         <details class="[&>a]:block open:[&>a]:border-t-1 open:[&>a]:border-purple-500/90">
           <summary class="marker:text-purple-600">
             <a href="<?= "$form_path/reservation_modify.php?reservation_id=$res[reservation_id]" ?>">Edit</a>
           </summary>
           <a href="<?= "$form_path/invoice.php?reservation_id=$res[reservation_id]" ?>">Invoice</a>
         </details>
       </div>
     </td>
   </tr>
 <?php } ?>