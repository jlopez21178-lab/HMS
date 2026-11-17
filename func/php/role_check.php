<?php

include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/func/php/move_to.php");

if ($_SESSION["user_role"] == "guest" || $_SESSION["user_role"] == "customer")
  move_to("/student004/hotel/template/error/403.php");
