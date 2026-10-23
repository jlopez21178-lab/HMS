<?php

include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/db_connect.php");

$sql = "SELECT * 
        FROM `004_reservation` AS res
        INNER JOIN `004_customer` AS cus
          ON res.customer_id = cus.customer_id 
        WHERE 1";

if (isset($_GET["date_in"]) && $_GET["date_in"] != "") {
  $sql .= ' AND res.date_in = "' . $_GET["date_in"] . '"';
}

if (isset($_GET["date_out"]) && $_GET["date_out"] != "") {
  $sql .= ' AND res.date_in = "' . $_GET["date_out"] . '"';
}

if (isset($_GET["category_given"]) && $_GET["category_given"] != "") {
  $sql .= ' AND res.date_in = "' . $_GET["category_given"] . '"';
}

$result = mysqli_query($conn, $sql);
$reservation = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_close($conn);

$row = "divide-x-1 divide-purple-300 border-b-1 border-purple-300";
?>


<table class="w-full table-auto">

  <thead>
    <tr class="<?= $row ?>">
      <th>Reservation number</th>
      <th>Customer</th>
      <th>Room id</th>
      <th>Room number</th>
      <th>Date in</th>
      <th>Date out</th>
      <th>Days</th>
      <th>Category</th>
      <th>Cost</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($reservation as $res) {
      // calcular total dias
      $date_in = new DateTime($res["date_in"]);
      $date_out = new DateTime($res["date_out"]);
      $days = $date_in->diff($date_out);
    ?>

      <tr class="<?= $row ?> text-center hover:bg-fuchsia-900/20 hover:divide-purple-900/30">
        <td><?= $res["reservation_number"] ?></td>
        <td><?= $res["full_name"]  ?></td>
        <td><?= ((isset($res["room_id"])) ? $res["room_id"] : "") ?></td>
        <td></td>
        <td><?= $res["date_in"] ?></td>
        <td><?= $res["date_out"] ?></td>
        <td><?= $days->days ?></td>
        <td><?= $res["category_given"] . " / " . $res["category_charged"] ?></td>
        <td></td>
      </tr>
    <?php } ?>
  </tbody>
</table>