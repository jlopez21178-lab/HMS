<?php function show_customer($cus)
{ ?>
  <tr class="border-t-1 border-purple-600/30 hover:bg-purple-600/10 divide-x-1 divide-purple-600/30">
    <td class="p-2"><?= $cus["customer_id"] ?></td>
    <td><?= $cus["full_name"] ?></td>
    <td><?= $cus["phone"] ?></td>
    <td><?= $cus["email"] ?></td>
    <td><button class="p-1  bg-purple-500/20 hover:cursor-pointer" onclick='openModifyCustomer(<?= json_encode($cus) ?>)'>Modify</button></td>
  </tr>

<?php } ?>

<script>
  function openModifyCustomer(customer) {
    const data = new URLSearchParams(customer);
    window.location.href = "/student004/hotel/form/customer_modify.php?" + data.toString();
  }
</script>