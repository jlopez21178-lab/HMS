<?php require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/db_connect.php");
include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/func/php/move_to.php");

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
      $_SESSION["userRole"] = "customer";
      $_SESSION["userId"] = $user["customer_id"];
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
      $user = $stmt->get_result()->fetch_assoc();

      if ($user) {
        $_SESSION["userRole"] = $user["role"];
        $_SESSION["userId"] = $user["worker_id"];
        move_to("/student004/hotel/bo_index.php");
      } else {
        $not_found = "No se ha encontrado una cuenta con esas credenciales";
      }
    }
  }
}
