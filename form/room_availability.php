<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/template/header.php");
require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/func/getter/get_hotel.php");


$initial_date = new DateTime();
$initial_date->modify("+4 days");
?>
<section class="landscape grow flex justify-center p-20">
  <form action="/student004/hotel/db/room_availability.php" method="get" class="<?= $cus_form ?> ">
    <label class="flex justify-center ">
      <p class="pr-5">Entrada al hotel: </p>
      <input type="date" name="date_in" id="date_in" min="<?= date("Y-m-d") ?>" value="<?= $_COOKIE["date_in"] ?? $initial_date->format("Y-m-d")  ?>" required />
    </label>

    <label class="flex justify-center">
      <p class="pr-5">Salida del hotel:</p>
      <input type="date" name="date_out" id="date_out" min="<?= date("Y-m-d") ?>" value="<?= $_COOKIE["date_out"] ?? $initial_date->modify("+4 days")->format("Y-m-d") ?>" required />
    </label>

    <label>
      <p>Hotel:</p>
      <select name="hotel_id" class="[&>option]:bg-black">
        <option value="-1">Select hotel or view all hotels</option>
        <?= displayHotelList($hotel) ?>
      </select>
    </label>
    <input type="submit" value="Reservar" class="<?= $cus_action_button ?>">
  </form>
</section>

<?php
require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/template/footer.php");
