<?php
require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/template/header.php");
require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/db_connect.php");

// $sql = 'DELETE FROM `004_room` WHERE room_id = ' . $_GET["room_id"];
$sql = 'DELETE FROM `004_room` WHERE room_id = 300';
$res = mysqli_query($conn, $sql);
mysqli_close($conn); ?>

<div class='grow flex justify-center items-center'>
  <?php if ($res) { ?>
    <div class='p-10 bg-purple-200 rounded-lg border-1 border-purple-50'>
      <h3>Room deleted succesfully</h3>
    </div>
  <?php } else { ?>
    <div class='p-10 bg-red-200 rounded-lg border-1 border-red-50'>
      <h3>Error. The room was not deleted</h3>
    </div>
  <?php } ?>
</div>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/template/footer.php");
