<?php
require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/template/bo_header.php");
include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/func/getter/get_room.php");
?>

<div class="<?= $form_container ?>">
  <form id="form-room-info" class="<?= $form ?>">

    <h1 class="text-3xl">Modify room - <?= $_GET["room_id"] ?></h1>

    <section class="<?= $section ?>">
      <label>
        <p>Room number:</p>
        <input type="text" name="room_number" id="room-number" value="<?= $room["room_number"] ?>">
      </label>
    </section>

    <section class="<?= $section ?>">
      <label>
        <p>Hotel:</p>
        <p> <?= $room["city"] ?></p>
      </label>
    </section>

    <section class="<?= $section ?>">
      <label>
        <p>Category:</p>
        <select name="code">
          <?php include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/func/getter/get_category.php");
          foreach ($category as $cat) { ?>
            <option <?= ($cat["code"] == $room["code"] ? "selected" : "") ?>><?= $cat["code"] ?></option>
          <?php } ?>
        </select>
      </label>
    </section>

    <div id="button-container" class="<?= $btn_container ?>">
      <button id="cancelBtn" class="<?= $btn_cancel ?>">Cancel</button>
      <button id="deleteBtn" class="<?= $btn_delete ?>">Delete</button>
      <button id="updateBtn" class="<?= $btn_accept ?>">Update</button>
  </form>
</div>
</div>

<script>
  const deleteBtn = document.getElementById("deleteBtn");
  const updateBtn = document.getElementById("updateBtn");

  cancelBtn(document.getElementById("cancelBtn"));

  deleteBtn.addEventListener("click", (e) => {
    e.preventDefault();
    window.location.href = "/student004/hotel/db/room_delete.php?room_id=" + <?= $_GET["room_id"] ?>;
  })

  updateBtn.addEventListener("click", (e) => {
    e.preventDefault();
    window.location.href = "/student004/hotel/db/room_update.php?room_id=" + <?= $_GET["room_id"] ?>;

  })
</script>

<?php require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/template/footer.php"); ?>