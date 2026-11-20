<link
  rel="stylesheet"
  type="text/css"
  href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/thin/style.css" />


<?php

// customers styles
$cus_form = "flex flex-col  items-center backdrop-blur-sm rounded-xl h-fit w-fit border-1 border-purple-200 bg-purple-500/20 gap-10 p-10 text-white";
$cus_action_button = "p-3 ring-1 ring-purple-600 cursor-pointer w-fit rounded-lg text-purple-50 hover:bg-purple-600 transition hover:-translate-y-1 hover:scale-110 hover:shadow-lg hover:shadow-purple-400";

// rutas
$form_path = "/student004/hotel/form";
$homePath = "/student004/hotel/";

// Tablas
$table = "table-auto text-center mt-5 w-full";
$table_row_head = "divide-x-1 divide-purple-600/30";
$table_row_data = "border-t-1 border-purple-600/30 hover:bg-purple-600/10 divide-x-1 divide-purple-600/30 [&>td]:p-2";

// Form filtros
$filter = "flex gap-5 p-5 border-1 border-purple-200 rounded-lg";
$filter_input = "flex items-center gap-2";

// Form datos
$form = "[&>article]:mt-5 max-w-[50vw] grow";
$form_container = "p-5 grow flex  justify-center";
$title = "border-b-1 border-purple-600/30 text-2xl";
$section = "flex flex-col gap-10 mt-5 *:justify-between [&_input]:grow [&>*]:gap-10 [&>*]:flex [&>*]:items-center";

// botones
$btn = "px-5 py-3 rounded-lg";
$btn_container = "flex justify-around w-[100%] mt-[30%]";
$btn_accept = $btn . " bg-blue-400/30 hover:bg-blue-400/50";
$btn_cancel = $btn . " bg-red-400/30 hover:bg-red-400/50";
$btn_delete = "";
$action_button = "p-1 bg-purple-400/30 hover:cursor-pointer hover:bg-purple-400/40";

// errores
$error_text = "text-red-500/50";

// comando sql ejecutado correctamente / error
$execute_container = "flex flex-col justify-center items-center grow";
$execute_correct = "p-15 bg-green-400/30 rounded-lg ";
$execute_error = "p-15 bg-red-400/30 rounded-lg";

// menu lateral
$menu = "bg-purple-50 flex flex-col p-5 w-auto sticky top-[100px] h-[calc(100vh-100px)] overflow-y-auto min-w-max  [&>details]:mb-3 [&>*>a]:block";
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
    background: url("/student004/hotel/asset/img/hotel-landscape.jpg");
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