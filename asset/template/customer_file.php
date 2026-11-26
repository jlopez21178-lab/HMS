<?php include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/func/php/show_countries_list.php"); ?>
<div class="<?= $form_container ?>">
  <form id="form" class=" <?= $form ?>" method="post">
    <h1 class="text-3xl">Customer file</h1>
    <article>
      <h1 class="<?= $title ?>">Personal info</h1>
      <section class="<?= $section ?>">
        <label>
          <p>Name & Surname:</p>
          <input type="text" name="full_name" value="<?= $full_name ?>">

        </label>
        <?php if (isset($error["fullname"])) { ?> <div class="<?= $error_text ?>"><?= $error["full_name"]  ?></div> <?php } ?>
        <label>
          <p>Phone:</p>
          <input type="text" name="phone" value="<?= $phone ?>">
        </label>
        <?php if (isset($error["phone"])) { ?> <div class="<?= $error_text ?>"><?= $error["phone"]  ?></div> <?php } ?>
        <label>
          <p>Email:</p>
          <input type="text" name="email" value="<?= $email ?>">
        </label>
        <?php if (isset($error["email"])) { ?> <div class="<?= $error_text ?>"><?= $error["email"]  ?></div> <?php } ?>
      </section>
    </article>
    <article>
      <h1 class="<?= $title ?>">Identification</h1>
      <section class="<?= $section ?>">
        <label>
          <p>Nationality:</p>
          <select id="nationality" name="nationality">
            <?= display_countries_list($nationality) ?>
          </select>
        </label>
        <?php if (isset($error["nationality"])) { ?> <div class="<?= $error_text ?>"><?= $error["nationality"]  ?></div> <?php } ?>
        <label>
          <p>Document:</p>
          <select name=" document">
            <option value="-1">Select document type</option>
            <option value="identity_card" <?= ($document == "identity_card") ? "checked" : "" ?>>Identity card</option>
            <option value="passport" <?= ($document == "passport") ? "checked" : "" ?>>Passport</option>
            <option value="driving_license" <?= $document == "driving_license" ? "checked" : "" ?>>Driving licence</option>
          </select>
        </label>
        <?php if (isset($error["document"])) { ?> <div class="<?= $error_text ?>"><?= $error["document"]  ?></div> <?php } ?>
        <label>
          <p>Identity number:</p>
          <input type="text" name="identity_number" value="<?= $identity_number ?>">
        </label>
        <?php if (isset($error["identity_number"])) { ?> <div class="<?= $error_text ?>"><?= $error["identity_number"]  ?></div> <?php } ?>
        <label>
          <p>Birthdate:</p>
          <input type="date" name="birthdate" value="<?= $birthdate ?>">
        </label>
        <?php if (isset($error["birthdate"])) { ?> <div class="<?= $error_text ?>"><?= $error["birthdate"]  ?></div> <?php } ?>
        <label>
          <p>Expiracy:</p>
          <input type="date" name="expire_date" value="<?= $expire_date ?>">
        </label>
        <?php if (isset($error["expire_date"])) { ?> <div class="<?= $error_text ?>"><?= $error["expire_date"]  ?></div> <?php } ?>
      </section>
    </article>
    <article>
      <h1 class=" <?= $title ?>">Addresses</h1>
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