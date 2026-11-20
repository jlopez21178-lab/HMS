<?php
//  en la misma hoja que este el menu estara tambien el role_check.php por lo que cojere las variables directamente de ahi

$room_nav = ["room_list.php" => "List", "room_add.php" => "Add room", "room_img_modify.php" => "Modify category image"];

$client_nav = ["customer_list.php" => "List", "customer_add.php" => "Add client"];

$reservation_nav = ["reservation_list.php" => "List", "reservation_add.php" => "New reservation"];

function checkNavAccess($list)
{
  global $role_list;
  global $form_path;
  foreach ($list as $file => $name) {
    $page_permit_level = $role_list[$file] ?? 10;

    if ($page_permit_level <= $_SESSION["user_role_level"]) { ?>
      <a href="<?= $form_path . "/" . $file ?>"> <?= $name ?></a>
<?php
    }
  }
}
?>

<aside class="<?= $menu ?>">
  <details>
    <summary>Rooms</summary>
    <?= checkNavAccess($room_nav); ?>
  </details>
  <details>
    <summary>Customers</summary>
    <?= checkNavAccess($client_nav); ?>
  </details>
  <details>
    <summary>Reservations</summary>
    <?= checkNavAccess($reservation_nav); ?>
  </details>
  <?php if ($_SESSION["user_role"] == "admin") { ?>
    <details>
      <summary>Errors</summary>
      <a href="/student004/hotel/asset/template/error/403.php">403</a>
      <a href="/student004/hotel/asset/template/error/404.php">404</a>
    </details>
  <?php } ?>
</aside>