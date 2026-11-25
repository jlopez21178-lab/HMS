<?php
require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/template/header.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/func/getter/get_hotel.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/func/getter/get_category.php");
include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/room_img_add.php");
?>

<div class="<?= $form_container ?> grow">
  <form action="" method="post" class="<?= $form ?>" enctype="multipart/form-data">
    <h1 class="<?= $title ?>">Select or modify category image</h1>
    <article class="border-b-1 border-purple-500/40 pb-10">
      <section class="<?= $section ?>">
        <label>
          <p>Hotel:</p>
          <select name="hotel_id">
            <option value="-1">Select hotel</option>
            <?= displayHotelList($hotel) ?>
          </select>
        </label>
        <p class="<?= $error_text ?>"><?= $error["hotel_id"] ?></p>
      </section>

      <section class="<?= $section ?>">
        <label>
          <p>Category:</p>
          <select name="category_id">
            <option value="-1">Select category</option>
            <?= display_category_list() ?>
          </select>
        </label>
        <p class="<?= $error_text ?>"><?= $error["category_id"] ?></p>

      </section>
      <section class="<?= $section ?>">
        <label class="<?= $btn ?> bg-purple-400/20">
          <p>Select image to upload... <?= $category_img["name"] ?? "" ?></p>
          <!-- TODO que se puede ver el nombre del fichero, eliminarlo... -->
          <input type="file" style="display: none;" name="category_img" accept="image/*">
        </label>
      </section>
    </article>

    <input type="submit" value="Upload image" class="<?= $btn_accept ?> mt-10">
  </form>
</div>