<div class="p-5 grow flex  justify-center">
  <form id="form" class=" [&>div]:mt-5 max-w-[50vw] grow">
    <h1 class="text-3xl">Customer file</h1>
    <div>
      <h1 class="<?= $title ?>">Personal info</h1>
      <div class="<?= $section ?>">
        <label>
          <p>Name & Surname:</p>
          <input type="text"  name="full_name">
        </label>
        <label>
          <p>Phone:</p>
          <input type="text" name="phone">
        </label>
        <label>
          <p>Email:</p>
          <input type="text" name="email">
        </label>
      </div>
    </div>
    <div>
      <h1 class="<?= $title ?>">Identification</h1>
      <div class="<?= $section ?>">
        <label>
          <p>Nationality:</p>
          <select id="nationality" name="nationality"></select>
        </label>
        <label>
          <p>Identity number:</p>
          <input type="text" name="identity_number">
        </label>
        <label>
          <p>Birthdate:</p>
          <input type="date" name="birthdate">
        </label>
        <label>
          <p>Expiracy:</p>
          <input type="date" name="id_expire_date">
        </label>
      </div>
    </div>
    <div>
      <h1 class="<?= $title ?>">Addresses</h1>
      <div class="<?= $section ?>">
        <!-- <button>Add new address</button> -->
        <table>
          Work in progress...
        </table>
      </div>
    </div>
    <div>
      <h1 class="<?= $title ?>">History reservation</h1>
      <div class="<?= $section ?>">
        Work in progress...
      </div>
    </div>
    <div class="flex justify-between">
      <button class="p-2 rounded-lg bg-red-400/30">Cancel</button>
      <button id="acceptBtn" class="p-2 rounded-lg bg-blue-400/30"></button>
    </div>
  </form>
</div>

<!-- Funcion para mostrar la nacionalidad -->
<script>
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
        if (country.name == ('<?= $_GET["nationality"] ?>' ?? '')) option.selected = true;
        countriesSelect.append(option);
      }
    } catch (error) {
      console.error(error)
    }
  }
</script>