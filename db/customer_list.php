<?php
require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/db_connect.php");
include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/func/php/show_customer.php");

$sql = 'SELECT * FROM `004_customer` WHERE 1';
$result = mysqli_query($conn, $sql);
$customer = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<table class="table-auto">
  <thead>
    <th>Customer id</th>
    <th>Name</th>
    <th>Phone</th>
    <th>Email</th>
  </thead>
  <tbody>
    <?php foreach ($customer as $cus) {
      show_customer($cus);
    } ?>
  </tbody>
</table>