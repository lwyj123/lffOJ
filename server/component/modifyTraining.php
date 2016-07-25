<?php
/**
 测试{
 * "function":ModifyTraining,
 * "ID":20
 *"description":
 * }
 */


function modifyTraining($json)
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
    $res = array();
    $res['status'] = 'success';
    $res['content'] = '';
    $jsonArr = json_decode($json,true);
    $ID = $jsonArr['Id'];
    //if()
    //{
    //    $res['status'] = 'error';
    //    $res['content'] = '权限不足';
    //};
    $Description = $jsonArr['Description'];

        $database -> update("trainings",["#Description" => "$Description"],[
            "Id" => $ID
            ]);
     return json_encode($res);
 }