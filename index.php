<?php require(__DIR__ . "/templates/header.php"); ?>

<form action="<?php echo $myroot . "db/db_room_availability.php " ?> " method="post" class="flex flex-col grow items-center">

  <label class="flex justify-center p-5">
    <p class="pr-5">Entrada al hotel: </p>
    <input type="date" name="date_in" id="date_in" />
  </label>

  <label class="flex justify-center p-5">
    <p class="pr-5">Salida del hotel:</p>
    <input type="date" name="date_out" id="date_out" />
  </label>

  <input type="submit" value="Reservar" class="p-3 ring-lg ring-purple-600 bg-purple-600 cursor-pointer w-fit rounded-lg">

  <div class="grow p-6"></div>
</form>

<?php require_once(__DIR__ . "/templates/footer.php") ?>