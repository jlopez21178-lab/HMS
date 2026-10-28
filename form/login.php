<?php require($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/templates/header.php"); ?>

<div class="landscape grow flex justify-center items-center">
  <form action="" class="bg-purple-900/20 backdrop-blur p-20 border-1 border-purple-300/50 rounded-lg *:text-purple-100/90 flex flex-col align-center gap-5">
    <h1 class="text-2xl text-purple-200">Log In</h1>
    <label>
      <p>Gmail:</p>
      <input type="text" name="email" id="email">
    </label>
    <label>
      <p>Password:</p>
      <input type="password" name="password" id="password">
    </label>
    <input type="submit">
  </form>
</div>