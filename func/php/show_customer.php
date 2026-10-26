<?php function show_customer($cus)
{ ?>
  <tr>
    <td class="p-2"><?= $cus["customer_id"] ?></td>
    <td><?= $cus["full_name"] ?></td>
    <td><?= $cus["phone"] ?></td>
    <td><?= $cus["email"] ?></td>
  </tr>

<?php } ?>