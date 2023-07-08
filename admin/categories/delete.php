<?php
include"../../connect.php";
$categoryId = filterRequest("categoryId");
$imageName  = filterRequest("imageName");
deleteFile("../../uploads/categories",$imageName);
deleteData("categories", "categories_id = $categoryId");
