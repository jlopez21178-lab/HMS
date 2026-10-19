<?php include($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/db/db_connect.php");

$sql = "SELECT city from `004_hotel`";
$res = mysqli_query($conn, $sql);
$city = mysqli_fetch_all($res, MYSQLI_ASSOC);

echo "<option></option>";

foreach($city as $cy){
  echo "<option>". $cy["city"] . "</option>";
};

mysqli_close($conn);