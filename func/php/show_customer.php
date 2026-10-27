<?php function show_customer($cus)
{ ?>
  <tr>
    <td class="p-2"><?= $cus["customer_id"] ?></td>
    <td><?= $cus["full_name"] ?></td>
    <td><?= $cus["phone"] ?></td>
    <td><?= $cus["email"] ?></td>
    <td><button onclick='openModifyCustomer(<?= json_encode($cus) ?>)'>Modify</button></td>
  </tr>

<?php } ?>

<script>
  function openModifyCustomer(customer) {
    const data = new URLSearchParams(customer);
    window.location.href = "/student004/hotel/form/customer_modify.php?" + data.toString();
  }
</script>