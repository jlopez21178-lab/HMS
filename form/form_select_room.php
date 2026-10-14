<?php require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/templates/header.php") ?>

<form id="filter-form" class="bg-pink-300 flex justify-between p-4 items-center">
  <div id="date_container">

    <label class=> Fecha de entrada:
      <input type="date" id="date_in" name="date_in" default="today">
    </label>
    <label> Fecha de salida:
      <input type="date" id="date_out" name="date_out">
    </label>

  </div>

  <label>
    <input type="checkbox" name="reserved" />
    Habitaciones reservadas
  </label>

  <input type="submit" id="filter" value="Filtrar" class="p-1 rounded-lg bg-zinc-400" />
</form>

<div id="rooms-list"></div>

<script>
  const form = document.getElementById("filter-form");
  form.addEventListener("submit", async (e) => {
    e.preventDefault();

    const params = new URLSearchParams(new FormData(form));

    try {
      const res = await fetch("<?php echo $myroot ?>db/db_select_room.php" + params.toString());
      if (!res.ok) throw new Error("Error", res.status);
      const rooms = await res.json();
      console.log(rooms);

    } catch (err) {
      console.error(err);
    }
  })

  console.log(new Date());

  document.getElementById("date_in").value = new Date().toISOString().split("T")[0];
  document.getElementById("date_out").value = new Date().toISOString().split("T")[0];
</script>


<?php require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/templates/footer.php"); ?>