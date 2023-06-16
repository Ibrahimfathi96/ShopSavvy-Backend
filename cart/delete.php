<?php 
include"../connect.php";

$itemsId = filterRequest('itemsId');
$usersId = filterRequest('usersId');

deleteData("cart", "cart_id = (SELECT * FROM cart WHERE cart_user_id = $usersId, 
AND cart_items_id = $itemsId LIMIT 1)");
