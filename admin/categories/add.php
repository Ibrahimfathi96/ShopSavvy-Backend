<?php
include "../../connect.php";
$table = "categories";
$categoryName  = filterRequest("categoryName");
$categoryNameInArabic = filterRequest("categoryArName");
$imageName   = imageUpload("../../uploads/categories","files");
$data = array(
    "categories_name" => $categoryName,
    "categories_name_ar" => $categoryNameInArabic,
    "categories_image" => $imageName,
);
insertData($table, $data);