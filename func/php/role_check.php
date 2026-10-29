<?php
if ($_SESSION["userRole"] == "guest" || $_SESSION["userRole"] == "customer") { ?>
  <script>
    window.location.href = "/student004/hotel/template/error/403.php";
  </script>
<?php } ?>