<?php

function display_countries_list($country = null)
{
  $country = $country ?? $_POST["nationality"] ?? $_GET["nationality"] ?? "";

  $list_path = $_SERVER["DOCUMENT_ROOT"] . "/student004/hotel/asset/countries.json";
  $file = fopen($list_path, "r");
  $country_list = json_decode(fread($file, filesize($list_path) - 1), true);
  foreach ($country_list as $option) { ?>
    <option value="<?= $option["name"] ?>" <?= ($country == $option["name"]) ? "selected" : "" ?>> <?= $option["name"] ?></option>
<?php }
}
