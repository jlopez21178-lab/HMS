<?php
// $myroot = $_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/";
$myroot = "/student004/hotel/";
$form_label = "flex p-2 justify-between w-[100%] items-center rounded-lg";
$form = "flex items-center flex-col grow p-5";

include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/styles.php");
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

</style>

<body class="bg-purple-100 flex flex-col min-h-screen">
  <header class="sticky top-0 z-30">
    <nav class="bg-black flex justify-between items-center p-5  shadow-lg shadow-purple-400 z-3">
      <img src="<?php echo $myroot; ?>img/aurelia-grand-hotel-logo.svg" type="image/svg" alt="logo web" class="max-w-15 text-shadow-purple-300 text-shadow-lg" />
      <a href="<?php echo $myroot ?>" class="text-white">Aurelia Grand Hotel</a>
      <div class="text-white ">
        <a href="/student004/hotel/form/login.php" class="cursor-pointer rounded-lg ring-1 p-2 ring-purple-600 hover:ring-purple-500">Log In</a>
        <a href="/student004/hotel/form/signup.php" class="cursor-pointer bg-purple-600 p-2 rounded-lg hover:bg-purple-500">Sign up</a>
      </div>
    </nav>
  </header>
  <main class="grow flex">