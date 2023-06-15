<?php 
include"../connect.php";

$favId = filterRequest('id');

deleteData("favorite", "favorite_id = $favId");
?>