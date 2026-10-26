<?php require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/templates/header.php"); ?>


<div class="p-5 grow">
  <form class="flex justify-between items-center">
    <label class="flex gap-5 items-center">
      <p>Searcher:</p>
      <input type="text" name="client_info" placeholder="Name, email...">
    </label>

    <input type="submit" value="Search">

  </form>
  <table class="table-auto text-center mt-5 w-full">
    <thead>
      <tr class="divide-x-1 divide-purple-600/30 grow">
        <th>Customer id</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <?php include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/customer_list.php") ?>
    </tbody>
  </table>
</div>