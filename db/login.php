<?php require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/db_connect.php");

$error = "";
if (isset($_GET["email"]) && isset($_GET["password"])) {

  // Preparar consulta para customer
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
    // Si no es cliente comprobar si es trabajador o se ha equivocado

    // Preparar consulta para trabajadores
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
} ?>