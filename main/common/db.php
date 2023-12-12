<?php

use function PHPSTORM_META\type;

include "./config.php";

 class db
 {
    protected static function getJson($table) {
        $config = new config();
        $jsonData = file_get_contents($_SERVER['DOCUMENT_ROOT'].$config::DB_PATH.$table.$config::$DB_EXT);
        return $jsonData;
    }
    protected static function putJson($table, $arrayData) {
        $config = new config();
        file_put_contents($_SERVER['DOCUMENT_ROOT'].$config::DB_PATH.$table.$config::$DB_EXT, json_encode($arrayData));
    }
    public static function autoIncreate($table) {
        $data = json_decode(self::getJson($table));
        return count((array)$data)+1;
    }
    public static function create($table, $data) {
        $jsonData = self::getJson($table);
        $arrayData = json_decode($jsonData);
        array_push($arrayData, $data);
        self::putJson($table, $arrayData);
    }
 }