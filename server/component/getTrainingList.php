<?php
/**
 测试{
 * "function":GetTrainingList,
 * "Limit":20
 * }
 */


function getTrainingList($json)
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
    $Limit = $jsonArr['Limit'];

    $data = $database->select("trainings",[
        "Id",
        "Title",
        "Description"
    ],[
        "LIMIT" => $Limit
        ]
    );
    $res = array();
    $res['content'] = $data;
    return json_encode($res);
}