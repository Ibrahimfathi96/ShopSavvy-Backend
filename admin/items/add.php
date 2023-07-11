<?php
include "../../connect.php";
$table = "items";
$itemName                 = filterRequest("itemName");
$itemNameInArabic         = filterRequest("itemNameInArabic");
$itemsDescription         = filterRequest("itemsDescription");
$itemsDescriptionInArabic = filterRequest("itemsDescriptionInArabic");
$itemsCount               = filterRequest("itemsCount");

$itemsPrice               = filterRequest("itemsPrice");
$itemsDiscount            = filterRequest("itemsDiscount");
$itemsDate                = filterRequest("itemsDate");
// $itemsDate                = date("Y-m-d H:i:s");
$itemsCategoryId          = filterRequest("itemsCategoryId");
$imageName                = imageUpload("../../uploads/items", "files");
$data = array(
    "items_name"       => $itemName,
    "items_name_ar"    => $itemNameInArabic,
    "items_desc"       => $itemsDescription,
    "items_desc_ar"    => $itemsDescriptionInArabic,
    "items_image"      => $imageName,
    "items_count"      => $itemsCount,
    "items_active"     => 1,
    "items_price"      => $itemsPrice,
    "items_discount"   => $itemsDiscount,
    "items_date"       => $itemsDate,
    "items_categories" => $itemsCategoryId,
);
insertData($table, $data);
