<?php
include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/templates/header.php");

$buttonStyle = "p-2 rounded-lg hover:cursor-pointer ";
?>


<div class="p-5 grow">
  <form class="<?= $filter ?>">
    <div class="flex gap-5">
      <button class="<?= $buttonStyle ?> bg-fuchsia-900/50 hover:bg-fuchsia-900/60">Entradas de hoy</button>
      <button class="<?= $buttonStyle ?> bg-mauve-800/30 hover:bg-mauve-800/40">Salidas de hoy</button>
    </div>
    <div class="flex justify-between">
      <div class="flex gap-5">
        <label>
          <p>Fecha de entrada:</p>
          <input type="date" name="date_in">
        </label>

        <label>
          <p>Fecha de salida:</p>
          <input type="date" name="date_out">
        </label>
        <label>
          <p>Categoria dada</p>
          <select name="category_given">
            <option></option>
            <?php include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/getters/get_category.php") ?>
          </select>
        </label>
        <label>
          <p>Categoria cobrada</p>
          <select name="category_charged">
            <option></option>
            <?php include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/getters/get_category.php") ?>
          </select>
        </label>
      </div>
      <input type="submit" value="Filtrar" class="<?= $buttonStyle ?> right relative">
    </div>
  </form>
  <table class="<?= $table ?>">
    <thead>
      <tr class="<?= $table_row_head ?>">
        <th>Reservation</th>
        <th>Customer</th>
        <th>Room id</th>
        <th>Room number</th>
        <th>Date in</th>
        <th>Date out</th>
        <th>Days</th>
        <th>Category</th>
        <th>Cost</th>
      </tr>
    </thead>
    <tbody>
      <?php include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/reservation_list.php"); ?>
    </tbody>
  </table>
</div>

<?php include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/templates/footer.php"); ?>