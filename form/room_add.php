<?php require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/template/header.php"); ?>



<form action="<?php echo $myroot; ?>db/room_add.php" method="get" class="<?php echo $form ?>">
  <label class="<?php echo $form_label ?>">
    <p>Numero de habitacion:</p>
    <input type="text" name="room_number" placeholder="Numero de habitacion">
  </label>

  <label class="<?php echo $form_label ?>">
    <!-- modificar para que sea una lista con los hoteles -->
    <p>Hotel id:</p>
    <input type="text" name="hotel_id" placeholder="Hotel">
  </label>

  <label class="<?php echo $form_label ?>">
    <!-- modificar para que sea una lista con las categorias -->
    <p>Categoria id:</p>
    <input type="text" name="category_id" placeholder="Categoria">
  </label>

  <input type="submit" value="Añadir" class="bg-green-200 rounded-lg p-3 cursor-pointer hover:bg-green-300">
</form>
<?php require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/template/footer.php"); ?>