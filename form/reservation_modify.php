<?php
require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/template/header.php");
include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/func/getter/get_reservation.php");
include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/func/getter/get_category.php");
include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/func/getter/get_available_room.php");
?>
<div class="grow">

  <?php include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/reservation_update.php");

  /** @var array $category */
  /** @var array $reservation */
  /** @var array $error */
  /** @var array $room_id */


  ?>
  <div class="<?= $form_container ?>">
    <form id="form" class="<?= $form ?>" method="post" action="">
      <input type="text" name="reservation_id" value="<?= $reservation_id ?>" hidden>

      <h1 class="text-3xl">Modify reservation - <?= $reservation["reservation_number"] ?></h1>

      <section id="date-section" class="<?= $section ?>">
        <h1 class="<?= $title ?>">Room information</h1>
        <div class="flex justify-between">
          <div class="flex gap-5">
            <label>
              <p>Date in:</p>
              <input type="date" name="date_in" value="<?= $reservation["date_in"] ?>" disabled>
            </label>
            <label>
              <p>Date out:</p>
              <input type="date" name="date_out" value="<?= $reservation["date_out"] ?>" disabled>
            </label>
          </div>
          <div>
            <label>
              <p>Location:</p>
              <p name="hotel_id"><?= $_SESSION["user_workplace"] ?></p>
            </label>
            <p>Work in progress...</p>
            <!-- TODO reservation info, like ubication, type of creation (in reception, phone call...) -->
          </div>
        </div>
      </section>


      <section id="category-section" class="<?= $section ?>">
        <label>
          <p>Category given:</p>
          <select name="category_given" id="category-given" disabled>
            <?= display_category_list($reservation["category_given"], true) ?>
          </select>
        </label>
        <label>
          <p>Category charged:</p>
          <select name="category_charged" id="category-charged" disabled>
            <option>Select category</option>
            <?php display_category_list($reservation["category_charged"], true) ?>
          </select>
        </label>

        <label>
          <p>Room number:</p>
          <select id="roomSelector" name="room_id" required>
            <option value="-1"></option>
            <?php
            $room = get_available_room($reservation["category_given"], $reservation["date_in"], $reservation["date_out"], $room_id);
            foreach ($room as $rm) { ?>
              <option value="<?= $rm["room_id"] ?>" <?= ($rm["room_id"] == ($room_id)) ? "selected" : "" ?>><?= $rm["room_number"] ?></option>
            <?php } ?>

          </select>
          <button type="button" class="" id="confirmRoomBtn">Confirm room</button>
        </label>
        <?php if (isset($error["room_number"])) { ?> <p class="<?= $error_text ?>"><?= $error["room_number"] ?></p> <?php } ?>
      </section>

      <section id="customer-information" class="<?= $section ?>">
        <h1 class="<?= $title ?>">Customer information</h1>
        <!-- TODO que no muestre el id  del usuario -->
        <label>
          <p>Customer:</p>
          <input list="customer-list" id="customer-searcher" name="customer_id" value="<?= $customer_id ?>" placeholder="Search customer" class="rounded-lg bg-olive-500/30" disabled>
          <button type="button" id="changeCustomerBtn" class="p1 rounded-lg border-1 border-purple-500/40 bg-red-500/50">Change customer</button>
        </label>
        <?php if (isset($error["customer_id"])) { ?> <p class="<?= $error_text ?>"><?= $error["customer_id"] ?></p> <?php } ?>
        <div>

          <a href="<?= $form_path . "/customer_modify.php?customer_id=" . $reservation["customer_id"] ?>" id="modifyCustomerFile" class="<?= $btn ?> bg-purple-300/30">Modify customer</a>
          <a href="/student004/hotel/form/customer_add.php" class="<?= $btn_accept ?>">New customer</a>
        </div>
      </section>



      <div class="<?= $btn_container ?>">
        <button id="cancel-btn" type="button" class="<?= $btn_cancel ?>">Cancel</button>
        <button id="save" class="<?= $btn_accept ?>">Save</button>
        <button id="saveExit" type="submit" name="save_exit" class="<?= $btn_accept ?>">Save and exit</button>
      </div>
    </form>
  </div>
</div>

<datalist id="customer-list"></datalist>
<script>
  cancelBtn(document.getElementById("cancel-btn"));

  const customerList = document.getElementById("customer-list");
  const customerSearcher = document.getElementById("customer-searcher");

  customerSearcher.addEventListener("input", (e) => {
    if (customerSearcher.value.length <= 3) {
      customerList.innerHTML = ""; // borrar el datalist
      return;
    }


    loadCustomerList(customerSearcher.value);
  })

  async function loadCustomerList(searchInfo) {
    const url = "/student004/hotel/func/getter/search_customer.php";

    const info = {
      customer_info: searchInfo
    };

    try {
      // acceder a serch_customer por post
      const res = await fetch(url, {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify(info)
      });

      if (!res.ok) throw new Error(res.status);
      // obtener el json con el listado de customers
      const customers = await res.json();

      // reiniciar el datalist
      customerList.innerHTML = "";

      // TODO que no se vea el customer_id, solo el nombre
      customers.forEach(customer => {
        const option = document.createElement("option");
        option.value = customer.customer_id;
        option.label = `${customer.full_name} - (${customer.email})`
        customerList.append(option);
      });


    } catch (error) {
      console.error(error);
    }
  }

  const changeCustomerBtn = document.getElementById("changeCustomerBtn");
  changeCustomerBtn.addEventListener("click", () => {
    customerSearcher.disabled = !customerSearcher.disabled;
    customerSearcher.classList.toggle("bg-olive-500/30");
    customerSearcher.classList.toggle("bg-purple-500/40");
    changeCustomerBtn.textContent = customerSearcher.disabled ? "Change customer" : "Accept customer";
    changeCustomerBtn.classList.toggle("border-purple-500/50");
    changeCustomerBtn.classList.toggle("bg-red-500/50");
  });


  const roomBtn = document.getElementById("confirmRoomBtn");
  const roomSelector = document.getElementById("roomSelector");

  const roomSelected = "bg-red-500/50";
  const roomNotSelected = "border-purple-500/50";

  roomSelector.disabled = roomSelector.value != -1;
  roomSelector.className = `grow rounded-lg ${roomSelector.disabled ? "bg-olive-500/30" : "bg-purple-500/40"}`
  roomBtn.textContent = roomSelector.disabled ? "Change room" : "Confirm room";
  roomBtn.className = `p-1 rounded-lg border-1 ${ roomSelector.disabled? roomSelected: roomNotSelected} `;

  roomBtn.addEventListener("click", () => {
    if (roomSelector.value == -1) return;

    roomSelector.disabled = !roomSelector.disabled;
    roomSelector.className = `grow rounded-lg ${roomSelector.disabled ? "bg-olive-500/30" : "bg-purple-500/40"}`
    roomBtn.textContent = roomSelector.disabled ? "Change room" : "Confirm room";
    roomBtn.classList.toggle(roomSelected);
    roomBtn.classList.toggle(roomNotSelected);
  })

  function sentForm() {
    roomSelector.disabled = false;
    document.getElementById("form").submit();
  }

  document.getElementById("save").addEventListener("click", sentForm);
  document.getElementById("saveExit").addEventListener("click", sentForm);
</script>
</div>