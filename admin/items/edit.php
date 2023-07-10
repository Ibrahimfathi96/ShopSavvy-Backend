<?php
include "../../connect.php";
$table = "items";
$itemsId                  = filterRequest("itemsId");
$itemName                 = filterRequest("itemName");
$itemNameInArabic         = filterRequest("itemNameInArabic");
$itemsDescription         = filterRequest("itemsDescription");
$itemsDescriptionInArabic = filterRequest("itemsDescriptionInArabic");
$itemsCount               = filterRequest("itemsCount");
$itemsActive              = filterRequest("itemsActive");
$itemsPrice               = filterRequest("itemsPrice");
$itemsDiscount            = filterRequest("itemsDiscount");
$itemsCategoryId          = filterRequest("itemsCategoryId");
$imageName                = imageUpload("../../uploads/items", "files");
$oldImage                 = filterRequest("oldImage");
if ($imageName == "empty") {
    $data = array(
        "items_name"       => $itemName,
        "items_name_ar"    => $itemNameInArabic,
        "items_desc"       => $itemsDescription,
        "items_desc_ar"    => $itemsDescriptionInArabic,
        "items_count"      => $itemsCount,
        "items_active"     => $itemsActive,
        "items_price"      => $itemsPrice,
        "items_discount"   => $itemsDiscount,
        "items_categories" => $itemsCategoryId,
    );
} else {
    deleteFile("../../uploads/categories", $oldImage);
    $data = array(
        "items_name"       => $itemName,
        "items_name_ar"    => $itemNameInArabic,
        "items_desc"       => $itemsDescription,
        "items_desc_ar"    => $itemsDescriptionInArabic,
        "items_image"      => $imageName,
        "items_count"      => $itemsCount,
        "items_active"     => $itemsActive,
        "items_price"      => $itemsPrice,
        "items_discount"   => $itemsDiscount,
        "items_categories" => $itemsCategoryId,
    );
}
updateData($table, $data, "items_id = $itemsId");
