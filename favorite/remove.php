<?php 
include"../connect.php";

$itemsId = filterRequest('itemsId');
$usersId = filterRequest('usersId');

deleteData("favorite", "favorite_users_id = $usersId AND favorite_items_id = $itemsId");
?>