  <form class="[&>div]:mt-5 max-w-[50vw] grow">
    <h1 class="text-3xl">Customer record - <?= $_GET["customer_id"] ?></h1>
    <div>
      <h1 class="<?= $title ?>">Personal info</h1>
      <div class="<?= $section ?>">
        <label>
          <p>Name & Surname:</p>
          <input type="text" name="full_name">
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
  </form>