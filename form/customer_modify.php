<?php require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/templates/header.php");
?>

<div>
  <form>
    <div>
      <h3>Personal info</h3>
      <label>
        <p>Name & Surname:</p>
        <input type="text" name="full_name" value="<?= $_GET["full_name"] ?>">
      </label>
      <label>
        <p>Phone:</p>
        <input type="text" name="phone" value="<?= $_GET["phone"] ?>">
      </label>
      <label>
        <p>Email:</p>
        <input type="text" name="email" value="<?= $_GET["email"] ?>">
      </label>
    </div>
  </form>
</div>