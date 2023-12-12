<?php
include "main/common/db.php";

$db = new db();
$request = array(
    "id" => $db::autoIncreate('users'),
    "name" => "gg", 
    "age" => 25
);

db::create('users', $request);

echo "success data insert";
