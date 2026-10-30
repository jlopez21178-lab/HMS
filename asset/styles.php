<link
  rel="stylesheet"
  type="text/css"
  href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/thin/style.css" />


<?php

// rutas
$formPath = "/student004/hotel/form";
$homePath = ($_SESSION["userRole"] == "guest" && $_SESSION["userRole"] == "customer") ? "/student004/hotel/" : "/student004/hotel/bo_index.php";


// Tablas
$table = "table-auto text-center mt-5 w-full";
$table_row_head = "divide-x-1 divide-purple-600/30";
$table_row_data = "border-t-1 border-purple-600/30 hover:bg-purple-600/10 divide-x-1 divide-purple-600/30 [&>td]:p-2";
$table_button = "p-1 bg-purple-400/30 hover:cursor-pointer hover:bg-purple-400/40";

// Forms filtros
$filter = "flex gap-5 p-5 border-1 border-purple-200 rounded-lg";

// Form file 
$title = "border-b-1 border-purple-600/30 text-2xl";
$section = "flex flex-col gap-10 mt-5 *:justify-between [&_input]:grow [&>*]:gap-10 [&>*]:flex [&>*]:items-center";
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