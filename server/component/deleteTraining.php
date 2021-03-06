<?php
/**
 测试{
 * "function":DeleteTraining,
 * "Limit":20
 * }
 */


function deleteTraining($json)
{
    require_once __DIR__ . "\\..\\lib\\medoo.php";
    $res = array();
    $res['status'] = 'success';
    $res['content'] = '';
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
    $Id = $jsonArr['Id'];

    $datas = $database->select("trainings",[
        "Id",
        "Title",
        "Description"
    ],[
        "Id" => $Id
        ]
    );
    if($datas == null) {
        $res['status'] = 'error';
        $res['content'] = 'Unknown Id';
        return json_encode($res);
    }
    $database->delete("trainings", [
    "AND" => [
        "Id" => $Id
        
    ]
]);
    

    
    return json_encode($res);
}