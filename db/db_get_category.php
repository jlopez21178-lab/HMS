<?php include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/db_connect.php");

$sql = "SELECT `name` from `004_category`";
$res = mysqli_query($conn, $sql);
$category = mysqli_fetch_all($res, MYSQLI_ASSOC);

echo "<option></option>";

foreach ($category as $cat) {
  echo "<option " . (($cat["name"] == $_GET["category"] && $_GET["category"] != "") ? "selected" : "") . ">" . $cat["name"] . "</option>";
};

mysqli_close($conn);
