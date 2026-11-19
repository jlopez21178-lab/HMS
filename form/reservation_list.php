<?php
require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/template/header.php");
require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/func/getter/get_category.php");

/** @var array $category */
?>


<div class="p-5 grow">
  <form method="post" class="<?= $filter ?> flex-col">
    <div>
      <div class="flex gap-5">
        <button name="quick_btn" value="checkin" class="<?= $btn ?> bg-fuchsia-500/30 hover:bg-fuchsia-500/40">Check In</button>
        <button name="quick_btn" value="ongoing" class="<?= $btn ?> bg-green-500/30 hover:bg-green-500/40">Ongoing</button>
        <button name="quick_btn" value="checkout" class="<?= $btn ?> bg-red-500/30 hover:bg-red-500/40">Check Out</button>
      </div>
      <button id="advanced-filters-btn" type="button">Show advanced filters</button>
    </div>

    <!-- TODO que los selectores se puedan mostrar o ocultar -->
    <div id="advanced-filters">
      <div class="flex justify-between">
        <div class="flex gap-5">
          <label>
            <p>Check in:</p>
            <input type="date" name="date_in" value="<?= $_POST["date_in"] ?? "" ?>">
          </label>

          <label>
            <p>Check out:</p>
            <input type="date" name="date_out" value="<?= $date_out ?? "" ?>">
          </label>
          <label>
            <p>Category given</p>
            <select name="category_given">
              <option></option>
              <?= displayCategoryList($category, $_POST["category_given"]) ?>
            </select>
          </label>
          <label>
            <p>Category charged</p>
            <select name="category_charged">
              <option></option>
              <?= displayCategoryList($category, $_POST["category_charged"]) ?>
            </select>
          </label>

          <section class="flex flex-col">
            <label>
              <input type="radio" name="status" value="pendent" <?= isset($_POST["status"]) && $_POST["status"] == "pendent" ? "checked" : "" ?>>
              Pendent
            </label>
            <label>
              <input type="radio" name="status" value="ongoing" <?= isset($_POST["status"]) && $_POST["status"] == "ongoing" ? "checked" : "" ?>>
              Ongoing
            </label>
            <label>
              <input type="radio" name="status" value="finished" <?= isset($_POST["status"]) && $_POST["status"] == "finished" ? "checked" : "" ?>>
              Finished
            </label>
            <label>
              <input type="radio" name="status" value="eliminated" <?= isset($_POST["status"]) && $_POST["status"] == "eliminated" ? "checked" : "" ?>>
              Eliminated
            </label>
          </section>
        </div>
        <input type="submit" value="Filtrar" class="<?= $btn ?>">
      </div>
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
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/reservation_list.php"); ?>
    </tbody>
  </table>
</div>

<script>
  const showFilters = document.getElementById("advanced-filters-btn");
  const filters = document.getElementById("advanced-filters");

  showFilters.addEventListener("click", filters.hidden = !filters.hidden);
</script>

<?php require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/template/footer.php"); ?>