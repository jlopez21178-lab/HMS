<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/db_connect.php");
require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/template/header.php");

$conn = get_connection();

// SQL statement
$stmt = $conn->prepare("UPDATE `004_customer`
                        SET full_name = ?,
                            phone = ?,
                            email = ?,
                            nationality = ?,
                            identity_number = ?,
                            birthdate = ?,
                            expire_date = ?
                        WHERE customer_id = ?");
// Valores
$stmt->bind_param(
      // s - textos/fechas 
      "ssssssssi",
      $full_name,
      $phone,
      $email,
      $nationality,
      $document,
      $identity_number,
      $birthdate,
      $expire_date,
      $customer_id
    );

// Ejecutar sql
$executed = $stmt->execute();
// Obtener confirmacion

$res = $stmt->affected_rows;
mysqli_close($conn);
?>

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