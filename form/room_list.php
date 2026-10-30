<?php
require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/template/bo_header.php");
?>

<div class="grow p-5">
  <form id="filter-form" class="<?= $filter ?> !flex-row">
    <label class="flex">
      <p>Ciudad: </p>
      <select name="city">
        <option></option>
        <?php include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/func/php/get_hotel.php"); ?>
      </select>
    </label>
    <label class="flex">
      <p>Categoria: </p>
      <select name="code">
        <option></option>
        <?php include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/func/php/get_category.php");
        foreach ($category as $cat) { ?>
          <option <?= ((isset($_GET["code"]) && $cat["code"] == $_GET["code"]) ? "selected" : "") ?>><?= $cat["code"] ?></option>
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