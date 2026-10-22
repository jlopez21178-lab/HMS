<?php require(__DIR__ . "/templates/header.php"); ?>
<style>
  .landscape {
    background: url("<?php echo $myroot ?>img/hotel-landscape.jpg");
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
  }
</style>

<section class="landscape grow flex justify-center  p-20">
  <form action="<?php echo $myroot . "db/db_room_availability.php " ?> " method="get" class="flex flex-col  items-center backdrop-blur-sm rounded-xl h-fit w-fit border-1 border-purple-200 bg-purple-500/20 gap-10 p-10">
    <label class="flex justify-center text-white">
      <p class="pr-5">Entrada al hotel: </p>
      <input type="date" name="date_in" id="date_in" />
    </label>

    <label class="flex justify-center text-white ">
      <p class="pr-5">Salida del hotel:</p>
      <input type="date" name="date_out" id="date_out" />
    </label>

    <input type="submit" value="Reservar" class="p-3 ring-1 ring-purple-600 cursor-pointer w-fit rounded-lg text-purple-50 hover:bg-purple-600 transition hover:-translate-y-1 hover:scale-110 hover:shadow-lg hover:shadow-purple-400">
  </form>
</section>
<?php require(__DIR__ . "/templates/footer.php") ?>