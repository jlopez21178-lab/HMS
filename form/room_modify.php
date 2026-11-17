<?php
require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/template/bo_header.php");
include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/func/getter/get_room.php");
?>

<div class="<?= $form_container ?>">
  <form action="/student004/hotel/db/room_update.php" method="post" id="form-room-info" class="<?= $form ?>">

    <h1 class="text-3xl">Modify room - <?= $_GET["room_id"] ?></h1>
    <input type="text" name="room_id" value="<?= $_GET["room_id"] ?>" hidden>
    <input type="text" name="hotel_id" value="<?= $room["hotel_id"] ?>" hidden>

    <section class="<?= $section ?>">
      <label>
        <p>Room number:</p>
        <input type="text" name="room_number" id="room-number" value="<?= $room["room_number"] ?>">
      </label>
    </section>

    <section class="<?= $section ?>">
      <label>
        <p>Hotel:</p>
        <input type="text" readonly value="<?= $room["city"] ?>">
      </label>
    </section>

    <section class="<?= $section ?>">
      <label>
        <p>Category:</p>
        <select name="category_id">
          <?php include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/func/getter/get_category.php");
          foreach ($category as $cat) { ?>
            <option value="<?= $cat["category_id"] ?>" <?= ($cat["category_code"] == $room["category_code"] ? "selected" : "") ?>><?= $cat["category_code"] ?></option>
          <?php } ?>
        </select>
      </label>
    </section>

    <div id="button-container" class="<?= $btn_container ?>">
      <button type="button" id="cancelBtn" class="<?= $btn_cancel ?>">Cancel</button>
      <button type="button" id="deleteBtn" class="<?= $btn_delete ?>">Delete</button>
      <button id="updateBtn" class="<?= $btn_accept ?>">Update</button>
  </form>
</div>
</div>

<script>
  const deleteBtn = document.getElementById("deleteBtn");
  const updateBtn = document.getElementById("updateBtn");

  cancelBtn(document.getElementById("cancelBtn"));

  deleteBtn.addEventListener("click", () => {
    window.location.href = "/student004/hotel/db/room_delete.php?room_id=" + <?= $_GET["room_id"] ?>;
  })
</script>

<?php require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/template/footer.php"); ?>