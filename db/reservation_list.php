<?php

include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/db_connect.php");

$sql = "SELECT *, 
        (SELECT code FROM `004_category` WHERE category_id = res.category_given) AS 'cat_code_given', 
        (SELECT code FROM `004_category` WHERE category_id = res.category_charged) AS 'cat_code_charged'
        FROM `004_reservation` AS res
        JOIN `004_customer` AS cus
          ON res.customer_id = cus.customer_id
        JOIN `004_room` AS room
          ON res.room_id = room.room_id
        WHERE 1";

if (isset($_GET["date_in"]) && $_GET["date_in"] != "") {
  $sql .= ' AND res.date_in = "' . $_GET["date_in"] . '"';
}

if (isset($_GET["date_out"]) && $_GET["date_out"] != "") {
  $sql .= ' AND res.date_in = "' . $_GET["date_out"] . '"';
}

if (isset($_GET["category_given"]) && $_GET["category_given"] != "") {
  $sql .= ' AND res.category_given = "' . $_GET["category_given"] . '"';
}

if (isset($_GET["category_charged"]) && $_GET["category_charged"] != "") {
  $sql .= ' AND res.category_charged = "' . $_GET["category_charged"] . '"';
}

$result = mysqli_query($conn, $sql);
$reservation = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_close($conn);

$row = "divide-x-1 divide-purple-300 border-b-1 border-purple-300 ,m-2";
?>



<?php foreach ($reservation as $res) {
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
    <td></td>
    <td><?= $res["date_in"] ?></td>
    <td><?= $res["date_out"] ?></td>
    <td><?= $days->days ?></td>
    <td><?= $res["cat_code_given"] . " / " . $res["cat_code_charged"] ?></td>
    <td></td>
  </tr>
<?php } ?>