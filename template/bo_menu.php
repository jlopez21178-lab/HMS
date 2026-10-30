    <aside class="bg-purple-50 flex flex-col p-5 w-auto sticky top-[100px] h-[calc(100vh-100px)] overflow-y-auto min-w-max">
      <details class="column hover:cursor-pointer ">
        <summary>Rooms</summary>
        <a href="<?= $formPath . "/room_list.php" ?>" class="block">List</a>
        <a href="<?= $formPath . "/room_add.php" ?> " class="block">Add room</a>
      </details>
      <details class="column hover:cursor-pointer">
        <summary>Customers</summary>
        <a href="<?= $formPath . "/customer_list.php" ?>" class="block">List</a>
        <a href="<?= $formPath . "/customer_add.php" ?> " class="block">Add client</a>
      </details>
      <details class="column hover:cursor-pointer">
        <summary>Reservations</summary>
        <a href="<?= $formPath . "/reservation_list.php" ?>" class="block">List</a>
        <a href="<?= $formPath . "/reservation_create.php" ?> " class="block">New reservation</a>
      </details>
    </aside>