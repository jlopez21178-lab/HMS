<?php
require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/db_connect.php");

$conn = getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (preg_match("/^[a-zA-Z\s]+$/", $full_name)) {
    die();
  }

  // SQL statement
  $stmt = $conn->prepare("INSERT INTO `004_customer`(full_name, phone, email, nationality, identity_number, birthdate, id_expire_date
                        VALUES (?,?,?,?,?,?,?)");
  // Valores
  $stmt->bind_param(
    // s - textos/fechas - lo demas
    "sssssss",
    $full_name,
    $phone,
    $email,
    $nationality,
    $identity_number,
    $birthdate,
    $expire_date
  );

  $stmt->execute();

  $res = $stmt->affected_rows;

  mysqli_close($conn);
?>

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
<?php } ?>