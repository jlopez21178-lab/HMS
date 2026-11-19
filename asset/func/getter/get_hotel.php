<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/db_connect.php");

$conn = getConnection();

$stmt = $conn->prepare("SELECT * from `004_hotel`");
$stmt->execute();
$hotel = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

function displayHotelList($hotel)
{
  foreach ($hotel as $hot) { ?>
    <option value="<?= $hot["hotel_id"] ?>" <?= (isset($_POST["hotel_id"]) && $_POST["hotel_id"] == $hot["hotel_id"] ? "selected" : "") ?>><?= $hot["city"] ?></option>
<?php }
}
mysqli_close($conn);
