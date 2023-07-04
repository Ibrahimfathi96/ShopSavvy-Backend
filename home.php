<?php
include "connect.php";
$allData = array();
$allData['status'] = "success";
$categories = getAllData("categories",null,null,false);
$allData['categories'] = $categories; 
// $items = getAllData("itemsview1","items_discount != 0",null,false);//for discount items
$items = getAllData("topsellingitems","1 = 1 ORDER BY itemsCount DESC",null,false);
$allData['items'] = $items; 
echo json_encode($allData);

?>