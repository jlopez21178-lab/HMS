<?php require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/templates/header.php") ?>

<form id="filter-form" class="bg-pink-300 flex justify-between p-4 items-center">
  <label>
    <input type="checkbox" name="reserved" />
    Habitaciones reservadas
  </label>

  <input type="submit" id="filter" value="Filtrar" class="p-1 rounded-lg bg-zinc-400" />
</form>

<div id="rooms-list" class="grow"></div>

<script>
  const form = document.getElementById("filter-form");
  form.addEventListener("submit", async (e) => {
    e.preventDefault();

    const params = new URLSearchParams(new FormData(form));

    try {
      const res = await fetch("<?php echo $myroot ?>db/db_select_room.php?" + params.toString());
      if (!res.ok) throw new Error("Error", res.status);
      const rooms = await res.json();
      console.log(rooms);

    } catch (err) {
      console.error(err);
    }
  })
</script>


<?php require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/templates/footer.php"); ?>