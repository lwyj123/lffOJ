<?php
//测试{
//"function":Login,
//"Email":"443474713@qq.com",
//"userPass":"fuckjava"
//}



function login($json) {
    require_once __DIR__ ."\\..\\lib\\medoo.php";

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

    $jsonArr = json_decode($json, true);
    $Email = $jsonArr['Email'];
    $userPass = $jsonArr['userPass'];

    if($Email == null|| $userPass == null) {
        $res['status'] = 'error';
        $res['content'] = 'areyoukiddingme';
        return json_encode($res);
    }

    $datas = $database->select("Users", [
        "Email",
        "Password"
    ], [
        "AND" => [
            "Email" => $Email,
            "Password" => $userPass
        ]
    ]);

    if($datas == null) {
        $res['status'] = 'error';
        $res['content'] = 'fack';
        return json_encode($res);
    }
    return json_encode($res);
}