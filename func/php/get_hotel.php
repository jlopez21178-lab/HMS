<?php include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/db_connect.php");

$sql = "SELECT city from `004_hotel`";
$res = mysqli_query($conn, $sql);
$city = mysqli_fetch_all($res, MYSQLI_ASSOC);


foreach ($city as $cy) {
  echo "<option " . (($cy["city"] == $_GET["city"] && $_GET["city"] != "") ? "selected" : "") . ">" . $cy["city"] . "</option>";
};

mysqli_close($conn);
