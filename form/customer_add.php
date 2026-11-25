<?php require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/template/header.php"); ?>

<div class="grow">
  <?php
  include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/customer_add.php");
  require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/template/customer_file.php");
  ?>
</div>


<script>
  const acceptBtn = document.getElementById("acceptBtn");
  acceptBtn.textContent = "Create customer"

  cancelBtn(document.getElementById("cancelBtn"));

  async function loadJson() {
    try {
      // obtener json
      const response = await fetch("/student004/hotel/asset/countries.json");
      if (!response.ok) throw new Error(response.status);
      const countriesJson = await response.json();

      const countriesSelect = document.getElementById("nationality");

      // placeholder / valor predeterminado

      let option = document.createElement("option");
      option.textContent = "Select nationality"
      option.value = -1;
      countriesSelect.append(option);

      // Add rest of countries to the selector
      for (country of countriesJson) {
        option = document.createElement("option");
        option.textContent = country.name;
        countriesSelect.append(option);
      }
    } catch (error) {
      console.error("Error al obtenir el json", error);
    }
  }

  loadJson();
</script>