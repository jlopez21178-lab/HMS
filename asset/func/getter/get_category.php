<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/db_connect.php");

$conn = getConnection();

$sql = "SELECT * FROM `004_category` WHERE 1 = 1";
$type = "";
$param = [];

$date_inserted = isset($_GET["date_in"]) && isset($_GET["date_out"]);

if ($date_inserted) {
  $sql .= ' AND category_id NOT IN (SELECT category_given 
					                          FROM `004_reservation`
                                    WHERE date_in < ? AND date_out > ?
                                    GROUP BY category_given
                                    HAVING COUNT(*) >= `004_category_count`(category_given))';

  $type = "ss";
  $param[] = $_GET["date_out"];
  $param[] = $_GET["date_in"];
}

$stmt = $conn->prepare($sql);

if (!empty($param)) {
  $stmt->bind_param($type, ...$param);
}


$stmt->execute();
$category = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

if ($date_inserted) {
  header("Content-Type: application/json");
  echo json_encode($category);
}


function displayCategoryList($category, $category_selected = null)
{

  $category_selected = $category_selected ?? $_POST["category_id"];

  foreach ($category as $cat) { ?>
    <option value="<?= $cat["category_id"] ?>" <?= ($category_selected) && $category_selected == $cat["category_id"] ? "selected" : "" ?>><?= $cat["category_code"] ?></option>
<?php }
}
mysqli_close($conn);
