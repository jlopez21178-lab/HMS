<?php
require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/template/bo_header.php");
include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/func/getter/get_hotel.php");
include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/func/getter/get_category.php");
?>

<div class="<?= $form_container ?>">

  <form action="/student004/hotel/db/room_add.php" method="get" class="<?= $form ?>">

    <h1 class="text-3xl">Add room</h1>

    <section class="<?= $section ?>">
      <label>
        <p>Room number:</p>
        <input type="text" name="room_number" placeholder="Numero de habitacion">
      </label>
    </section>

    <section class="<?= $section ?>">
      <label>
        <p>Hotel:</p>
        <select name="city" id="city" class="grow">
          <option>Select a hotel</option>
          <?php foreach ($hotel as $hot) { ?>
            <option><?= $hot["city"] ?></option>
          <?php } ?>
        </select>
      </label>
    </section>

    <section class="<?= $section ?>">
      <label>
        <p>Category:</p>
        <select name="code" id="code" class="grow">
          <option>Select a category</option>
          <?php foreach ($category as $cat) { ?>
            <option><?= $cat["code"] ?></option>
          <?php } ?>
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