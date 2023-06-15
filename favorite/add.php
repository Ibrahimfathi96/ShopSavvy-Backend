<?php 
include"../connect.php";

$itemsId = filterRequest('itemsId');
$usersId = filterRequest('usersId');

$data = array(
"favorite_users_id" => $usersId,
"favorite_items_id" => $itemsId
);
insertData("favorite", $data);
?>