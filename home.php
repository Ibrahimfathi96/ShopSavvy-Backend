<?php
include "../connect.php";
$allData = array();
$categories = getAllData("categories",null,null,false);
$allData['categories'] = $categories; 
echo json_encode($allData);

?>