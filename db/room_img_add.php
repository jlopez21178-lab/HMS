<?php
$error = ["hotel_id" => "", "category_id" => ""];
$category_img = $_FILES["category_img"];
$hotel_id = $_POST["hotel_id"];
$category_id = $_POST["category_id"];

if ($hotel_id < 0) {
  $errors["hotel_id"] = "You need to select a hotel";
}

if ($category_id < 0) {
  $errors["category_id"] = "You need to select a category";
}
