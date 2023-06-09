<?php
include "../connect.php";
$allData = array();
$categories = getAllData("categories");
$allData['categories'] = $categories; 

?>