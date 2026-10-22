<?php
// $myroot = $_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/";
$myroot = "/student004/hotel/";
$form_label = "flex p-2 justify-between w-[100%] items-center rounded-lg";
$form = "flex items-center flex-col grow p-5";


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aurelia Grand Hotel</title>
  <link rel="icon" href="<?php echo $myroot; ?>img/aurelia-grand-hotel-logo.png" type="image/png" />
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4">
  </script>
</head>

<style>
  * {
    /* padding: 0; */
    /* margin: 0; */
    box-sizing: border-box;
  }

  input[type="text"] {
    outline: 2px solid purple;
    padding: 4px;
    border-radius: 10px;
  }
</style>

<body class="bg-purple-100 flex flex-col min-h-screen">
  <header>

    <nav class="bg-black flex justify-between items-center p-5 sticky shadow-lg shadow-purple-400 z-3">
      <img src="<?php echo $myroot; ?>img/aurelia-grand-hotel-logo.svg" type="image/svg" alt="logo web" class="max-w-15 text-shadow-purple-300 text-shadow-lg" />
      <a href="<?php echo $myroot ?>" class="text-white">Aurelia Grand Hotel</a>
      <div class="text-white ">
        <button class="cursor-pointer rounded-lg ring-1 p-2 ring-purple-600 hover:ring-purple-500">Log In</button>
        <button class="cursor-pointer bg-purple-600 p-2 rounded-lg hover:bg-purple-500">Sign up</button>
      </div>
    </nav>

    <nav class="sticky bg-purple-50 flex gap-10 p-5 left">
      <details class="column hover:cursor-pointer ">
        <summary>Rooms</summary>
        <a href="<?php echo $myroot . "form/form_select_room.php" ?>" class="block">Select</a>
        <a href="<?php echo $myroot . "form/form_insert_room.php" ?> " class="block">Insert</a>
        <a href="<?php echo $myroot . "form/form_modify_room.php" ?>" class="block">Modify</a>
      </details>
      <details class="column hover:cursor-pointer">
        <summary>Customers</summary>
        <a href="<?php echo $myroot . "form/form_select_customer.php" ?>" class="block">Select</a>
        <a href="<?php echo $myroot . "form/form_insert_customer.php" ?> " class="block">Insert</a>
        <a href="<?php echo $myroot . "form/form_modify_customer.php" ?>" class="block">Modify</a>
      </details>
      <details class="column hover:cursor-pointer">
        <summary>Reservations</summary>
        <a href="<?php echo $myroot . "form/form_select_reservation.php" ?>" class="block">Select</a>
        <a href="<?php echo $myroot . "form/form_insert_reservation.php" ?> " class="block">Insert</a>
        <a href="<?php echo $myroot . "form/form_modify_reservation.php" ?>" class="block">Modify</a>
      </details>
    </nav>
  </header>
  <main class="grow">