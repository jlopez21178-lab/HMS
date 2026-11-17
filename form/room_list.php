<?php
require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/template/bo_header.php");
include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/func/getter/get_hotel.php");
include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/func/getter/get_category.php");

?>

<div class="grow p-5">
  <form method="post" id="filter-form" class="<?= $filter ?> !flex-row">
    <label class="<?= $filter_input ?>">
      <p>City: </p>
      <select name="hotel_id">
        <option></option>
        <?php foreach ($hotel as $hot) { ?>
          <option value="<?= $hot["hotel_id"] ?>" <?= ((isset($_POST["hotel_id"]) && $hot["hotel_id"] == $_POST["hotel_id"]) ? "selected" : "") ?>><?= $hot["city"] ?></option>
        <?php } ?>
      </select>
    </label>
    <label class="<?= $filter_input ?>">
      <p>Category: </p>
      <!-- TODO poder seleccionar mas de una categoria -->
      <select name="category_id">
        <option></option>
        <?php foreach ($category as $cat) { ?>
          <option value="<?= $cat["category_id"] ?>" <?= ((isset($_POST["category_id"]) && $cat["category_id"] == $_POST["category_id"]) ? "selected" : "") ?>> <?= $cat["category_code"] ?> </option>
        <?php } ?>
      </select>
    </label>
    <input type="submit" id="filter" value="Filtrar" class="p-1 rounded-lg bg-zinc-400" />
  </form>
  <table class='<?= $table ?>'>
    <thead>
      <tr class='<?= $table_row_head ?>'>
        <th>Room ID</th>
        <th>Hotel city</th>
        <th>Room number</th>
        <th>Category</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/room_list.php"); ?>
    </tbody>
  </table>
</div>