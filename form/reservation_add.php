<?php
require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/template/bo_header.php");
include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/func/getter/get_category.php");
?>

<div class="<?= $form_container ?>">
  <form id="form-create-reservation" class="<?= $form ?>" method="post">
    <h1 class="text-3xl">Create new reservation</h1>
    <section id="date-section" class="<?= $section ?>">
      <h1 class="<?= $title ?>">Room information</h1>
      <div class="flex justify-between">
        <div class="flex gap-5">
          <label>
            <p>Date in:</p>
            <input type="date" name="date_in">
          </label>
          <label>
            <p>Date out:</p>
            <input type="date" name="date_out">
          </label>
        </div>
        <div>
          <label>
            <p>Location:</p>
            <p name="hotel_id"><?= $_SESSION["worker_workplace"] ?></p>
          </label>
          <p>Work in progress...</p>
          <!-- TODO reservation info, like ubication, type of creation (in reception, phone call...) -->
        </div>
      </div>
    </section>

    <section id="category-section" class="<?= $section ?>">
      <label>
        <p>Category given:</p>
        <select name="category_given" id="category-given">
        </select>
      </label>
      <label>
        <p>Category charged:</p>
        <select name="category_charged" id="category-charged">
          <option>Select category</option>
          <?php foreach ($category as $cat) { ?>
            <option <?= ($cat["category_id"] == ($_POST["category_id"] ?? 0)) ? "selected" : "" ?> value="<?= $cat["category_id"] ?>"> <?= ($cat["category_code"] . " - " . $cat["price_night"] . "€ / night") ?></option>
          <?php }; ?>
        </select>
      </label>
    </section>

    <section id="customer-information" class="<?= $section ?>">
      <h1 class="<?= $title ?>">Customer information</h1>
      <label>
        <p>Customer:</p>
        <input list="customer-list" id="customer-searcher" name="customer_id" placeholder="Search customer">
      </label>
      <div>
        <a href="/student004/hotel/form/customer_add.php" class="<?= $btn_accept ?>">New customer</a>
      </div>
    </section>



    <div class="<?= $btn_container ?>">
      <button id="cancel-btn" type="button" class="<?= $btn_cancel ?>">Cancel</button>
      <button type="submit" id="create-btn" class="<?= $btn_accept ?>">Create</button>
    </div>
  </form>
</div>

<datalist id="customer-list">
</datalist>
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


  // metodo para ir mostrando el formulario gradualmente
  // fechas -> categoria -> customer
  const form = document.getElementById("form-create-reservation")
  const dateSection = document.getElementById("date-section");
  const categorySection = document.getElementById("category-section");
  const customerSection = document.getElementById("customer-information")
  const createBtn = document.getElementById("create-btn");

  categorySection.style.display = "none";
  customerSection.style.display = "none";
  createBtn.style.display = "none";

  form.addEventListener("change", () => {

    if (form.elements.date_in.value && form.elements.date_out.value) {
      setCategoryGiven();
      categorySection.style.display = "flex";
    }
    if (form.elements.category_given.value != "Select category" && form.elements.category_charged.value != "Select category") customerSection.style.display = "flex";

    if (form.elements.customer_id.value) createBtn.style.display = "flex";
  })

  async function setCategoryGiven() {

    const params = new URLSearchParams(new FormData(form));
    try {
      const res = await fetch("/student004/hotel/func/getter/get_category.php?" + params.toString());

      if (!res.ok) throw new Error(res.status);
      const data = await res.json();

      const categoryGiven = document.getElementById("category-given");
      // resetear las opciones del category_given para que no se solapen si cambian las fechas
      categoryGiven.innerHTML = "<option>Select category</option>";
      data.map((cat) => {
        const option = document.createElement("option")
        option.value = cat.category_id;
        option.label = `${cat.category_code} - ${cat.price_night}€ / night`;
        categoryGiven.append(option);
      });

    } catch (error) {
      console.log(error)
    }
  }


  // categorias y customer estan ocultas de forma predeterminada y el boton de create
</script>