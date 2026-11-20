<?php
http_response_code(404);

require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/template/header.php");
?>

<div class="flex flex-col justify-center grow h-screen w-screen items-center bg-purple-100">
  <div class="flex  justify-center items-center p-5">
    <p>Upss... The page is currently under construction, come back later</p>
    <i class="ph ph-spinner animate-spin "></i>
  </div>
  <a href="<?= $homePath ?>" class="p-5 bg-purple-900/30 rounded-lg hover:bg-purple-900/40">Go back to home</a>
</div>