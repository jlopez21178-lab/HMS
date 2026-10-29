    <aside class="bg-purple-50 flex flex-col p-5 w-auto sticky top-[100px] h-[calc(100vh-100px)] overflow-y-auto min-w-max">
      <details class="column hover:cursor-pointer ">
        <summary>Rooms</summary>
        <a href="<?php echo $myroot . "form/room_list.php" ?>" class="block">List</a>
        <a href="<?php echo $myroot . "form/room_add.php" ?> " class="block">Add room</a>
      </details>
      <details class="column hover:cursor-pointer">
        <summary>Customers</summary>
        <a href="<?php echo $myroot . "form/customer_list.php" ?>" class="block">List</a>
        <a href="<?php echo $myroot . "form/customer_add.php" ?> " class="block">Add client</a>
      </details>
      <details class="column hover:cursor-pointer">
        <summary>Reservations</summary>
        <a href="<?php echo $myroot . "form/reservation_list.php" ?>" class="block">List</a>
        <a href="<?php echo $myroot . "form/reservation_create.php" ?> " class="block">New reservation</a>
      </details>
    </aside>