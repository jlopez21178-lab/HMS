<?php require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/templates/header.php"); ?>


<form id="form-room-info" class="<?= $form ?> m-5 divide-purple-300 divide-dashed divide-y-3">
  <label class="<?= $form_label ?>">
    <p>Room number:</p>
    <input type="text" name="room_number" id="room-number" value="<?= $_GET["room_number"] ?>">
  </label>

  <label class="<?= $form_label ?>">
    <p>Hotel:</p>
    <p> <?= $_GET["city"] ?></p>
  </label>

  <label class="<?= $form_label ?>">
    <p>Category:</p>
    <select name="category">
      <?php include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/getters/get_category.php") ?>
    </select>
  </label>

  <div id="button-container" class="flex justify-around w-[100%] mt-[30%]">
    <button id="delete" class="rounded-lg bg-red-300 p-3 cursor-pointer hover:bg-red-200">Delete</button>
    <button id="update" class="rounded-lg bg-cyan-300 p-3 cursor-pointer hover:bg-cyan-200">Update</button>
</form>
</div>

<script>
  const deleteBtn = document.getElementById("delete");
  const updateBtn = document.getElementById("update");

  deleteBtn.addEventListener("click", (e) => {
    e.preventDefault();

    window.location.href = "/student004/hotel/db/db_delete_room.php?room_id=" + <?= $_GET["room_id"] ?>;
  })
</script>

<?php require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/templates/footer.php"); ?>