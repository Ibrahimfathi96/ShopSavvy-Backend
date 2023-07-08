<?php
include "../../connect.php";
$table = "categories";

$categoryId = filterRequest("categoryId");
$categoryName  = filterRequest("categoryName");
$categoryNameInArabic = filterRequest("categoryArName");
$imageName   = imageUpload("../../uploads/categories", "files");
if ($imageName == "empty") {
    $data = array(
        "categories_name" => $categoryName,
        "categories_name_ar" => $categoryNameInArabic,
    );
} else {
    $data = array(
        "categories_name" => $categoryName,
        "categories_name_ar" => $categoryNameInArabic,
        "categories_image"   => $imageName,
    );
}
updateData($table, $data, "categories_id = $categoryId");
