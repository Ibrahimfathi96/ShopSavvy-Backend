<?php 
include"../connect.php";
$categoryID = filterRequest('id');
getAllData("itemsview","categories_id = $categoryID ");
?>