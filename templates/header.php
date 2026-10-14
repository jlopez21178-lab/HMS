<?php
$myroot = "/student004/hotel/";
?>

<!-- server: remotehost.es -->
<!-- hostname: remotehost.es -->
<!-- database: dweshoteldb -->
<!-- user: student004 -->
<!-- password: DWES20261014jordi2044! -->
<!-- ftp -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aurelia Grand Hotel</title>
  <link rel="icon" href="<?php echo $myroot; ?>img/aurelia-grand-hotel-logo.png" type="image/png" />
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4">
  </script>

  <style>
    .column {
      display: flex;
      flex-direction: column;
    }
  </style>

</head>

<body class="bg-purple-100 flex flex-col min-h-screen">
  <nav class="bg-black flex justify-between items-center p-5 sticky shadow-lg shadow-purple-400">
    <img src="<?php echo $myroot; ?>img/aurelia-grand-hotel-logo.svg" type="image/svg" alt="logo web" class="max-w-15 text-shadow-purple-300 text-shadow-lg" />
    <a href="<?php echo $myroot ?>" class="text-white">Aurelia Grand Hotel</a>
    <div class="text-white ">
      <button class="cursor-pointer ring-lg p-2 ring-purple-600">Log In</button>
      <button class="cursor-pointer bg-purple-600 p-2 rounded-lg">Sign up</button>
    </div>
  </nav>

  <nav class="sticky bg-white flex">
    <details class="column p-3">
      <summary>Rooms</summary>
      <a href="<?php echo $myroot . "form/form_select_room.php" ?>" class="block">Select</a>
      <a href="<?php echo $myroot . "form/form_insert_room.php" ?> " class="block">Insert</a>
      <a href="#" class="block">Modify</a>
    </details>
    <details class="column p-3">
      <summary>Customers</summary>
      <a href="" class="block">Select</a>
      <a href="#" class="block">Add</a>
      <a href="#" class="block">Modify</a>
    </details>
  </nav>