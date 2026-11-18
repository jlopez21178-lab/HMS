<div class="<?= $form_container ?>">
  <form id="form" class=" <?= $form ?>" method="post">
    <h1 class="text-3xl">Customer file</h1>
    <article>
      <h1 class="<?= $title ?>">Personal info</h1>
      <section class="<?= $section ?>">
        <label>
          <p>Name & Surname:</p>
          <input type="text" name="full_name" value="<?= $full_name ?? "" ?>">
        </label>
        <label>
          <p>Phone:</p>
          <input type="text" name="phone">
        </label>
        <label>
          <p>Email:</p>
          <input type="text" name="email">
        </label>
      </section>
    </article>
    <article>
      <h1 class="<?= $title ?>">Identification</h1>
      <section class="<?= $section ?>">
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
      </section>
    </article>
    <article>
      <h1 class="<?= $title ?>">Addresses</h1>
      <section class="<?= $section ?>">
        <!-- <button>Add new address</button> -->
        <table>
          Work in progress...
        </table>
      </section>
    </article>
    <article>
      <h1 class="<?= $title ?>">History reservation</h1>
      <section class="<?= $section ?>">
        Work in progress...
      </section>
    </article>
    <div class="<?= $btn_container ?>">
      <button id="cancelBtn" class="<?= $btn_cancel ?>">Cancel</button>
      <button id="acceptBtn" class="<?= $btn_accept ?>"></button>
    </div>
  </form>
</div>