<?php 
include"../connect.php";

$usersid = filterRequest("usersId");
$itemsid = filterRequest("itemsId");

deleteData("cart" , "cart_id  = (SELECT cart_id FROM cart WHERE cart_user_id = $usersid AND cart_items_id = $itemsid LIMIT 1)"); 
