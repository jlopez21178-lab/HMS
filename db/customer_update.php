<?php
require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/db_connect.php");
include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/template/bo_header.php");

// SQL statement
$stmt = $conn->prepare("UPDATE `004_customer`
                        SET full_name = ?,
                            phone = ?,
                            email = ?,
                            nationality = ?,
                            identity_number = ?,
                            birthdate = ?,
                            id_expire_date = ?
                        WHERE customer_id = ?");
// Valores
$stmt->bind_param(
  // i - integer - customer_id
  // s - textos/fechas - lo demas
  "sssssssi",
  $_GET["full_name"],
  $_GET["phone"],
  $_GET["email"],
  $_GET["nationality"],
  $_GET["identity_number"],
  $_GET["birthdate"],
  $_GET["id_expire_date"],
  $_GET["customer_id"]
);
// Ejecutar sql
$executed = $stmt->execute();
// Obtener confirmacion

$res = $stmt->affected_rows; ?>

<div class="<?= $execute_container ?>">
  <?php if ($executed && $res > 0) { ?>
    <div class="<?= $execute_correct ?>">
      <p>Customer - <?= $_GET["customer_id"] ?>: has been succesfully updated</p>
    </div>
  <?php } else { ?>
    <div class="<?= $execute_error ?>">
      <p>Customer - <?= $_GET["customer_id"] ?>: an error occured and the customer has not been updated</p>
    </div>
  <?php } ?>
</div>