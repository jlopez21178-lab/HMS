<?php
require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/template/bo_header.php");
require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/db_connect.php");
// SQL statement
$stmt = $conn->prepare("INSERT INTO `004_customer`(full_name, phone, email, nationality, identity_number, birthdate, id_expire_date
                        VALUES (?,?,?,?,?,?,?)");
// Valores
$stmt->bind_param(
  // i - integer - customer_id
  // s - textos/fechas - lo demas
  "sssssss",
  $_GET["full_name"],
  $_GET["phone"],
  $_GET["email"],
  $_GET["nationality"],
  $_GET["identity_number"],
  $_GET["birthdate"],
  $_GET["id_expire_date"]
);

$stmt->execute();

$res = $stmt->affected_rows; ?>

<div class="<?= $execute_container ?>">
  <?php if ($res > 0) { ?>
    <div class="<?= $execute_correct ?>">
      <p>Customer succesfully created</p>
    </div>
  <?php } else { ?>
    <div class="<?= $execute_error ?>">
      <p>An error occured and the customer was not added</p>
    </div>
  <?php } ?>
</div>