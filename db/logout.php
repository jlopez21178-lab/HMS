<?php
include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/func/php/move_to.php");

session_start();
$_SESSION = [];
session_destroy();
move_to("/student004/hotel");
?>