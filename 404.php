<?php http_response_code(404);

// include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/templates/header.php)");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="icon" href="/student004/hotel/img/aurelia-grand-hotel-logo.png" type="image/png" />
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4">
  </script>
  <link
    rel="stylesheet"
    type="text/css"
    href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css" />

</head>

<body>
  <div class="flex flex-col justify-center grow h-screen w-screen items-center bg-purple-100">
    <div class="flex  justify-center items-center p-5">
      <p>Upss... The page is currently under construction, come back later</p>
      <i class="ph ph-spinner animate-spin "></i>
    </div>
    <a href="/student004/hotel" class="p-5 bg-purple-900/30 rounded-lg hover:bg-purple-900/40">Go back to home</a>
  </div>
</body>

</html>