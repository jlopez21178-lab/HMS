<?php
// Tablas
$table = "table-auto text-center mt-5 w-full";
$table_row_head = "divide-x-1 divide-purple-600/30";
$table_row_data = "border-t-1 border-purple-600/30 hover:bg-purple-600/10 divide-x-1 divide-purple-600/30 [&>td]:p-2";
$table_button = "p-1 bg-purple-400/30 hover:cursor-pointer hover:bg-purple-400/40";

// Forms filtros
$filter = "flex gap-5 p-5 border-1 border-purple-200 rounded-lg";

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
    background: url("<?php echo $myroot ?>img/hotel-landscape.jpg");
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
  }
</style>