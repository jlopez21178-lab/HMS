<?php require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/templates/header.php"); ?>

<form id="filter-form" class="bg-pink-300 flex justify-between p-4 items-center">
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
<div class="m-3 grow">
  <?php include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/room_list.php"); ?>
</div>

<?php require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/templates/footer.php"); ?>