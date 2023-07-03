<?php 
include"./connect.php";
$stmt = $con->prepare("
SELECT itemsview1.* , 1 AS favorite, (items_price - (items_price * (items_discount/100)))as itemspricediscount FROM itemsview1
INNER JOIN favorite ON favorite.favorite_items_id = itemsview1.items_id 
WHERE items_discount != 0
UNION ALL
SELECT * , 0 AS favorite, (items_price - (items_price * (items_discount/100)))as itemspricediscount  FROM itemsview1
WHERE items_discount != 0 AND items_id NOT IN (SELECT itemsview1.items_id FROM itemsview1
INNER JOIN favorite ON favorite.favorite_items_id = itemsview1.items_id)
");
$stmt ->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();
if($count>0){
    echo json_encode(array("status"=>"success","data"=>$data));
}else{
    echo json_encode(array("status"=>"failure"));
}
