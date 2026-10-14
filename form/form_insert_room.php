<?php require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/templates/header.php"); ?>

<form action="../db/db_insert_room.php" method="post" class="items-center  column  p-5">
  <label class="flex p-2">
    <p>Numero de habitacion:</p>
    <input type="text" name="room_number" placeholder="Numero de habitacion">
  </label>

  <label class="flex p-2">
    <!-- modificar para que sea una lista con los hoteles -->
    <p>Hotel id:</p>
    <input type="text" name="hotel_id" placeholder="Hotel">
  </label>

  <label class="flex p-2">
    <!-- modificar para que sea una lista con las categorias -->
    <p>Categoria id:</p>
    <input type="text" name="category_id" placeholder="Categoria">
  </label>

  <input type="submit">
</form>
<?php require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/templates/footer.php"); ?>
