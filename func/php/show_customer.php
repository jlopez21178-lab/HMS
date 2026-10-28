<?php
include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/styles.php");

function show_customer($cus)
{
  global $table_row_data;
  global $table_button; ?>
  <tr class="<?= $table_row_data ?>">
    <td><?= $cus["customer_id"] ?></td>
    <td><?= $cus["full_name"] ?></td>
    <td><?= $cus["phone"] ?></td>
    <td><?= $cus["email"] ?></td>
    <td><button class="<?= $table_button ?>" onclick='openModifyCustomer(<?= json_encode($cus) ?>)'>Modify</button></td>
  </tr>

<?php } ?>

<script>
  function openModifyCustomer(customer) {
    const data = new URLSearchParams(customer);
    window.location.href = "/student004/hotel/form/customer_modify.php?" + data.toString();
  }
</script>