<?php
include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/styles.php");

function show_customer_list($cus)
{
  global $table_row_data;
  global $form_path; ?>
  <tr class="<?= $table_row_data ?>">
    <td><?= $cus["customer_id"] ?></td>
    <td><?= $cus["full_name"] ?></td>
    <td><?= $cus["phone"] ?></td>
    <td><?= $cus["email"] ?></td>
    <td><a href="<?= $form_path . "/customer_modify.php?customer_id=" . $cus["customer_id"] ?>">Modify</a></td>
  </tr>

<?php } ?>