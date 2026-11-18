<?php
require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/template/header.php");
include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/login.php")

?>

<div class="landscape grow flex justify-center items-center">
  <form action="" method="post" class="<?= $cus_form ?>">
    <h1 class="text-2xl text-purple-200">Log In</h1>

    <?php if ($not_found) { ?>
      <div>
        <p class="text-red-500 "><?= $not_found ?></p>
      </div>
    <?php } ?>

    <label>
      <p>Email:</p>
      <input type="text" name="email" id="email" value="<?= $email ?>" required>
      <p class="text-red-500"><?= $errors["email"] ?></p>
    </label>
    <label>
      <p>Password:</p>
      <input type="password" name="password" id="password" value="<?= $password ?>" required>
      <p><?= $errors["password"] ?></p>
    </label>
    <input id="submit" type="submit" class="<?= $cus_action_button ?> self-center">
  </form>
</div>