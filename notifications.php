<?php
include"./connect.php";
$userId = filterRequest("userId");
getAllData("notifications","notifications_user_id = $userId ORDER BY $userId DESC",);
