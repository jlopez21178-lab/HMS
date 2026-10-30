<?php
// $myroot = $_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/";
$form_label = "flex p-2 justify-between w-[100%] items-center rounded-lg";
$form = "flex items-center flex-col grow p-5";

session_start();
include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/styles.php");

// iniciar el rol del usuario a guest si no esta inciado
if (!isset($_SESSION["userRole"])) {
  $_SESSION["userRole"] = "guest";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aurelia Grand Hotel</title>
  <link rel="icon" href="/student004/hotel/img/aurelia-grand-hotel-logo.png" type="image/png" />
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4">
  </script>
</head>

<body class="bg-purple-100 flex flex-col min-h-screen">
  <header class="sticky top-0 z-30">
    <nav class="bg-black flex justify-between items-center p-5  shadow-lg shadow-purple-400 z-3">
      <img src="/student004/hotel/img/aurelia-grand-hotel-logo.svg" type="image/svg" alt="logo web" class="max-w-15 text-shadow-purple-300 text-shadow-lg" />
      <a href="<?= $homePath ?>" class="text-white">Aurelia Grand Hotel</a>
      <?php if ($_SESSION["userRole"] == "guest") { ?>
        <div class="text-white ">
          <a href="/student004/hotel/form/login.php" class="cursor-pointer rounded-lg ring-1 p-2 ring-purple-600 hover:ring-purple-500">Log In</a>
          <a href="/student004/hotel/form/signup.php" class="cursor-pointer bg-purple-600 p-2 rounded-lg hover:bg-purple-500">Sign up</a>
        </div>
      <?php } else { ?>
        <div class="flex gap-2">
          <a href="/student004/hotel/form/account.php" class="text-white flex items-center"><i class="ph-thin ph-user-circle text-white text-2xl"></i>Account - <?= $_SESSION["userRole"] ?></a>
          <a href="/student004/hotel/db/logout.php" class="text-white flex items-center"><i class="ph-thin ph-sign-out text-red-300 text-2xl"></i>Log Out</a>
        </div>
      <?php } ?>
    </nav>
  </header>
  <main class="grow flex">