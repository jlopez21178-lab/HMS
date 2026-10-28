<?php require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/templates/header.php"); ?>


<div class="p-5 grow">
  <form action="" class="<?= $filter ?>">
    <label class="flex gap-5 items-center">
      <p>Searcher:</p>
      <input type="text" name="customer_info" placeholder="Name, email...">
    </label>
    <input type="submit" value="Search">
  </form>
  <table class="<?= $table ?>">
    <thead>
      <tr class="<?= $table_row_head ?> ">
        <th>Customer id</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/customer_list.php") ?>
    </tbody>
  </table>
</div>