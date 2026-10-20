<?php require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/templates/header.php") ?>

<form id="filter-form" class="bg-pink-300 flex justify-between p-4 items-center">
  <label class="flex">
    <p>Ciudad: </p>
    <select name="city">
      <?php include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/db_get_hotel.php"); ?>
    </select>
  </label>
  <label class="flex">
    <p>Categoria: </p>
    <select name="category">
      <?php include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/db_get_category.php"); ?>
    </select>
  </label>

  <input type="submit" id="filter" value="Filtrar" class="p-1 rounded-lg bg-zinc-400" />
</form>
<div class="m-3 grow">
  <?php include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/db_select_room_list.php"); ?>
</div>

<?php require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/templates/footer.php"); ?>