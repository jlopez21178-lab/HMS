<?php

require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/func/php/move_to.php");

$role_file_path = $_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/page_permit.json";
$handler = fopen($role_file_path, "r");

$role_list = json_decode(fread($handler, filesize($role_file_path)), true);

fclose($handler);


$file_path = explode("/", $_SERVER["PHP_SELF"]);
$page_name = end($file_path);

$page_permit_level = $role_list[$page_name] ?? 10;

if ($_SESSION["user_role_level"] < $page_permit_level)
  move_to("/student004/hotel/asset/template/error/403.php");
