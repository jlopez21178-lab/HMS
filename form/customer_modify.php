<?php
require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/template/bo_header.php");
include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/template/customer_file.php");
?>

<script>
  //  Funcion para mostrar la nacionalidad 
  loadJson()

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
      countriesSelect.append(option);

      // Add rest of countries to the selector
      for (country of countriesJson) {
        option = document.createElement("option");
        option.textContent = country.name;
        if (country.name == '<?= $_GET["nationality"] ?>') option.selected = true;
        countriesSelect.append(option);
      }

    } catch (error) {
      console.error(error)
    }
  }

  // coger los datos y añadirlos a los campos
  const form = document.getElementById("form");

  // Coje la search bar, la separa en clave - valor, la transforma en un objeto estandar de js
  const values = Object.fromEntries(new URLSearchParams(window.location.search));

  for (let i = 0; i < form.length - 2; i++) {
    form[i].value = values[form[i].name];
  }

  // Boton para aceptar los canvios
  const acceptBtn = document.getElementById("acceptBtn");
  acceptBtn.textContent = "Save and update";
  acceptBtn.addEventListener("click", () => {
    window.location.href = "/student004/hotel/db/customer_update.php?" + (new URLSearchParams(new FormData(form))).toString();
  })
</script>