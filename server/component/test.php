<?php
/**
 测试{
 * "function":GetTrainingList,
 * "Limit":20
 * }
 */


function test($json)
{
    require_once __DIR__ . "\\..\\lib\\medoo.php";

    $database = new medoo([
        // 必须配置项
        'database_type' => 'mysql',
        'database_name' => 'lffOJ',
        'server' => 'localhost',
        'username' => 'root',
        'password' => 'fuck',
        'charset' => 'utf8',

        // 可选参数
        'port' => 3306,
    ]);
    $jsonArr = json_decode($json,true);
    $ID = $jsonArr['Id'];

    $data = $database->select("users",[
        "Nickname"
        ],[
        "Id" => $ID
        ]);
    return json_encode($data);
}