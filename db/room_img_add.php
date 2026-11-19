<?php
$error = ["hotel_id" => "", "category_id" => ""];
$category_img = ($_FILES["category_img"]["name"]) ? $_FILES["category_img"] : "";
$hotel_id = $_POST["hotel_id"] ?? -1;
$category_id = $_POST["category_id"] ?? -1;
$can_be_uploaded = true;

if ($hotel_id < 0) {
  $errors["hotel_id"] = "You need to select a hotel";
  $can_be_uploaded = false;
}

if ($category_id < 0) {
  $errors["category_id"] = "You need to select a category";
  $can_be_uploaded = false;
}

if ($category_img && $can_be_uploaded) {
  $path_dir = $_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/img/room/";
  $img_name = "hotel-" . $hotel_id . "-category-" . $category_id . ".";
  $sufix = strtolower(pathinfo($category_img["name"], PATHINFO_EXTENSION));

  $img_dir =  $path_dir . $img_name . $sufix;
  move_uploaded_file($category_img["tmp_name"], $img_dir);
}
