<?php
require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/template/header.php");

if ($_SESSION["user_role"] == "guest" || $_SESSION["user_role"] == "customer") {
  require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/form/room_availability.php");
} else { ?>
  <div class="grow flex justify-center items-center">
    <div>
      <h1 class="text-3xl">Home Page</h1>
    </div>
  </div>

<?php }
