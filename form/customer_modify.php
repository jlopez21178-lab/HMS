<?php
require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/template/header.php");
require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/func/getter/get_customer.php");

$full_name = $_POST["full_name"] ?? $customer["full_name"] ?? "";
$phone = $_POST["phone"] ?? $customer["phone"] ?? "";
$email = $_POST["email"] ?? $customer["email"] ?? "";
$nationality = $_POST["nationality"] ?? $customer["nationality"] ?? "";
$document = $_POST["document"] ?? $customer["document"] ?? "";
$identity_number = $_POST["identity_number"] ?? $customer["identity_number"] ?? "";
$birthdate = $_POST["birthdate"] ?? $customer["birthdate"] ?? "";
$expire_date = $_POST["expire_date"] ?? $customer["expire_date"] ?? "";

require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/template/customer_file.php");
?>

<script>
  cancelBtn(document.getElementById("cancelBtn"));

  // Boton para aceptar los canvios
  const acceptBtn = document.getElementById("acceptBtn");
  acceptBtn.textContent = "Save and update";
</script>