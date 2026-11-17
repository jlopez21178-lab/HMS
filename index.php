<?php require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/template/header.php"); ?>


<section class="landscape grow flex justify-center p-20">
  <form action="/student004/hotel/db/room_availability.php" method="get" class="<?= $cus_form ?> ">
    <label class="flex justify-center ">
      <p class="pr-5">Entrada al hotel: </p>
      <input type="date" name="date_in" id="date_in" min="<?= date("Y-m-d") ?>" required />
    </label>

    <label class="flex justify-center">
      <p class="pr-5">Salida del hotel:</p>
      <input type="date" name="date_out" id="date_out" min="<?= date("Y-m-d") ?>" required />
    </label>

    <input type="submit" value="Reservar" class="<?= $cus_action_button ?>">
  </form>
</section>

<?php require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/template/footer.php") ?>