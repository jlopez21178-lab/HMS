<?php
require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/template/header.php");
require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/func/getter/get_hotel.php");
require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/func/getter/get_category.php");
?>

<div class="<?= $form_container ?>">
  <form action="/student004/hotel/db/room_add.php" method="POST" class="<?= $form ?>">

    <h1 class="text-3xl">Add room</h1>

    <section class="<?= $section ?>">
      <label>
        <p>Room number:</p>
        <input type="text" name="room_number" placeholder="Numero de habitacion" required>
      </label>
    </section>

    <section class="<?= $section ?>">
      <label>
        <p>Hotel:</p>
        <select name="hotel_id" id="city" class="grow" required>
          <option>Select a hotel</option>
          <?= displayHotelList($hotel); ?>
        </select>
      </label>
    </section>

    <section class="<?= $section ?>">
      <label>
        <p>Category:</p>
        <select name="category_id" id="category_id" class="grow" required>
          <option>Select a category</option>
          <?= displayCategoryList($category) ?>
        </select>
      </label>
    </section>
    <div class="<?= $btn_container ?>">
      <button id="cancelBtn" class="<?= $btn_cancel ?>">Cancel</button>
      <input type="submit" value="Add" class="<?= $btn_accept ?>">
    </div>
  </form>
</div>

<script>
  cancelBtn(document.getElementById("cancelBtn"));
</script>