<?php include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/db_connect.php");

$sql = "SELECT `category_name` from `004_category`";
$res = mysqli_query($conn, $sql);
$category = mysqli_fetch_all($res, MYSQLI_ASSOC);

foreach ($category as $cat) {
  echo "<option " . (($cat["category_name"] == $_GET["category_name"]) ? "selected" : "") . ">" . $cat["category_name"] . "</option>";
};

mysqli_close($conn);
