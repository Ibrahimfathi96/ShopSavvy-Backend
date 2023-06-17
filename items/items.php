<?php 
include"../connect.php";
$categoryID = filterRequest('id');
$userid =  filterRequest("userid");
// getAllData("itemsview","categories_id = $categoryID ");

$stmt = $con->prepare("
SELECT itemsview1.* , 1 AS favorite, (items_price - (items_price * (items_discount/100)))as itemspricediscount FROM itemsview1
INNER JOIN favorite ON favorite.favorite_items_id = itemsview1.items_id AND favorite.favorite_users_id = $userid
WHERE categories_id = $categoryID
UNION ALL
SELECT * , 0 AS favorite, (items_price - (items_price * (items_discount/100)))as itemspricediscount  FROM itemsview1
WHERE categories_id = $categoryID AND items_id NOT IN (SELECT itemsview1.items_id FROM itemsview1
INNER JOIN favorite ON favorite.favorite_items_id = itemsview1.items_id AND favorite.favorite_users_id = $userid)
");
$stmt ->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();
if($count>0){
    echo json_encode(array("status"=>"success","data"=>$data));
}else{
    echo json_encode(array("status"=>"failure"));
}
