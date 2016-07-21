<?php
//测试{
//"function":Login,
//"Email":"443474713@qq.com",
//"userPass":"fuckjava"
//}



function login($json) {
    require_once '../lib/medoo.php';

    $database = new medoo([
        // 必须配置项
        'database_type' => 'mysql',
        'database_name' => 'lffOJ',
        'server' => 'localhost',
        'username' => 'lff',
        'password' => 'ysllff',
        'charset' => 'utf8',

        // 可选参数
        'port' => 3306,
    ]);
    $res = array();
    $res['status'] = 'success';
    $res['content'] = '';

    $jsonArr = json_decode($json, true);
    $Email = json_decode($jsonArr['Email']);
    $userPass = json_decode($jsonArr['userPass']);

    if($Email == null|| $userPass == null) {
        $res['status'] = 'error';
        $res['content'] = 'areyoukiddingme';
    }

    $datas = $database->select("Users", [
        "Email",
        "Password"
    ], [
        "Email" => $Email,
        "Password" => $userPass
    ]);

    if(count($datas) == 0) {
        $res['status'] = 'error';
        $res['content'] = 'fack';
    }

    return json_encode($res);
}