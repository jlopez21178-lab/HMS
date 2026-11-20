<?php
http_response_code(403);

require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/template/header.php");
?>

<div class="flex items-center grow justify-center">
  <div class="flex flex-col">
    Ups. You don't have enough permits to access this page
    <button id="cancel-btn" class="<?= $cus_action_button ?> self-center bg-purple-500 ">Go back to home page</button>
  </div>
</div>

<script>
  cancelBtn(document.getElementById("cancel-btn"));
</script>