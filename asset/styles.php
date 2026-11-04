<link
  rel="stylesheet"
  type="text/css"
  href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/thin/style.css" />


<?php

// rutas
$formPath = "/student004/hotel/form";
$homePath = ($_SESSION["userRole"] == "guest" || $_SESSION["userRole"] == "customer") ? "/student004/hotel/" : "/student004/hotel/bo_index.php";


// Tablas
$table = "table-auto text-center mt-5 w-full";
$table_row_head = "divide-x-1 divide-purple-600/30";
$table_row_data = "border-t-1 border-purple-600/30 hover:bg-purple-600/10 divide-x-1 divide-purple-600/30 [&>td]:p-2";
$table_button = "p-1 bg-purple-400/30 hover:cursor-pointer hover:bg-purple-400/40";

// Form filtros
$filter = "flex gap-5 p-5 border-1 border-purple-200 rounded-lg";

// Form datos
$form = "[&>div]:mt-5 max-w-[50vw] grow";
$form_container = "p-5 grow flex  justify-center";
$title = "border-b-1 border-purple-600/30 text-2xl";
$section = "flex flex-col gap-10 mt-5 *:justify-between [&_input]:grow [&>*]:gap-10 [&>*]:flex [&>*]:items-center";

$btn_container = "flex justify-around w-[100%] mt-[30%]";
$btn_accept = "px-5 py-3 rounded-lg bg-blue-400/30 hover:bg-blue-400/50 hover:cursor-pointer";
$btn_cancel = "px-5 py-3 rounded-lg bg-red-400/30 hover:bg-red-400/50 hover:cursor-pointer";
$btn_delete = "";

// comando sql ejecutado correctamente / error
$execute_container = "flex flex-col justify-center items-center grow";
$execute_correct = "p-15 bg-green-400/30 rounded-lg ";
$execute_error = "p-15 bg-red-400/30 rounded-lg";
?>

<!-- CSS -->
<style>
  * {
    box-sizing: border-box;
  }

  input[type="text"],
  input[type="password"] {
    outline: 2px solid purple;
    padding: 4px;
    border-radius: 10px;
  }

  .landscape {
    background: url("/student004/hotel/img/hotel-landscape.jpg");
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
  }
</style>

<!-- JS -->
<script>
  function cancelBtn(btn) {
    btn.addEventListener("click", (e) => {
      e.preventDefault();
      window.location.href = "<?= $homePath ?>";
    });
  }
</script>