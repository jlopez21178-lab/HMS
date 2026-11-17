<?php
require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/db_connect.php");
include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/func/php/move_to.php");

$conn = getConnection();

$not_found = "";
$email = $_POST["email"] ?? "";
$password = $_POST["password"] ?? "";
$errors = ["email" => "", "password" => ""];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Comprobacion de que los datos son validos
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors["email"] = "Email syntax not valid";
  } else {
    // TODO desanidar tanto if-else


    // Preparar consulta para customer
    $stmt = $conn->prepare("SELECT * 
                        FROM `004_customer` AS cus 
                        WHERE cus.email = ? 
                        AND cus.password = ?");


    // Asociar valores
    $stmt->bind_param("ss", $email, $password);
    // Executar
    $stmt->execute();
    // Obtener resultado
    $user = $stmt->get_result()->fetch_assoc();

    if ($user) {
      $_SESSION["user_role"] = "customer";
      $_SESSION["user_id"] = $user["customer_id"];
      move_to("/student004/hotel/index.php");
    } else {
      // Si no es cliente comprobar si es trabajador o se ha equivocado

      // Preparar consulta para trabajadores
      $stmt = $conn->prepare("SELECT * 
                        FROM `004_worker` AS worker 
                        WHERE worker.email = ? 
                        AND worker.password = ?");


      // Asociar valores
      $stmt->bind_param("ss", $email, $password);
      // Executar
      $stmt->execute();
      // Obtener resultado
      $worker = $stmt->get_result()->fetch_assoc();

      if ($worker) {
        $_SESSION["user_role"] = $worker["role"];
        $_SESSION["user_id"] = $worker["worker_id"];
        $_SESSION["user_workplace"] = $worker["works_at"];

        move_to("/student004/hotel/bo_index.php");
      } else {
        $not_found = "No se ha encontrado una cuenta con esas credenciales";
      }
    }
  }
}

mysqli_close($conn);
