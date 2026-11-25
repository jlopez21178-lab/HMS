<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/db_connect.php");

$conn = get_connection();
$full_name = $_POST["full_name"] ?? "";
$phone = $_POST["phone"] ?? "";
$email = $_POST["email"] ?? "";
$nationality = $_POST["nationality"] ?? "";
$document = $_POST["document"] ?? "";
$identity_number = $_POST["identity_number"] ?? "";
$birthdate = $_POST["birthdate"] ?? "";
$expire_date = $_POST["id_expire_date"] ?? "";

$error = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {


  if (!preg_match("/^[a-zA-Z\s]+$/", $full_name)) {
    $error["full_name"] = "No valid name";
  }

  if (!$phone) {
    $error["phone"] = "Phone input can't be empty";
  } else if (!preg_match("/^\+([1-9])+(\s)*([1-9]\s)+/", $phone)) {
    $error["phone"] = "Phone number not valid";
  }

  if (!$email) {
    $error["email"] = "Email can not be empty";
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error["email"] = "Email form not accepted";
  }

  if ($nationality === -1) {
    $error["nationality"] = "Select a nationality from the list";
  }

  if ($document === -1) {
    $error["document"] = "Select a type of document from the list";
  }

  if (!$identity_number) {
    $error["identity_number"] = "Insert an identity number";
  }

  if (!$birthdate) {
    $error["birthdate"] = "Select a birth date";
  } else {
    $today = new DateTime(date("Y-m-d"));
    $date_inserted = new DateTime($birthdate);
    $age_inserted = $today->diff($date_inserted)->y;
    $minimun_age_accepted = 18;

    if ($age_inserted < $minimun_age_accepted) {
      $error["birthdate"] = "Minimum age required: $minimun_age_accepted years";
    }
  }

  // TODO finalizar control errores


  if (empty($error)) {
    // SQL statement
    $stmt = $conn->prepare("INSERT INTO `004_customer`(full_name, phone, email, nationality, document, identity_number, birthdate, id_expire_date
                        VALUES (?,?,?,?,?,?,?,?)");
    // Valores
    $stmt->bind_param(
      // s - textos/fechas 
      "ssssssss",
      $full_name,
      $phone,
      $email,
      $nationality,
      $document,
      $identity_number,
      $birthdate,
      $expire_date
    );

    $stmt->execute();
  }
  $res = $stmt->affected_rows ?? 0;
  mysqli_close($conn);

  if ($res > 0) { ?>
    <div class="<?= $execute_correct ?> ">
      <p>Customer succesfully created</p>
    </div>
  <?php } else { ?>
    <div class="<?= $execute_error ?> ">
      <p>An error occured and the customer was not added</p>
    </div>
<?php }
} ?>