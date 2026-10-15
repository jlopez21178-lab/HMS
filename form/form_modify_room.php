<?php require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/templates/header.php"); ?>

<form id="form-search-id" class="p-5 grow">
  <label class="<?php echo $form_label; ?> bg-fuchsia-300 rounded-lg">
    <p>Room id:</p>
    <input type="text" name="room_id" placeholder="Room id" class="rounded-lg">
    <input type="submit" id="buscar" value="Buscar" class="bg-purple-600 rounded-lg p-2 cursor-pointer hover:bg-purple-500 text-white">
  </label>
</form>

<form id="form-room-info" class="<?php echo $form ?> m-5 hidden divide-purple-300 divide-dashed divide-y-3">
  <label class="<?php echo $form_label; ?>">
    <p>Room number:</p>
    <input type="text" name="room_number" id="room-number">
  </label>

  <label class="<?php echo $form_label; ?>">
    <p>Hotel id:</p>
    <input type="text" name="hotel_id" id="hotel-id">
  </label>

  <label class="<?php echo $form_label; ?>">
    <p>Category:</p>
    <input type="text" name="category_id" id="category-id">
  </label>

  <div id="button-container" class="flex justify-around w-[100%] mt-[30%]">
    <button id="delete" class="rounded-lg bg-red-300 p-3 cursor-pointer hover:bg-red-200">Delete</button>
    <button id="update" class="rounded-lg bg-cyan-300 p-3 cursor-pointer hover:bg-cyan-200">Update</button>
</form>
</div>

<script>
  const formSearchId = document.getElementById("form-search-id");
  const formRoomInfo = document.getElementById("form-room-info");
  const roomNum = document.getElementById("room-number");
  const hotelId = document.getElementById("hotel-id");
  const categoryId = document.getElementById("category-id")

  formSearchId.addEventListener("submit", async (e) => {
    e.preventDefault();

    searchId.classList.toggle("grow");
    formRoomInfo.classList.toggle("hidden");

    const param = new URLSearchParams(new FormData(searchId));

    try {
      const res = await fetch("<?php echo $myroot; ?>db/db_select_room.php?" + param.toString());

      if (!res.ok) throw new Error("Error:", res.status());

      let room = await res.json();

      // php me devuelve un array en el que dentro esta el json
      room = room[0];

      roomNum.value = room.room_number;
      hotelId.value = room.hotel_id;
      categoryId.value = room.category_id;

    } catch (err) {
      console.error(err);
    }
  })


  const deleteBtn = document.getElementById("delete");
  const updateBtn = document.getElementById("update");

  deleteBtn.addEventListener("click", (e) => {
    e.preventDefault();

    const roomId = new URLSearchParams(new FormData(formSearchId));
    window.location.href = "<?php echo $myroot; ?>db/db_delete_room.php?" + roomId.toString();
  })
</script>

<?php require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/templates/footer.php"); ?>