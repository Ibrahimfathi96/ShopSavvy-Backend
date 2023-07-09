<?php
include"../../connect.php";
$itemId = filterRequest("itemId");
$imageName  = filterRequest("imageName");
deleteFile("../../uploads/items",$imageName);
deleteData("items", "items_id = $itemId");
