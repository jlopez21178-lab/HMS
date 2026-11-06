<?php
include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/template/bo_header.php");
?>


<div class="p-5 grow">
  <form class="<?= $filter ?> flex-col">
    <div class="flex gap-5">
      <button class="<?= $btn ?> bg-fuchsia-500/30 hover:bg-fuchsia-500/40">Check In</button>
      <button class="<?= $btn ?> bg-green-500/30 hover:bg-green-500/40">Ongoing</button>
      <button class="<?= $btn ?> bg-red-500/30 hover:bg-red-500/40">Check Out</button>
    </div>
    <div class="flex justify-between">
      <div class="flex gap-5">
        <label>
          <p>Check in:</p>
          <input type="date" name="date_in">
        </label>

        <label>
          <p>Check out:</p>
          <input type="date" name="date_out">
        </label>
        <label>
          <p>Categoria dada</p>
          <select name="category_given">
            <option></option>
            <?php include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/func/getter/get_category.php");
            foreach ($category as $cat) { ?>
              <option <?= ((isset($_GET["category_given"]) && $cat["category_code"] == $_GET["category_given"]) ? "selected" : "") ?>><?= $cat["category_code"] ?></option>
            <?php } ?>
          </select>
        </label>
        <label>
          <p>Categoria cobrada</p>
          <select name="category_charged">
            <option></option>
            <?php foreach ($category as $cat) { ?>
              <option <?= ((isset($_GET["category_charged"]) && $cat["category_code"] == $_GET["category_given"]) ? "selected" : "") ?>><?= $cat["category_code"] ?></option>
            <?php } ?>
          </select>
        </label>
      </div>
      <input type="submit" value="Filtrar" class="<?= $btn ?> right relative">
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

<?php include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/template/footer.php"); ?>