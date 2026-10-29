<?php require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/db_connect.php");

session_start();

$error = "";
$_SESSION["userRole"] = "guest";
if (isset($_GET["email"]) && isset($_GET["password"])) {

  // Preparar consulta
  $stmt = $conn->prepare("SELECT * 
                        FROM `004_customer` AS cus 
                        WHERE cus.email = ? 
                        AND cus.password = ?");


  // Asociar valores
  $stmt->bind_param("ss", $_GET["email"], $_GET["password"]);
  // Executar
  $stmt->execute();
  // Obtener resultado
  $user = $stmt->get_result()->fetch_assoc();

  if ($user) {
    $_SESSION["userRole"] = "customer";
  } else {
    $stmt = $conn->prepare("SELECT * 
                        FROM `004_worker` AS worker 
                        WHERE worker.email = ? 
                        AND worker.password = ?");


    // Asociar valores
    $stmt->bind_param("ss", $_GET["email"], $_GET["password"]);
    // Executar
    $stmt->execute();
    // Obtener resultado
    $user = $stmt->get_result()->fetch_assoc();

    if ($user) {
      $_SESSION["userRole"] = $user["role"]; ?>
      <script>
        window.location.href = "/student004/hotel/bo_index.php";
      </script>
<?php } else {
      $error = "No se ha encontrado una cuenta con esas credenciales";
    }
  }
}
